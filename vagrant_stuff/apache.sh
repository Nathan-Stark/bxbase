#!/usr/bin/env bash

sudo apt-get install -y apache2

XDEBUG=$(cat <<EOF
xdebug.remote_host=192.168.1.100;ip адрес клиентской машины
xdebug.remote_handler=dbgp
xdebug.remote_log=/var/www/bitrix-base/xdebug.log
xdebug.remote_enable=true
xdebug.remote_port="9000"
xdebug.profiler_enable=1
xdebug.profiler_output_dir="/tmp/xdebug-someuser/"
xdebug.profile_enable_trigger=1
xdebug.trace_enable_trigger=1
xdebug.idekey="PHPSTORM"
EOF
)
echo "${XDEBUG}" > /etc/apache2/sites-available/000-default.conf

# setup hosts file
VHOST=$(cat <<EOF
User vagrant
<VirtualHost *:80>
    DocumentRoot "/var/www/bitrix-base/web"
    <Directory "/var/www/bitrix-base/web">
        AllowOverride All
        Options -Indexes
        Require all granted
    </Directory>
</VirtualHost>
EOF
)
echo "${VHOST}" > /etc/apache2/sites-available/000-default.conf

sudo a2enmod rewrite

sudo service apache2 restart
