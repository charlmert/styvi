# How to sign kernel modules and enroll mok key

## After a fresh secure boot install take ownership of the Machine Owner Key (MOK)

```bash
mokutil --enable-validation
```

## Enrolling a new key and signing a driver/kernel module
https://superuser.com/questions/1438279/how-to-sign-a-kernel-module-ubuntu-18-04

Create a personal public/private RSA key pair to sign the kernel modules. As recommended in the link below, I chose to store the key/pair in the /root/module-signing/ directory.

```sh
    sudo -i
    mkdir /root/module-signing
    cd /root/module-signing
    openssl req -new -x509 -newkey rsa:2048 -keyout MOK.priv -outform DER -out MOK.der -nodes -days 36500 -subj "/CN=YOUR_NAME/"
    chmod 600 MOK.priv 
```

Use mokutil, a tool to import or delete the machine owner keys (MOK), to import the public key, and then enroll it when the machine is rebooted. The password in this step is a temporary use password you'll only need to remember for a few minutes.

```sh
    mokutil --import /root/module-signing/MOK.der
    input password:
    input password again:
```

Reboot the machine. When the bootloader starts, you should see a screen asking you to press a button to enter the MOK manager EFI utility. Note that any external external keyboards won't work in this step. Select Enroll MOK in the first menu, then continue, and then select Yes to enroll the keys, and re-enter the password established in step 2. Then select OK to continue the system boot.

Future kernel updates would require the updated kernels to be signed again, so it makes sense to put the signing commands in a script that can be run at a later date as necessary. A sample script /root/module-signing/sign-vbox-modules is given below.

```sh
#!/bin/bash

for modfile in $(dirname $(modinfo -n vboxdrv))/*.ko; do
  echo "Signing $modfile"
  /usr/src/linux-headers-$(uname -r)/scripts/sign-file sha256 \
                                /root/module-signing/MOK.priv \
                                /root/module-signing/MOK.der "$modfile"
done
```

Add execution permission, and run the script above as root from the /root/module-signing/ directory.

```sh
    sudo -i
    cd /root/module-signing
    chmod 700 /root/module-signing/sign-vbox-modules
    ./sign-vbox-modules
```

Load vboxdrv module and launch VirtualBox.

```sh
    modprobe vboxdrv 
```
