# Use the Ubuntu 20.04 base image
FROM ubuntu:22.04

# Define timezone environment variable
ENV TZ=Asia/Kolkata

# Set Debian frontend to noninteractive mode
ENV DEBIAN_FRONTEND=noninteractive

# Update package lists and upgrade installed packages
RUN apt update && apt upgrade -y

# Install necessary applications and services
RUN apt install -y htop apache2 php libapache2-mod-php php-mysql git nano

# Install locales and generate locale
RUN apt install -y locales locales-all
RUN locale-gen --purge en_US.UTF-8

# Set working directory inside the container
WORKDIR /var/www/html

# Copy contents of the source-code directory to /var/www/html/
COPY source-code/. /var/www/html/

# Copy contents of the scripts directory to /var/scripts/
COPY scripts/. /var/scripts/

# Make the entry.sh script executable
RUN chmod +x /var/scripts/entry.sh

# Set proper ownership and permissions for uploads directory
RUN chown -R www-data:www-data /var/www/html/assets/uploads
RUN chmod -R 755 /var/www/html/assets/uploads


# Expose port 80 to allow external access
EXPOSE 80

# Set the default command to run the entry.sh script
CMD /var/scripts/entry.sh
