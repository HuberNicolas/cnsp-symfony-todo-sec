#!/bin/sh
set -e

# The source is bind-mounted, so dependencies are installed on first start from composer.lock.
if [ ! -f vendor/autoload.php ]; then
    composer install --no-interaction
fi

exec "$@"
