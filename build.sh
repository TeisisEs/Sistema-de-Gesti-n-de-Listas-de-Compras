#!/usr/bin/env bash
set -e

echo " Instalando dependencias..."
composer install --optimize-autoloader --no-dev

echo " Optimizando aplicación..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo " Preparando base de datos..."
mkdir -p database
touch database/database.sqlite
chmod 666 database/database.sqlite

echo " Build completado"