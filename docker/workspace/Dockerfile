FROM alpine

# php
RUN apk add --no-cache \
    php \
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

# composer
RUN apk add --no-cache composer

# install parallelization composer plugin
RUN composer global require hirak/prestissimo

# npm
RUN apk add --no-cache npm

# python
RUN apk add --no-cache python

# tools
RUN apk add --no-cache git zip openssl acl bash make g++

WORKDIR /var/www

ENTRYPOINT [ "bash" ]
