#!/bin/sh

set -e

php ./setup_db.php
php -S 0.0.0.0:8000
