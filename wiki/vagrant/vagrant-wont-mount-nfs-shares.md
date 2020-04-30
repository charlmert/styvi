Vagrant was unable to mount VirtualBox shared folders. This is usually
because the filesystem "vboxsf" is not available. This filesystem is
made available via the VirtualBox Guest Additions and kernel module.
Please verify that these guest additions are properly installed in the
guest. This is not a bug in Vagrant and is usually caused by a faulty
Vagrant box. For context, the command attempted was:

mount -t vboxsf -o uid=1000,gid=1000 var_www_network.routenetworks.africa /var/www/network.routenetworks.africa

The error output from the command was:

mount: unknown filesystem type 'vboxsf'

## Solution

```sh
vagrant plugin install vagrant-vbguest
vagrant vbguest
```

## Known issues
eading state information...
E: Unable to locate package linux-headers-4.9.0-9-amd64
E: Couldn't find any package by glob 'linux-headers-4.9.0-9-amd64'
E: Couldn't find any package by regex 'linux-headers-4.9.0-9-amd64'
Hit:1 http://security.debian.org/debian-security stretch/updates InRelease
Ign:2 http://deb.debian.org/debian stretch InRelease
Hit:3 http://deb.debian.org/debian stretch Release
Reading package lists...
Reading package lists...
Building dependency tree...
Reading state information...
E: Unable to locate package linux-headers-4.9.0-9-amd64
E: Couldn't find any package by glob 'linux-headers-4.9.0-9-amd64'
E: Couldn't find any package by regex 'linux-headers-4.9.0-9-amd64'
==> default: Checking for guest additions in VM...
    default: No guest additions were detected on the base box for this VM! Guest
    default: additions are required for forwarded ports, shared folders, host only
    default: networking, and more. If SSH fails on this machine, please install
    default: the guest additions and repackage the box to continue.
    default: 
    default: This is not an error message; everything may continue to work properly,
    default: in which case you may ignore this message.
The following SSH command responded with a non-zero exit status.
Vagrant assumes that this means the command failed!

DEBIAN_FRONTEND=noninteractive apt-get install -y linux-headers-`uname -r` dkms

Stdout from the command:

Reading package lists...
Building dependency tree...
Reading state information...


Stderr from the command:

E: Unable to locate package linux-headers-4.9.0-9-amd64
E: Couldn't find any package by glob 'linux-headers-4.9.0-9-amd64'
E: Couldn't find any package by regex 'linux-headers-4.9.0-9-amd64'

## Solution

ssh into the vagrant machine and perform a dist-upgrade

```sh
vagrant ssh
sudo su
apt-get dist-upgrade
```
