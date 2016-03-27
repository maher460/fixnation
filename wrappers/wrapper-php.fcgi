#!/bin/sh
PHPRC="/www/f/i/u75267/conf/php55"
export PHPRC
PHP_FCGI_CHILDREN=0
export PHP_FCGI_CHILDREN
PHP_FCGI_MAX_REQUESTS=5000
export PHP_FCGI_MAX_REQUESTS
umask 0022
exec /usr/local/php55/bin/php-cgi
