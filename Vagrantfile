# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

$install_requirements = <<SCRIPT
sudo apt-get update

sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'

sudo apt-get install -y vim curl python-software-properties
sudo add-apt-repository -y ppa:ondrej/php
sudo apt-get update
curl -sL https://deb.nodesource.com/setup_6.x | sudo -E bash -

sudo apt-get install -y php7.1 apache2 libapache2-mod-php7.1 php7.1-curl php7.1-gd php7.1-mcrypt php7.1-readline mysql-server-5.5 php7.1-mysql git-core php-xdebug beanstalkd supervisor memcached php-memcached nodejs php7.1-soap php7.1-mbstring php7.1-xml php7.1-zip

mysql -u root -proot -e'create database sentral'

cat << EOF | sudo tee -a /etc/php/7.1/mods-available/xdebug.ini
xdebug.remote_enable = on
xdebug.remote_connect_back = on
xdebug.idekey = "vagrant"
xdebug.scream=1
xdebug.cli_color=1
xdebug.show_local_vars=1
EOF

mysql -u root -proot -e"grant all on *.* to root@'192.168.33.1' IDENTIFIED BY 'root'" mysql

sudo a2enmod rewrite

sed -i "s/error_reporting = .*/error_reporting = E_ALL/" /etc/php/7.1/apache2/php.ini
sed -i "s/display_errors = .*/display_errors = On/" /etc/php/7.1/apache2/php.ini
sed -i "s/disable_functions = .*/disable_functions = /" /etc/php/7.1/cli/php.ini
sed -i "s/#START=yes/START=yes/" /etc/default/beanstalkd
sed -i "s/127.0.0.1/0.0.0.0/" /etc/mysql/my.cnf

#start services
sudo service mysql restart
sudo service apache2 restart

curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo chmod +x /usr/local/bin/composer

echo "Australia/Sydney" | sudo tee /etc/timezone
echo "cd /vagrant" >> /home/vagrant/.bashrc

echo "192.168.33.20 sentral.local" | sudo tee -a /etc/hosts

cd /vagrant
composer install
php artisan migrate
php artisan db:seed

SCRIPT

$vhost_setup = <<SCRIPT
VHOST=$(cat <<EOF
<VirtualHost *:80>
  DocumentRoot "/vagrant/public"
  ServerName localhost
  ServerAlias sentral.local
  <Directory "/vagrant/public">
    AllowOverride All
    Require all granted
  </Directory>
</VirtualHost>
EOF
)
echo "${VHOST}" > /etc/apache2/sites-enabled/000-default.conf

sudo service apache2 restart
SCRIPT


Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.provision "shell", inline: $install_requirements
  config.vm.provision "shell", inline: $vhost_setup
  config.vm.box = "ubuntu/trusty64"
  config.vm.box_url = "https://atlas.hashicorp.com/ubuntu/boxes/trusty64"
  config.vm.network "forwarded_port", guest: 80, host: 8020
  #config.vm.network "forwarded_port", guest: 8001, host: 8000
  config.vm.network "private_network", ip: "192.168.33.22"
  config.vm.synced_folder ".", "/vagrant", :mount_options => ["dmode=777","fmode=666"]
end