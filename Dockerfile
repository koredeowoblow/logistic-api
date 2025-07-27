# Dockerfile
# Base image (e.g. php + apache)
FROM php:8.2-cli

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Copy the deploy script to the root
COPY scripts/00-laravel-deploy.sh /usr/local/bin/00-laravel-deploy.sh

# Make it executable
RUN chmod +x /usr/local/bin/00-laravel-deploy.sh

# Run the script as entrypoint or command
CMD ["sh", "/usr/local/bin/00-laravel-deploy.sh"]
