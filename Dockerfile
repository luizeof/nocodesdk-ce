FROM luizeof/php8.1-build

EXPOSE 80

ENV APP_HOME /var/www/html

ENV COMPOSER_MEMORY_LIMIT=-1

RUN sudo apt-get install apache2-utils -y

RUN sudo apt install dnsutils -y

RUN rm -f /etc/memcached.conf

COPY ./Dockerfile.files/memcached.conf /etc/memcached.conf

RUN mkdir -p /var/run/memcached/

RUN chmod +777 -R /var/run/memcached/

RUN rm -rf /var/www/html

RUN mkdir -p /var/www/html/public

COPY ./Dockerfile.files/scheduler.crontab /etc/cron.d/scheduler

RUN chmod 644 /etc/cron.d/scheduler

WORKDIR /var/www/html/

RUN mkdir -p /var/www/.composer && chown -R www-data:www-data /var/www/.composer

COPY . /var/www/html/

RUN rm -rf /var/www/html/.git

RUN COMPOSER_MEMORY_LIMIT=-1 composer install --prefer-dist --no-dev --optimize-autoloader --no-interaction --no-progress -o

RUN composer dumpautoload -o

RUN npm install

RUN npm run production

RUN chmod -R 777 /tmp

RUN php artisan storage:link

RUN mkdir -p /var/www/html/storage/logs/

RUN chown -R www-data:www-data /var/www/html

COPY ./Dockerfile.files/entrypoint-web.sh /entrypoint-web.sh

RUN ["chmod", "+x", "/entrypoint-web.sh"]

ENTRYPOINT ["/entrypoint-web.sh"]

CMD ["apache2-foreground"]
