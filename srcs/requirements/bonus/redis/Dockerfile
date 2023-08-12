FROM alpine:3.16

RUN apk update && apk upgrade && apk add --no-cache redis

COPY --chown=redis:redis --chmod=644 ./conf/redis.conf /etc

USER redis

ENTRYPOINT [ "redis-server", "/etc/redis.conf"]
