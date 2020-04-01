FROM alpine

# install nginx
RUN apk add --no-cache nginx

# create the required pid folder
RUN mkdir -p /run/nginx

# copy site conf
COPY ./default.conf /etc/nginx/conf.d/default.conf

WORKDIR /opt

# start nginx service
COPY ./start.sh start.sh
ENTRYPOINT ./start.sh

# expose http port
EXPOSE 80
