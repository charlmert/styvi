# Encrypting a disk with key file based access

Can only encrypt a full drive or block level device like an entire disk

## Choose a disk:

```sh
df -h
fdisk -l
```

Format it

```
# dd if=/dev/urandom of=/dev/sda bs=4096
# OR
shred --verbose -n 3 /dev/sda
```

Testing for encryption support

```sh
grep -i config_dm_crypt /boot/config-$(uname -r)

# OUTPUT:
CONFIG_DM_CRYPT=m
```

Load the dm_crypt module

```sh
modprobe dm_crypt
```

## Install Cryptsetup

Cryptsetup is a frontend interface to dm_crypt for creating, configuring, accessing, and managing encrypted file systems using dm-crypt.

```sh
apt-get update && apt-get install cryptsetup 
```

Setup the LUKS (Linux Unified Key System) partition and a passphrase

```sh
cryptsetup -y luksFormat /dev/sda1
```

## Create a keyfile

This keyfile will be used to unencrypt your drive

```sh
sudo dd if=/dev/urandom of=/media/charl/murdis/key bs=1024 count=4
sudo chmod 0400 /media/charl/murdis/key
```

Add the keyfile to cryptsetup: It's a means to authorize decryption of /dev/sda being added to cryptsetup

```sh
sudo cryptsetup luksAddKey /dev/sda1 /media/charl/murdis/key
```

## Open the partition, format and mount it

```sh
cryptsetup luksOpen /dev/sda1 murdis
```

Format it

```sh
mkfs.ext4 /dev/mapper/murdis
```

Mount it

```sh
mkdir /mnt/murdis
mount /dev/mapper/murdis /mnt/murdis
mount | grep murdis
```

## When done unmount it

Need to unmount and lock it again

```sh
umount /mnt/murdis
```

This will make it unusable to anyone else

```sh
cryptsetup luksClose murdis
```

## Remove the password based key slot (auth method)

Run this command and enter the password for the password based key you wish to remove

```sh
cryptsetup luksRemoveKey /dev/sda1
```

## Create lock and unlock scripts

Create the unlock script

```sh
vim /usr/bin/unlock_murdis
```

Paste the following

```sh
#!/bin/bash
#cryptsetup luksOpen /dev/sda1 murdis
cryptsetup -v open --type luks /dev/sda1 murdus --key-file /media/charl/murdis/key
if [ "$?" -eq 0 ]; then
	[ -e /mnt/murdis ] || mkdir -p /mnt/murdis
	mount /dev/mapper/murdis /mnt/murdis
fi
```

Create the lock script

```sh
vim /usr/bin/lock_murdis
```

Paste the following

```sh
#!/bin/bash
umount /mnt/murdis
result="$?"
if [ "$result" -eq 32 ]; then
	echo "/mnt/murdis is already unmounted"
	cryptsetup luksClose murdis
elif [ "$result" -ne 0 ]; then
	echo "Could not unmount /mnt/murdis"
else
	cryptsetup luksClose murdis
fi
```

Now just plug in your usb and unlock to use

```sh
unlock_murdis
```

When done or about to leave your desktop just lock it

```sh
lock_murdis
```


# Extra admin tasks (Not needed for successful implementation)

## Removing a key from a device

Seeing the different keyslots available, limited to 10

```sh
cryptsetup luksDump /dev/sda1
```

Enter the password for the password based key you wish to remove

```sh
cryptsetup luksRemoveKey /dev/sda1
```

File based keys
Removing a keyslot, this will disable that method from unencrypting the device

```sh
cryptsetup -v luksKillSlot /dev/sda1 0
cryptsetup -v luksKillSlot /dev/sda1 1
```

