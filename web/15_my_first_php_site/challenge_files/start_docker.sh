#!/bin/bash

docker build -t my-first-php-site . && \
docker run -it -p 1337:1337 --rm --name my-first-php-site-container my-first-php-site
