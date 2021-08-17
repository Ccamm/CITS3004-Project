FROM debian:buster-slim

# Install system packages
RUN apt-get update && apt-get install -y xinetd build-essential

# Copy source code to container
RUN mkdir -p /app
COPY app /app
COPY config/game.conf /etc/xinetd.d/game
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Compile game
RUN gcc -o /app/game /app/game.c

# Setup startup script
RUN chmod +x /app/start_server.sh

EXPOSE 1001

CMD ["/start.sh"]
