# docker_nginx_php7.2_mysql_ssl
Docker com tudo pronto para trabalhar com vários projetos em qualquer máquina Windows, Linux ou Mac
Este docker tem:

NGINX com SSL
PHP 7.4
PHP 7.2
MongoDB
Mongo Express para adminstrar
PostgresSql
Mysql

**1 - Efetue o download com o git clone https://github.com/cgrio/docker_nginx_php7.2_mysql_ssl/**

**2 - Acesse a pasta e crie a interface de rede externa com o comando:**

***docker network create container_net***  

**3 - Depois inicie os containers com o comando:**  
***docker-compose up --build -d***

**4 - Para adicionar um novo projeto:**  
adicione o projeto à um diretório na pasta www   

**5 - Copie e cole o arquivo config/nginx/exemplo.co.conf**  

**6 - Renomeie o arquivo para o nome do seu projeto:**  
rename exemplo.co(1).conf lojavirtual.co.conf  

**7 - Altere o arquivo para as novas configurações (veja comentários iniciados por "//" e os remova este trecho localizado no final de cada linha do arquivo):**

    server {
        index index.php index.html;
        listen 443 ssl;
        listen 80;
        server_name exemplo.co; //substitua a palavra exemplo por lojavirtual
        error_log  /var/log/nginx/exemplo.co-error.log; //substitua a palavra exemplo por lojavirtual
        access_log /var/log/nginx/exemplo.co-access.log; //substitua a palavra exemplo por lojavirtual
        root /usr/share/nginx/html/exemplo/public; //substitua a palavra exemplo por lojavirtual
        ssl_certificate     /usr/local/nginx/ssl/cert.crt;
        ssl_certificate_key /usr/local/nginx/ssl/cert.key;
        ssl_protocols       SSLv3 TLSv1 TLSv1.1 TLSv1.2;
        ssl_ciphers         HIGH:!aNULL:!MD5;


        location ~ \.php$ {
            try_files $uri =404;
            fastcgi_split_path_info ^(.+\.php)(/.+)$;
            fastcgi_pass php7-4:9000;//versão do php se tiver que alterar mude 7-4 para 7-2
            fastcgi_index index.php;
            fastcgi_buffers 16 16k;
            fastcgi_buffer_size 32k;
            include fastcgi_params;
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
            fastcgi_param PATH_INFO $fastcgi_path_info;
        }
        location / {
            try_files $uri $uri/ /index.php?$query_string;
            gzip_static on;
        }
    }



