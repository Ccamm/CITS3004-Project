#!/bin/bash

docker build -t cssubmit-v2 . && \
docker-compose up;
docker-compose rm -f;
docker rmi cssubmit-v2
