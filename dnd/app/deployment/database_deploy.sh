export DEBIAN_FRONTEND=noninteractive
sudo apt-get -q -y install mysql-server
sudo mysqladmin -u root password $1
sudo mysql -uroot -proot < prod_schema.sql