The following signatures were invalid: EXPKEYSIG 9D6D8F6BC857C906 Debian Security Archive Automatic Signing Key (8/jessie) <ftpmaster@debian.org> EXPKEYSIG AA8E81B4331F7F50 Debian Security Archive Automatic Signing Key (9/stretch) <ftpmaster@debian.org>
Err:4 http://deb.debian.org/debian stretch Release.gpg

```sh
sudo apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv-keys 9D6D8F6BC857C906
```
