#!/bin/bash
# Database Installation Script
# Online Newspaper System

echo "========================================="
echo " Database Installation"
echo " Online Newspaper System"
echo "========================================="
echo ""

# Get database credentials
read -p "Enter MySQL username [root]: " DB_USER
DB_USER=${DB_USER:-root}

read -sp "Enter MySQL password: " DB_PASS
echo ""

read -p "Enter database name [vnnsbiz]: " DB_NAME
DB_NAME=${DB_NAME:-vnnsbiz}

echo ""
echo "Installing database schema..."
echo ""

# Run SQL file
mysql -u "$DB_USER" -p"$DB_PASS" "$DB_NAME" < database/newspaper_schema.sql

if [ $? -eq 0 ]; then
    echo ""
    echo "========================================="
    echo " Database installed successfully!"
    echo "========================================="
    echo ""
    echo "Next steps:"
    echo "1. Update includes/config.php with your database credentials"
    echo "2. Set proper file permissions"
    echo "3. Access the system at http://vnn.mac.in.th/newspaper/"
    echo ""
else
    echo ""
    echo "========================================="
    echo " Error installing database!"
    echo "========================================="
    echo ""
    echo "Please check:"
    echo "1. MySQL credentials are correct"
    echo "2. Database exists"
    echo "3. User has proper permissions"
    echo ""
    exit 1
fi
