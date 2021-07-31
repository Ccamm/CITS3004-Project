FROM debian:buster-slim

# Install system packages
RUN apt-get update && apt-get install -y socat build-essential

# Copy source code to container
RUN mkdir -p /app
COPY app /app

# Compile game
RUN gcc -o /app/game /app/game.c

# Setup startup script
RUN chmod +x /app/start_server.sh

EXPOSE 1337

ENTRYPOINT ["/app/start_server.sh"]
