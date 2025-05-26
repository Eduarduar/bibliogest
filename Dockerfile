# Dockerfile para proyecto PHP en carpeta app
FROM php:8.2-apache

# Instalar extensiones necesarias para PostgreSQL y utilidades
RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pdo pdo_pgsql pgsql

# Activar mod_rewrite de Apache
RUN a2enmod rewrite

# Copiar todo el código fuente a /var/www/html/app
COPY . /var/www/html/app

# Establecer el directorio de trabajo
WORKDIR /var/www/html/app

# Dar permisos apropiados a la carpeta app
RUN chown -R www-data:www-data /var/www/html/app && \
    chmod -R 755 /var/www/html/app

# Exponer el puerto 80
EXPOSE 80

# Variables de entorno recomendadas para producción (ajusta si es necesario)
ENV APACHE_DOCUMENT_ROOT=/var/www/html/app/public

# Cambiar el DocumentRoot de Apache
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}/!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Permitir .htaccess en /public
RUN echo '<Directory /var/www/html/app/public>\n    AllowOverride All\n</Directory>' >> /etc/apache2/apache2.conf

# Comando por defecto
CMD ["apache2-foreground"]
