FROM nginx:stable-alpine

ADD ./Nginx/cliente-feliz.com.br.conf /etc/nginx/templates/cliente-feliz.com.br.conf.template

RUN mkdir -p /var/www/html

RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel

RUN chown -R laravel:laravel /var/www/html