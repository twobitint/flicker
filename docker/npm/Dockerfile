FROM alpine

RUN apk add --no-cache npm && \
    mkdir /.npm && \
    chmod 777 /.npm

WORKDIR /var/www

ENTRYPOINT [ "npm" ]