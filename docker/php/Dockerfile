FROM alpine

# install php
RUN apk add --no-cache php-fpm php

# install composer
RUN apk add --no-cache composer

# install tools
RUN apk add --no-cache git zip openssl

# install extensions
RUN apk add --no-cache \
     php-pdo \
     php-pdo_mysql \
     php-pdo_sqlite \
     php-tokenizer \
     php-ctype \
     php-dom \
     php-zip \
     php-curl \
     php-posix \
     php-xmlwriter \
     php-xmlreader \
     php-gd \
     php-xml \
     php-simplexml \
     php-session \
     php-pcntl \
     php-soap \
     php-openssl \
     php-fileinfo \
     php-opcache

# copy php.ini
COPY php.ini /etc/php7/conf.d/php.ini

# set php-fpm to listen to all addresses
RUN sed -i 's/listen = 127.0.0.1:9000/listen = 0.0.0.0:9000/' /etc/php7/php-fpm.d/www.conf

# install parallelization composer plugin
RUN composer global require hirak/prestissimo

# set workdir to app location
WORKDIR /var/www

# run service (run in foreground, run as root)
CMD php-fpm7 -F -R

# expose php and xdebug ports
EXPOSE 9000
