#!/bin/bash
php artisan route:cache
php artisan config:cache
php artisan view:cache
php artisan event:cache
