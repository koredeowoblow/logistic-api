# Base PHP image
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory to where Render expects
WORKDIR /var/www/html

# Copy all project files
COPY . .

# Copy and make deploy script executable
COPY scripts/00-laravel-deploy.sh /usr/local/bin/00-laravel-deploy.sh
RUN chmod +x /usr/local/bin/00-laravel-deploy.sh

# Expose port (optional)
EXPOSE 8000

# Start using deployment script
CMD ["sh", "-c", "/usr/local/bin/00-laravel-deploy.sh"]
