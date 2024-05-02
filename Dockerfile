FROM php:7.4-apache

# Install MySQLi extension
RUN docker-php-ext-install mysqli


# Copy the PHP files into the container
COPY index.php /var/www/html/

# Set environment variables for database connection
ENV DB_HOST your_rds_endpoint
ENV DB_USER your_db_username
ENV DB_PASSWORD your_db_password
ENV DB_NAME your_db_name

# Expose port 80
EXPOSE 38080
