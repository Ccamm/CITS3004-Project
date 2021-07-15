FROM python:3.8-alpine

# Install packages
RUN echo 'http://dl-cdn.alpinelinux.org/alpine/v3.6/main' >> /etc/apk/repositories
RUN echo 'http://dl-cdn.alpinelinux.org/alpine/v3.6/community' >> /etc/apk/repositories
RUN apk add --update --no-cache supervisor mongodb

# Setup app
COPY app /app
WORKDIR /app

# Install dependencies
RUN pip3 install -r requirements.txt

# Setup supervisord
COPY config/supervisord.conf /etc/supervisord.conf

# Expose the port flask is reachable on
EXPOSE 1337

# Create entrypoint
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Start flask application
ENTRYPOINT /entrypoint.sh
