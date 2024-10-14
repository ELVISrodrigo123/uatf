# Usa una imagen base de Alpine para PHP
FROM php:7.4-fpm-alpine

# Mantenedor del contenedor
LABEL MAINTAINER="tu_email@dominio.com"

# Instala las dependencias necesarias
RUN apk update && \
    apk add --no-cache bash curl unzip wget php-pdo php-pdo_mysql php-mysqli php-json

# Crea el directorio de trabajo
WORKDIR /var/www/html

# Copia los archivos de la aplicación web al contenedor
COPY . /var/www/html

# Configura permisos de los archivos
RUN chmod -R 755 /var/www/html

# Exponer el puerto 80 para servir la aplicación web
EXPOSE 80

# Inicia PHP y el servidor web
CMD ["php", "-S", "0.0.0.0:80", "-t", "/var/www/html"]
