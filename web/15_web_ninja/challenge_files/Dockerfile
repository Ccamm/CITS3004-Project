FROM python:3.8-slim-buster

# Install dependencies
RUN apt-get update && apt-get install -y supervisor

# Setup supervisord
COPY config/supervisord.conf /etc/supervisord.conf

# Make app location
RUN mkdir -p /app

# Copy flag to /flag
COPY flag /flag

# Setup Flask Web server
WORKDIR /app
COPY /app .
RUN pip3 install -r requirements.txt

# Expost the port flask is reachable on
EXPOSE 1008

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
