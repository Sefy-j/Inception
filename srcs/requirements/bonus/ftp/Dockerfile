FROM alpine:3.16

ARG FTP_USER FTP_PASSW

RUN apk update && apk upgrade && apk add --no-cache vsftpd \
    && adduser -h /var/www -s /bin/false -D $FTP_USER \
    && echo "$FTP_USER:$FTP_PASSW" | chpasswd \
    && chmod 554 /var/www

COPY --chmod=744 ./conf/vsftpd.conf ./conf/entrypoint.sh /etc/vsftpd/

EXPOSE 21 4000-4242:4000-4242

ENTRYPOINT [ "/etc/vsftpd/entrypoint.sh" ]
