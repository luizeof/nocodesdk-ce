#!/bin/bash
set -e

cd /var/www/html

cp -f /var/www/html/.env.example /var/www/html/.env

echo "DB_CONNECTION=$DB_CONNECTION" >> /var/www/html/.env
echo "DB_HOST=$DB_HOST" >> /var/www/html/.env
echo "DB_PORT=$DB_PORT" >> /var/www/html/.env
echo "DB_DATABASE=$DB_DATABASE" >> /var/www/html/.env
echo "DB_USERNAME=$DB_USERNAME" >> /var/www/html/.env
echo "DB_PASSWORD=$DB_PASSWORD" >> /var/www/html/.env

echo "REDIS_HOST=$REDIS_HOST" >> /var/www/html/.env
echo "REDIS_PASSWORD=$REDIS_PASSWORD" >> /var/www/html/.env
echo "REDIS_PORT=$REDIS_PORT" >> /var/www/html/.env

echo "SESSION_DRIVER=redis" >> /var/www/html/.env
echo "CACHE_DRIVER=redis" >> /var/www/html/.env

echo "APP_KEY=$APP_KEY" >> /var/www/html/.env
echo "APP_URL=$APP_URL" >> /var/www/html/.env

sudo -u www-data php /var/www/html/artisan config:clear

sudo -u www-data php /var/www/html/artisan route:clear

sudo -u www-data php /var/www/html/artisan route:cache

sudo -u www-data php /var/www/html/artisan view:clear

rm -rf /var/www/html/resources/views/vendor/livewire

sudo -u www-data php /var/www/html/artisan view:cache

sudo -u www-data php /var/www/html/artisan config:cache

sudo -u www-data php /var/www/html/artisan migrate --force

sudo -u www-data php /var/www/html/artisan app:setup:user $APP_EMAIL $APP_PASSWORD

service memcached start

"$@" &
MAINPID=$!

# wait until all processes end (wait returns 0 retcode)
while :; do
    if wait; then
        break
    fi
done
