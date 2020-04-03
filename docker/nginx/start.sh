#!/bin/bash

# key="/etc/ssl/private/nginx-selfsigned.key"
# pem="/etc/ssl/private/nginx-selfsigned.pem"
# org="Flicker CA Self Signed Organization"
# cn="Flicker CA Self Signed CN"
# email="rootcertificate@"

# openssl req -x509 -nodes -days 365 -new -newkey rsa:2048 -subj "/C=/ST=/O=%s/localityName=/commonName=%s/organizationalUnitName=Developers/emailAddress=%s/" -keyout "$key" -out "$pem"

key="/etc/ssl/private/localhost.key"
crt="/etc/ssl/private/localhost.crt"

openssl req -x509 -out "$crt" -keyout "$key" \
  -newkey rsa:2048 -nodes -sha256 \
  -subj '/CN=localhost' -extensions EXT -config <( \
   printf "[dn]\nCN=localhost\n[req]\ndistinguished_name = dn\n[EXT]\nsubjectAltName=DNS:localhost\nkeyUsage=digitalSignature\nextendedKeyUsage=serverAuth")

# start nginx in foreground
nginx

# output errors
tail -f /var/log/nginx/error.log
