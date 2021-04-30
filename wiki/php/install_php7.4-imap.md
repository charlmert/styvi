curl 'https://packages.sury.org/php/pool/main/p/php7.4/php7.4-imap_7.4.16-1%2B0~20210305.42%2Bdebian10~1.gbpbbe65e_amd64.deb' --user-agent Netscape -o /tmp/php7.4-imap.deb
dpkg -i /tmp/php7.4-imap.deb
apt-get install -fy
