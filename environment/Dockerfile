FROM php:7.3-fpm-stretch
USER root
# zlib1g-dev: required by zip
RUN apt-get update -qq \
  && apt-get install -qq --no-install-recommends \
    git \
    vim \
    zip \
    unzip \
    nginx \
    nginx-extras \
    supervisor \
    libzip-dev \
    libssl-dev \
    zlib1g-dev \
    libcap2-bin \
 && apt-get clean
RUN pecl install xdebug \
  && docker-php-ext-install \
    pcntl \
    zip \
    pdo_mysql \
    mbstring \
    exif \
  && rm -rf /tmp/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN sed -ri -e 's!user = www-data!; user = www-data!g' \
  /usr/local/etc/php-fpm.d/www.conf \
  && sed -ri -e 's!group = www-data!; group = www-data!g' \
  /usr/local/etc/php-fpm.d/www.conf

RUN sed -ri -e 's!/run/nginx.pid!/var/run/nginx/nginx.pid!g'  /etc/nginx/nginx.conf \
      && sed -ri -e 's!user www-data;!daemon off;!g' \
      /etc/nginx/nginx.conf \
      && sed -ri -e 's!# server_tokens off;!more_clear_headers Server;!g' \
      /etc/nginx/nginx.conf

RUN sed -ri -e 's!user = www-data!; user = www-data!g' \
      /usr/local/etc/php-fpm.d/www.conf \
      && sed -ri -e 's!group = www-data!; group = www-data!g' \
      /usr/local/etc/php-fpm.d/www.conf

RUN ln -sf /dev/stdout /var/log/nginx/access.log \
  && ln -sf /dev/stderr /var/log/nginx/error.log

ARG UID=1000
ARG GID=1000

RUN groupmod -g ${GID} www-data \
  && usermod -u ${UID} -g www-data www-data \
  && mkdir -p /var/www/html \
  /var/run/supervisor \
  /var/run/nginx \
  /var/log/supervisor \
  && chown -hR www-data:www-data \
    /var/www \
    /usr/local/ \
    /etc/nginx/ \
    /var/lib/nginx/ \
    /var/log/nginx/ \
    /var/run/nginx \
    /var/run/supervisor \
    /var/log/supervisor \
    && setcap 'cap_net_bind_service=+ep' /usr/sbin/nginx

COPY ./environment/default /etc/nginx/sites-enabled/default

COPY ./environment/supervisord.conf /etc/supervisor/supervisord.conf

# Prevent error in nginx error.log
RUN touch /var/log/xdebug_remote.log
RUN chmod 777 /var/log/xdebug_remote.log

USER www-data:www-data
WORKDIR /var/www/html
ENV PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/var/www/.composer/vendor/bin
EXPOSE 80
STOPSIGNAL SIGTERM
CMD ["/usr/bin/supervisord"]
USER root
RUN docker-php-ext-enable xdebug
COPY ./environment/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
USER www-data:www-data
