# Silex-Services-AngularJs-Json

Silex sample app that retrieves the data from services as Json.
Front-end with basic AngularJs implementation and Twig

You will find the following:
1. How to define Services
2. Curl abstraction. Request data with cURL.
3. Basic usage of AngualJs.
4. Twig with AngularJs

# Creating a Silex Application

Clone or download the project and run composer

# Running Unit Test

Not provided yet.

# Installation

1. $composer install
2. edit Config/prod.php file and set up the configurations.

# web server

1. Apache2 configuration
``` Apache
<Virtualhost *:80>
        ServerName frontend.localhost
        DocumentRoot /yourpaht/Silex-Services-AngularJs-Json/web
        SetEnv APPLICATION_ENV "development"
        <Directory /yourpath/Silex-Services-AngularJs-Json/web>
                DirectoryIndex index.php
                AllowOverride All
                Require all granted
        </Directory>
</VirturalHost>
```
2. Enable configurations
a2ensite [yourfile].conf

3. set your virtual hos at 
/etc/hosts

4. reload apache2
service apache2 reload

