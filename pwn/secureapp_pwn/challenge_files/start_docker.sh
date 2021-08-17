#!/bin/bash

docker build -t secureapp-1002 . && \
docker run -it -p 1002:1002 --rm --name secureapp-container secureapp-1002
