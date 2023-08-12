#!/bin/sh
chown -R $FTP_USER:$FTP_USER /var/www/wordpress
exec /usr/sbin/vsftpd /etc/vsftpd/vsftpd.conf
