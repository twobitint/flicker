#!/bin/sh

# start nginx in foreground
nginx

# output errors
tail -f /var/log/nginx/error.log
