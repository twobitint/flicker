FROM alpine:latest

# install mysql server
# TODO: move mysql-client out?
RUN apk add --no-cache mysql \
    mysql-client

WORKDIR /opt

# copy default mysql startup service
COPY ./start.sh start.sh

ENTRYPOINT ./start.sh

# expose mysql port
EXPOSE 3306
