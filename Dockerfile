FROM wordpress:php8.2

ENV TZ=America/Sao_Paulo

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN apt update && \
    apt install nodejs npm -y && \
    npm install -g yarn &&  \    
    chmod g=u /var/www/html

