FROM debian:buster-slim

# Install system packeges
RUN apt-get update && apt-get install -y supervisor nginx lsb-release curl wget gnupg

# Add repos
RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/php.list

RUN wget -O /tmp/mysql_apt_config.deb https://dev.mysql.com/get/mysql-apt-config_0.8.13-1_all.deb
RUN echo "wer"
RUN printf "1\n1\n4\n" | dpkg -i /tmp/mysql_apt_config.deb
# RUN echo "4" | dpkg -i /tmp/mysql_apt_config.deb
RUN echo 'mysql-community-server mysql-community-server/root-pass password 9XM8YPp!5sEKS^4oVz@eghrmieLVws%g' | debconf-set-selections
RUN echo 'mysql-community-server mysql-community-server/re-root-pass password 9XM8YPp!5sEKS^4oVz@eghrmieLVws%g' | debconf-set-selections

# Install PHP dependencies
RUN apt update && apt install -y php7.4-fpm php7.4-mysqli net-tools
RUN echo '1' | apt install -y mysql-server

# Configure php-fpm and nginx
COPY config/fpm.conf /etc/php/7.4/fpm/php-fpm.conf
COPY config/supervisord.conf /etc/supervisord.conf
COPY config/nginx.conf /etc/nginx/nginx.conf

# Copy challenge files
COPY src /var/www/html

# Copy SQL script and create DB
COPY create_db.sql /run/create_db.sql
COPY init_db.sh /run/init_db.sh
RUN chmod +x /run/init_db.sh

# Setup permissions
RUN chown -R www-data:www-data /var/www/html/assets
RUN chown -R www-data:www-data /var/www/html/images
RUN chown -R www-data:www-data /var/www/html/uploads

RUN chmod -R 770 /var/www/html/uploads
RUN chmod -R 550 /var/www/html/assets
RUN chmod -R 550 /var/www/html/images
RUN chmod -R +r /var/www/html/
RUN echo "echo One of our team members ran rm -rf / to see what would happen and it wiped all of our work...;" > /bin/rm
RUN echo "echo So we have removed it from the server to prevent them doing that again.;" >> /bin/rm
RUN echo "echo Someone in our prof comp team kept on setting insecure permissions so we just got rid of chmod;" > /bin/chmod
RUN echo "echo This is also a bad command that our team member broke our server with;" > /bin/rmdir

COPY flag /flag
RUN chmod 444 /flag
# Expose the port nginx is listening on
EXPOSE 1005

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
