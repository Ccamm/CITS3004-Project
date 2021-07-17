#!/bin/bash

socat -d TCP4-LISTEN:1337,reuseaddr,fork EXEC:/app/game,pty,echo=0;
