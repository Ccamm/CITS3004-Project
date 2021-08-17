FROM debian:buster-slim
RUN sed -i "s/http:\/\/archive.ubuntu.com/http:\/\/mirrors.ustc.edu.cn/g" /etc/apt/sources.list
RUN apt-get update && apt-get -y upgrade
RUN apt-get install -y lib32z1 xinetd socat

RUN mkdir -p /app
COPY config/secureapp.conf /etc/xinetd.d/secureapp
COPY chall/secureapp /app/secureapp
COPY start.sh /start.sh
COPY revflag /revflag
COPY bofflag /bofflag
RUN chmod +r /revflag
RUN chmod +r /bofflag
RUN chmod +x /start.sh
RUN chmod +x /app/secureapp

RUN useradd -m app
RUN chown -R root:app /app

CMD ["/start.sh"]

EXPOSE 1002
