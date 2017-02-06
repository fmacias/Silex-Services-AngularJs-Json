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
<VirtualHost *:80>
        # The ServerName directive sets the request scheme, hostname and port that
        # the server uses to identify itself. This is used when creating
        # redirection URLs. In the context of virtual hosts, the ServerName
        # specifies what hostname must appear in the request's Host: header to
        # match this virtual host. For the default virtual host (this file) this
        # value is not decisive as it is used as a last resort host regardless.
        # However, you must set it for any further virtual host explicitly.
        ServerName mitto-frontend.localhost
        DocumentRoot /home/fernando/PhpstormProjects/MittoFrontend/web
        SetEnv APPLICATION_ENV "development"
        <Directory /home/fernando/PhpstormProjects/MittoFrontend/web>
                DirectoryIndex index.php
                AllowOverride All
                Require all granted
        </Directory>
</VirtualHost>
```
2. Enable configurations
a2ensite [yourfile].conf

3. set your virtual hos at 
/etc/hosts

4. reload apache2
service apache2 reload

