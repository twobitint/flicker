#!/bin/sh

# listen on all interfaces
sed -i 's/skip-networking/bind-address=0.0.0.0/' /etc/my.cnf.d/mariadb-server.cnf

# create socket directory
if [ ! -d "/run/mysqld" ]; then
	mkdir -p /run/mysqld
	chown -R mysql /run/mysqld
fi

# create data directory
if [ ! -d /var/lib/mysql/mysql ]; then
	chown -R mysql /var/lib/mysql
  mysql_install_db --user=mysql --datadir=/var/lib/mysql > /dev/null

  # create dev superuser
  mysqld --user=mysql --bootstrap --verbose=0 <<EOF
    FLUSH PRIVILEGES;

    CREATE USER IF NOT EXISTS
      'dev'@'%' IDENTIFIED BY 'dev';

    GRANT ALL PRIVILEGES ON *.* TO 'dev'@'%';

    CREATE DATABASE IF NOT EXISTS 'dev';

    FLUSH PRIVILEGES;
EOF
fi

# start the server
exec mysqld --user=mysql --console
