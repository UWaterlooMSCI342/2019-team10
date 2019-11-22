export DEBIAN_FRONTEND=noninteractive
apt-get -q -y install mysql-server
mysqladmin -u root password $1
mysql -uroot -proot < prod_schema.sql