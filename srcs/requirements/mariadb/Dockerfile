FROM alpine:3.16

ARG MADB_ROOT_PASSW MADB_USER MADB_PASSW WP_DB_NAME

RUN apk update && apk upgrade && apk add --no-cache mariadb mariadb-client

COPY --chown=mysql:mysql --chmod=644 ./conf/mysqld.cnf ./conf/initfile.sql /etc/my.cnf.d/

RUN mysql_install_db \
    && sed -i "s/\$MADB_ROOT_PASSW/$MADB_ROOT_PASSW/g" /etc/my.cnf.d/initfile.sql \
    && sed -i "s/\$MADB_USER/$MADB_USER/g" /etc/my.cnf.d/initfile.sql \
    && sed -i "s/\$MADB_PASSW/$MADB_PASSW/g" /etc/my.cnf.d/initfile.sql \
    && sed -i "s/\$WP_DB_NAME/$WP_DB_NAME/g" /etc/my.cnf.d/initfile.sql

ENTRYPOINT ["mysqld"]
