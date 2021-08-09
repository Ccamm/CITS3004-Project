#!/bin/sh

# Secure entrypoint
chmod 600 /entrypoint.sh
mkdir /tmp/mongodb
mongod --noauth --dbpath /tmp/mongodb/ &
sleep 2
mongo secure_login --eval "db.createCollection('users')"
mongo secure_login --eval 'db.users.insert( { username: "admin", password: "CTFnosqlregexking"} )'
/usr/bin/supervisord -c /etc/supervisord.conf
