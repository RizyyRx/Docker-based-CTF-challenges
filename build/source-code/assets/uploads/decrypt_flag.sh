#!/bin/bash

# Check if password is provided as an argument
if [ -z "$1" ]; then
    echo "Usage: $0 password"
    exit 1
fi

password="$1"

openssl enc -d -aes-256-cbc -pbkdf2 -in /var/www/html/assets/uploads/flag.txt.enc -out /var/www/html/assets/uploads/flag.txt -k "$password"

if [ $? -eq 0 ]; then
    echo "Decryption successful. The flag is:"
    cat /var/www/html/assets/uploads/flag.txt
else
    echo "Decryption failed. Incorrect password."
fi
