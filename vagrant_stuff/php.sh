#!/usr/bin/env bash

php_config_file="/etc/php/7.0/apache2/php.ini"
php_cli_config_file="/etc/php/7.0/cli/php.ini"

sudo apt-get install -y php php-gd php-mcrypt php-sqlite3 php-json php-curl php-xdebug php-mbstring php-xml php-mysql
sudo phpenmod mcrypt

# Date Timezone
sed -i "s/;date.timezone =.*/date.timezone = Asia\/Yekaterinburg/" ${php_config_file}
# opCache
sed -i "s/.*opcache.enable=.*/opcache.enable=1/" ${php_config_file}
sed -i "s/.*opcache.fast_shutdown=.*/opcache.fast_shutdown=1/" ${php_config_file}
sed -i "s/.*opcache.interned_strings_buffer=.*/opcache.interned_strings_buffer=8/" ${php_config_file}
sed -i "s/.*opcache.max_accelerated_files=.*/opcache.max_accelerated_files=100000/" ${php_config_file}
sed -i "s/.*opcache.memory_consumption=.*/opcache.memory_consumption=128/" ${php_config_file}
sed -i "s/.*opcache.revalidate_freq=.*/opcache.revalidate_freq=0/" ${php_config_file}

sed -i "s/.*max_input_vars.*/max_input_vars = 10000/" ${php_config_file}
sed -i "s/.*upload_max_filesize.*/upload_max_filesize = 8M/" ${php_config_file}
sed -i "s/;mbstring.func_overload =.*/mbstring.func_overload = 2/" ${php_config_file}
sed -i "s/;mbstring.internal_encoding =.*/mbstring.internal_encoding = utf-8/" ${php_config_file}
sed -i "s/short_open_tag =.*/short_open_tag = On/" ${php_config_file}
sed -i "s/display_errors =.*/display_errors = On/" ${php_config_file}
sed -i "s/display_startup_errors =.*/display_startup_errors = On/" ${php_config_file}
sed -i "s/short_open_tag =.*/short_open_tag = On/" ${php_cli_config_file}

# install Composer
curl -s https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer