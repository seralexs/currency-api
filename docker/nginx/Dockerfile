FROM nginx:1.13.0-alpine

COPY ./configs/app.conf /etc/nginx/conf.d/app.conf
COPY ./configs/nginx.conf /etc/nginx/nginx.conf

RUN apk add --no-cache nginx-mod-http-perl=1.10.3-r1

EXPOSE 80