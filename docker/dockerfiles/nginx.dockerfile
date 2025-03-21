FROM nginx:stable-alpine

ARG UID
ARG GID

ENV UID=${UID}
ENV GID=${GID}

WORKDIR /var/www/html

RUN addgroup -g ${GID} --system zaryad
RUN adduser -G zaryad --system -D -s /bin/sh -u ${UID} zaryad
RUN sed -i "s/user  nginx/user zaryad/g" /etc/nginx/nginx.conf
