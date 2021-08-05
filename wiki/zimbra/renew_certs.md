service apache2 start
certbot_zimbra.sh -n -d admin.acesafrica.com -e webmail.acesafrica.com -e mail.acesafrica.com -j -w /var/www/html/
