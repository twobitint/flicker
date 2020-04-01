#!/bin/bash

set -o allexport; source .env; set +o allexport

composer install

chmod -R 777 storage bootstrap/cache
setfacl -Rdm u::rwx storage bootstrap/cache
setfacl -Rdm g::rwx storage bootstrap/cache
setfacl -Rdm o::rwx storage bootstrap/cache

php artisan key:generate
php artisan migrate:fresh --seed

npm ci
npm run dev
