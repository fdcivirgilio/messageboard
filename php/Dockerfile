# Load PHP 8 with Apache
FROM php:8.1-apache

# Install dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip mysqli pdo pdo_mysql \
    && a2enmod ssl \
    && a2enmod rewrite

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install prerequisites for GitHub CLI
RUN apt-get install -y \
    ca-certificates \
    gnupg \
    lsb-release \
    && apt-key adv --keyserver keyserver.ubuntu.com --recv-key C99B11DEB97541F0 \
    && apt-add-repository https://cli.github.com/packages \
    && apt-get update

# Install GitHub CLI
RUN apt-get install -y gh

# Add custom Apache configuration
COPY ./php/apache2.conf /etc/apache2/apache2.conf

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Add Mutex configuration for Apache
RUN echo "Mutex posixsem" >> /etc/apache2/apache2.conf

# Expose ports
EXPOSE 443
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
