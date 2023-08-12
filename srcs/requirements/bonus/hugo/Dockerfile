FROM alpine:3.16

ARG HUGO_THEME_NAME HUGO_THEME_GIT

WORKDIR /var/www/hugo/static_web

RUN apk update && apk upgrade && apk add --no-cache hugo git \
	&& hugo new site /var/www/hugo/static_web \
	&& git clone $HUGO_THEME_GIT themes/$HUGO_THEME_NAME \
	&& adduser -s /bin/false -D hugo_user \
	&& chown hugo_user:hugo_user -R /var/www/hugo

COPY --chown=hugo_user:hugo_user --chmod=744 ./conf/static_web /var/www/hugo/static_web

COPY --chown=hugo_user:hugo_user --chmod=744 ./conf/entrypoint.sh /var/www

USER hugo_user

ENTRYPOINT ["/var/www/entrypoint.sh"]
