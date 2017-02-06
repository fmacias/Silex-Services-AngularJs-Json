# Silex-Services-AngularJs-Json

Silex sample app that retrieves the data from services as Json.
Front-end with basic AngularJs implementation and Twig

# Creating a Silex Application

Clone or download the project and run composer

# Running Unit Test

Not provided yet.

# Installation

1. $composer install
2. edi Config/prod.php file and set up the configurations.

# web server

1. Apache2 configuration
``` Apache 2
ServerName frontend.localhost
        DocumentRoot /yourpaht/Silex-Services-AngularJs-Json/web
        SetEnv APPLICATION_ENV "development"
        <Directory /yourpath/Silex-Services-AngularJs-Json/web>
                DirectoryIndex index.php
                AllowOverride All
                Require all granted
        </Directory>
```
2. Enable configurations
a2ensite [yourfile].conf

3. set your virtual hos at 
/etc/hosts

4. reload apache2
service apache2 reload

