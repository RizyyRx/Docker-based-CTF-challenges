#! /bin/bash

# Remove index.html file inside /var/www/html/
rm -f /var/www/html/index.html

# Start the apache2 service
service apache2 start

# Keep the script running (keep the container running)
tail -f /dev/null