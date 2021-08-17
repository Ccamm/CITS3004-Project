#!/bin/bash

docker build -t my-first-php-site-1006 . && \
docker run -it -p 1006:1006 --rm --name my-first-php-site-container my-first-php-site-1006
