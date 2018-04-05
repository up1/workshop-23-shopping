FROM composer:latest
WORKDIR /app
COPY composer.json /app/
RUN composer install
COPY . /app/
CMD sh ./bin/server.sh
