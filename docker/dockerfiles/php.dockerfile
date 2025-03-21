FROM php:8.2-fpm-alpine

ARG UID
ARG GID

ENV UID=${UID}
ENV GID=${GID}

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN addgroup -g ${GID} --system zaryad
RUN adduser -G zaryad --system -D -s /bin/sh -u ${UID} zaryad

RUN sed -i "s/user = www-data/user = zaryad/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = zaryad/g" /usr/local/etc/php-fpm.d/www.conf

USER zaryad

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]
