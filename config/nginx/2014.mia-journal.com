server {
	listen 2014.mia-journal.com:80;
	server_name 2014.mia-journal.com;
	
	location ~ ^.*\.(css|js|png|jpg|jpeg|pdf)$ {
	  root /var/www/mia-2014/code/;
	}
	
	location / {
		proxy_pass http://localhost:1337;
		proxy_set_header Host $host;
    proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
    proxy_set_header X-Forwarded-Proto $scheme;
  }
}
