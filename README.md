## Chronolabs Cooperative presents

# Toxicology Screening REST API ~ http://screening.snails.email

### Author: Simon Antony Roberts <simon@snails.email>

This REST API is for generating a toxicology selection randomly or on occassion co-ordinating via email toxicology screening like narcotic drugs for safety workers and heavy machine operators!

## Mod Rewrite Short URL

You will need to have this in API_ROOT_PATH/.htaccess
    
    #Forces SSL
    #RewriteEngine On
    #RewriteCond %{SERVER_PORT} !^443$
    #RewriteRule .* https://%{SERVER_NAME}%{REQUEST_URI} [R,L=301]
    
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^v1/([0-9]+)/([-+]?[0-9]*\.?[0-9]+)/([a-z]+).api?(.*?) ./index.php?selected=$1&seed=$2&output=$3&4 [L,NC,QSA]
    RewriteRule ^v1/([0-9]+)/([-+]?[0-9]*\.?[0-9]+)/([a-z]+).api ./index.php?selected=$1&seed=$2&output=$3 [L,NC,QSA]
    RewriteRule ^v1/([0-9]+)/([a-z]+).api?(.*?) ./index.php?selected=$1&output=$2&$3 [L,NC,QSA]
    RewriteRule ^v1/([0-9]+)/([a-z]+).api ./index.php?selected=$1&output=$2 [L,NC,QSA]
    
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^v([0-9]+)/(.*?)/(form).api ./form.php?version=$1&hash=$2&output=$3 [L,NC,QSA]
    RewriteRule ^v([0-9]+)/(.*?)/(callback).api ./callback.php?version=$1&hash=$2&output=$3 [L,NC,QSA]
    RewriteRule ^v([0-9]+)/(.*?).png ./1x1.php?version=$1&hash=$2&output=1x1 [L,NC,QSA]
    RewriteRule ^v([0-9]+)/([0-9]+)/([-+]?[0-9]*\.?[0-9]+)/([a-z]+).api?(.*?) ./index.php?version=$1&selected=$2&seed=$3&output=$4&$5 [L,NC,QSA]
    RewriteRule ^v([0-9]+)/([0-9]+)/([-+]?[0-9]*\.?[0-9]+)/([a-z]+).api ./index.php?version=$1&selected=$2&seed=$3&output=$4 [L,NC,QSA]
    RewriteRule ^v([0-9]+)/([0-9]+)/([a-z]+).api?(.*?) ./index.php?version=$1&selected=$2&output=$3&$4 [L,NC,QSA]
    RewriteRule ^v([0-9]+)/([0-9]+)/([a-z]+).api ./index.php?version=$1&selected=$2&output=$3 [L,NC,QSA]
    
### Enabling module rewrite with apache on ubuntu

Execute the following to enable .htacess and module URL rewritting

    $ sudo a2enmod rewrite
    $ sudo service apache2 restart

## Installation

Copy the PHP file to your hosting spot, then run the install with your browser!