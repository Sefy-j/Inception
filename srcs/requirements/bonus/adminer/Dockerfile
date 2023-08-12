FROM alpine:3.16

WORKDIR /var/www/adminer

RUN apk update && apk upgrade && apk add --no-cache php81 \
    php81-fpm \
	php81-mysqli \
	php81-curl \
	php81-exif \
	php81-mbstring \
	php81-openssl \
	php81-zip \
    php81-session \
    wget \
    && adduser -s /bin/false -D adminer_user \
    && wget https://github.com/vrana/adminer/releases/download/v4.8.1/adminer-4.8.1.php \
    && mv adminer-4.8.1.php index.php \
    && chown -R adminer_user:adminer_user /var/www/adminer \
    && rm /etc/php81/php-fpm.d/www.conf

COPY --chmod=644 ./conf/adminer.conf /etc/php81/php-fpm.d

ENTRYPOINT ["/usr/sbin/php-fpm81", "-F"]