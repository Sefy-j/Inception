#!/bin/sh
exec hugo server --bind=0.0.0.0 --baseURL=https://$DOMAIN_NAME/static --logFile=/dev/stdout --appendPort=false
