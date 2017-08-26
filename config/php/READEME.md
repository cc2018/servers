# php相关配置
php的安装、配置、启动等

### php安装

可在php官方[下载页面](http://php.net/downloads.php)，选择一个较新的稳定版本。

这里选择[php 7.1.8](http://hk2.php.net/distributions/php-7.1.8.tar.gz)

php的编译安装依赖：libxml2-devel、openssl-devel、zlib、BZip2、libcurl、libjpg、libpng、freetype等


```
sudo yum install libjpeg.x86_64 libpng.x86_64 freetype.x86_64 libjpeg-devel.x86_64 libpng-devel.x86_64 freetype-devel.x86_64 -y

wget http://hk2.php.net/distributions/php-7.1.8.tar.gz
tar -xzvf php-7.1.8.tar.gz
cd php-7.1.8
./configure  --prefix=$HOME/local/php --with-pdo-mysql=mysqlnd --with-mysqli=mysqlnd --enable-mysqlnd --enable-mbstring --enable-mbregex --with-curl --enable-sockets --with-iconv --with-freetype-dir --with-png-dir --with-jpeg-dir --with-gd --with-zlib=$HOME/local/zlib --enable-xml --with-openssl --enable-pcntl --enable-zip --with-bz2 --enable-soap --enable-exif --enable-ftp --enable-shmop --with-libxml-dir --with-mhash --with-xmlrpc --enable-wddx --with-curl --enable-fpm
make && make install

```

### php配置

编辑$HOME/local/php/etc/php-fpm.conf，打开配置

```
pid = run/php-fpm.pid
error_log = log/php-fpm.log
```

编辑$HOME/local/php/etc/php-fpm.d/www.conf

```
user = work
group = work
listen.owner = xxx_user
listen.group = xxx_user
```

### php-fpm启动

```
sudo $HOME/local/php/sbin/php-fpm
```

### nginx php配置

如下示例：

```
server {
    listen       8091;
    server_name  localhost;

    charset  utf-8;
    access_log  /home/work/webs/php-web/logs/access.log;
    error_log  /home/work/webs/php-web/logs/error.log;

    #access_log  logs/host.access.log  main;

    #try_files $uri $uri/ @rewrite;    
    #location @rewrite {    
        #rewrite ^/(.*)$ /index.php?_url=/$1;    
    #}

    location ~ \.php?.*$ {
        index          index.php index.html index.htm;
        root           /home/work/webs/php-web/www;
        fastcgi_pass   127.0.0.1:9000;
        fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
        include        fastcgi_params;
    }
}
```

重启nginx：`sudo $HOME/local/nginx/sbin/nginx -s reload`
