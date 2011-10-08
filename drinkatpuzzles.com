<VirtualHost *:80>
  ServerName drinkatpuzzles.com
  DocumentRoot /home/wbdev/drinkatpuzzles.com/public
  <Directory /home/wbdev/drinkatpuzzles.com/public>
    Allow from all
    Options Indexes FollowSymLinks MultiViews 
    AllowOverride All
  </Directory>
</VirtualHost>
