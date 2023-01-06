#!/bin/bash
set -e

cd /var/www/html

export > "/var/www/html/.env"

sudo -u www-data php /var/www/html/artisan config:clear

sudo -u www-data php /var/www/html/artisan route:clear

sudo -u www-data php /var/www/html/artisan route:cache

sudo -u www-data php /var/www/html/artisan view:clear

rm -rf /var/www/html/resources/views/vendor/livewire

sudo -u www-data php /var/www/html/artisan view:cache

sudo -u www-data php /var/www/html/artisan config:cache

sudo -u www-data php /var/www/html/artisan migrate --force

sudo -u www-data php /var/www/html/artisan app:setup:user

service memcached start

"$@" &
MAINPID=$!

# wait until all processes end (wait returns 0 retcode)
while :; do
    if wait; then
        break
    fi
done
