FROM alpine:3.16

ARG DOMAIN_NAME

RUN apk update && apk upgrade && apk add --no-cache nginx openssl \
	&& openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
		-subj "/CN=$DOMAIN_NAME/C=SP/L=MADRID" \
		-keyout /etc/ssl/private/$DOMAIN_NAME.key -out /etc/ssl/certs/$DOMAIN_NAME.crt

COPY --chmod=644 ./conf/nginx.conf /etc/nginx/http.d/

RUN sed -i "s/\$DOMAIN_NAME/$DOMAIN_NAME/g" /etc/nginx/http.d/nginx.conf

EXPOSE 443

ENTRYPOINT ["nginx", "-g", "daemon off;"]
