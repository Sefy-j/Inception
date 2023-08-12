FROM alpine:3.16

WORKDIR /var/www

RUN apk update && apk upgrade && apk add --no-cache php81 \
	php81-fpm \
	php81-mysqli \
	php81-curl \
	php81-exif \
	php81-mbstring \
	php81-openssl \
	php81-zip \
	wget \
	tar \
	&& adduser -s /bin/false -D wordpress_user \
	&& wget http://wordpress.org/latest.tar.gz \
	&& wget https://downloads.wordpress.org/plugin/redis-cache.2.4.1.zip \
	&& tar -xzvf latest.tar.gz \
	&& unzip redis-cache.2.4.1.zip \
	&& rm latest.tar.gz wordpress/wp-config-sample.php /etc/php81/php-fpm.d/www.conf redis-cache.2.4.1.zip \
	&& chown -R wordpress_user:wordpress_user redis-cache wordpress\
	&& cp redis-cache/includes/object-cache.php /var/www/wordpress/wp-content/ \
	&& mv redis-cache /var/www/wordpress/wp-content/plugins

COPY --chmod=644 ./conf/wordpress_site.conf /etc/php81/php-fpm.d

COPY --chown=wordpress_user:wordpress_user --chmod=644 ./conf/wp-config.php /var/www/wordpress

ENTRYPOINT ["/usr/sbin/php-fpm81", "-F"]
