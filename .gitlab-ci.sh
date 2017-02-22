#!/bin/bash
# Ensure we fail fast if there is a problem.
set -eo pipefail

# Ensure that php is working
php -v

# Ensure that mysql server is up and running
ping -c 3 mysql

# Update packages
apt-get update -y

# Update project dependencies.
curl -sS https://getcomposer.org/installer | php
php composer.phar install

# Copy over testing configuration. This configuration is used for Gitlab CI unit testing
cp -v .env.testing .env

# Generate an application key. Clear config and cache route
php artisan key:generate
php artisan optimize
php artisan config:cache

# Run database migrations and seed the data
php artisan migrate --seed