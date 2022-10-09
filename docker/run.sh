#!/bin/sh

cd /var/www

# php artisan migrate:fresh --seed
php artisan cache:clear
php artisan route:cache
php artisan storage:link
npm run production

/usr/bin/supervisord -c /etc/supervisord.conf
