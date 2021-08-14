#!/bin/bash
while [ -z "`netstat -tln | grep 3306`" ];
do
  echo "Waiting for MySQL server to start";
  sleep 1;
done

echo "Initializing MySQL server";
mysql -u root -p'9XM8YPp!5sEKS^4oVz@eghrmieLVws%g' -e 'CREATE DATABASE cssubmitdb'
mysql -u root -p'9XM8YPp!5sEKS^4oVz@eghrmieLVws%g' cssubmitdb < /run/create_db.sql
