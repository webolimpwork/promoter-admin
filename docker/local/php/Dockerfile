FROM php:8.3-fpm

WORKDIR /var/www

ARG localUid
ARG localGid
ARG localUser

# Устанавливаем зависимости и PHP-расширения
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    ffmpeg \
    libpq-dev \
    libzip-dev \
    libpng-dev \
    libwebp-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libgmp-dev \
    libgd-dev \
    librdkafka-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) \
        pdo_pgsql \
        pgsql \
        bcmath \
        gd \
        zip \
        exif \
        gmp \
        fileinfo \
        pcntl \
    && pecl install redis rdkafka \
    && docker-php-ext-enable redis rdkafka \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Копируем php.ini
COPY ./docker/local/php/php.ini /usr/local/etc/php/conf.d/php.ini

# Создание пользователя
RUN groupadd --gid $localGid $localUser && \
    useradd --gid $localGid --uid $localUid -m $localUser

USER $localUser
