Listen 1337

<VirtualHost localhost:1337>

	ServerName 2014.mia-journal.com
	DocumentRoot /var/www/mia-2014/code
	
	<Directory /var/www/mia-2014/code>
		Order Deny,Allow
		Allow from all
		
		RewriteEngine on

		RewriteCond %{REQUEST_FILENAME} !index.php
		RewriteRule .* index.php?url=$0 [QSA,L]
	</Directory>
	
	CustomLog /var/www/mia-2014/logs/apache/access.log combined
	ErrorLog /var/www/mia-2014/logs/apache/error.log
  
</VirtualHost>
