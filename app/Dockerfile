FROM ubuntu:latest
ARG DEBIAN_FRONTEND=noninteractive
ENV TZ=Europe/Moscow
RUN apt update && apt install -y mysql-server mysql-client net-tools php php-cli php-fpm php-json php-common php-mysql
#python3 python3-pip

COPY ./app /app
WORKDIR /app
RUN php --version

#EXPOSE 8000
RUN chmod +x start.sh
#CMD ["php", "./setup_db.php"]
#CMD php -S 0.0.0.0:8000

ENTRYPOINT ["./start.sh"]

#CMD pip3 install simple-http-server
#CMD python3 -m http.server 8000
