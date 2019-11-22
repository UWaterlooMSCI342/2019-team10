# Deployment Instructions

1- SSH onto your desired Ubuntu 18 VM 

2- Install Apache using the following command
`sudo apt install apache2`

3- Update your apt package manager using the following command 
`sudo apt-get update`

4 cd into apache serving folder `cd /var/www/html/` and run `sudo git clone https://github.com/UWaterlooMSCI342/2019-team10.git`

5 Install PHP and required packages using the following command 
`sudo apt install php libapache2-mod-php php-mbstring php-xmlrpc php-soap php-gd php-xml php-cli php-zip php-bcmath php-tokenizer php-json php-pear`

6 Install the PHP mySQL drivers 
`sudo apt-get install php-mysql`

7 Run the `sudo bash database_deploy.sh (password)` bash script to initialize and setup mySQL database 

8 Run the command `sudo mysql -u root -p`, and when the interface opens, run the following commands in mySQL: 
```sql
update mysql.user set authentication_string=password('password') where user='root';
update mysql.user set plugin='mysql_native_password' where User='root';
FLUSH PRIVILEGES;
```

9 Create an environment .env file and add the following lines: 
 ```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dnd
DB_USERNAME=root
DB_PASSWORD= (ADD YOUR OWN PASSWORD)
```

10- Go to home directory `cd /home`, and istall composer with the following command:
  `curl -sS https://getcomposer.org/installer | php`
  `sudo mv composer.phar /usr/local/bin/composer`
  ` sudo chmod +x /usr/local/bin/composer`
  

11 Give the proper permissions via the following commands:
  `sudo chgrp -R www-data /var/www/html/2019-team10/`
  `sudo chmod -R 775 /var/www/html/2019-team10/`
  
12 Make the virutal host through the following steps: 
    `sudo vim/etc/apache2/sites-available/dnd.conf`

 ```xml
   <VirtualHost *:80>
		 DocumentRoot /var/www/html/2019-team10/dnd/public
		 <Directory /var/www/html/2019-team10/dnd/>
			 AllowOverride All
		 </Directory>
		 ErrorLog ${APACHE_LOG_DIR}/error.log
		 CustomLog ${APACHE_LOG_DIR}/access.log combined
     </VirtualHost>
```

13-Run the following commands to enable your site
``3
    sudo a2dissite 000-default.conf
    sudo a2ensite dnd.conf
    sudo a2enmod rewrite
    sudo systemctl restart apache2
``


14- Go to your project directory `cd /var/www/html/2019-team10/dnd`, and run the following commands: 
```
    sudo composer global require "laravel/lumen-installer"
    sudo composer install
    php artisan migrate:fresh
    php read:csv
```
