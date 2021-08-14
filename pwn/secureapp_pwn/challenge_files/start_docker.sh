#!/bin/bash

docker build -t secureapp . && \
docker run -it -p 1337:1337 --rm --name secureapp-container secureapp
