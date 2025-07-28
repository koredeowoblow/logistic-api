# Use official PHP image with Composer
FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libzip-dev \
    zip

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql zip

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Make your deploy script executable (if needed)
RUN chmod +x /usr/local/bin/00-laravel-deploy.sh

# Run the script as entrypoint or command
CMD ["sh", "/usr/local/bin/00-laravel-deploy.sh"]
