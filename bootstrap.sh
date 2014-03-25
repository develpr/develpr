#!/usr/bin/env bash

#sudo echo deb http://dl.hhvm.com/ubuntu precise main | sudo tee /etc/apt/sources.list.d/hhvm.list -y
sudo add-apt-repository ppa:chris-lea/node.js -y
sudo apt-get update
sudo apt-get install -y unzip vim git-core curl wget build-essential python-software-properties
sudp apt-get install git -y
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password password'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password password'
sudo apt-get -y install mysql-server
sudo apt-get install nginx -y
sudo apt-get install php5-fpm -y
sudo apt-get install php5-cli -y
sudo apt-get install php5-mcrypt -y

#Install/configure xdebug
sudo apt-get install php5-xdebug -y
sudo echo "xdebug.remote_enable = 1" >> /etc/php5/fpm/conf.d/xdebug.ini
sudo echo "xdebug.remote_host = 10.0.2.2" >> /etc/php5/fpm/conf.d/xdebug.ini
sudo echo "xdebug.remote_port=9000" >> /etc/php5/fpm/conf.d/xdebug.ini
sudo echo "xdebug.remote_handler=dbgp" >> /etc/php5/fpm/conf.d/xdebug.ini
sudo echo "xdebug.idekey=PHPSTORM" >> /etc/php5/fpm/conf.d/xdebug.ini

curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo rm -rf /etc/nginx/sites-available
sudo ln -s /root/sites-available /etc/nginx/sites-available
sudo sed -i "s/127.0.0.1:9000/\/var\/run\/php5-fpm.sock/g" "/etc/php5/fpm/pool.d/www.conf"
sudo service php5-fpm restart
sudo service nginx restart
sudo apt-get install npm -y
sudo apt-get install nodejs -y
sudo add-apt-repository ppa:chris-lea/node.js -y
sudo apt-get update
sudo apt-get install nodejs -y
cd /var/www
sudo composer install
cd /var/www/webapp/
npm install -g bower
npm install -g grunt-cli
bower install --allow-root
sudo npm install

#install redis
cd ~
sudo wget http://download.redis.io/redis-stable.tar.gz
tar xvzf redis-stable.tar.gz
cd redis-stable
make
sudo cp src/redis-server /usr/local/bin/
sudo cp src/redis-cli /usr/local/bin/
sudo mkdir /etc/redis
sudo mkdir /var/redis
sudo cp utils/redis_init_script /etc/init.d/redis_6379
sudo cp redis.conf /etc/redis/6379.conf
sudo mkdir /var/redis/6379
sudo sed -i "s/daemonize no/daemonize yes/g" "/etc/redis/6379.conf"
sudo sed -i "s/dir .\//dir \/var\/redis\/6379/g" "/etc/redis/6379.conf"
sudo update-rc.d redis_6379 defaults
/etc/init.d/redis_6379 start
