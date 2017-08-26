# nginx相关配置
nginx的安装、配置、启动等

### nginx安装

nginx编译依赖pcre、openssl、zlib，并且要指定源码路径（会从源码路径寻找makefile）

一般系统带了openssl，如果没带或版本太低，下载安装openssl，这里只下载pcre和zlib：
```
wget https://ftp.pcre.org/pub/pcre/pcre-8.41.tar.gz
tar -xzvf pcre-8.41.tar.gz

wget http://prdownloads.sourceforge.net/libpng/zlib-1.2.11.tar.gz?download
tar -xzvf zlib-1.2.11.tar.gz
```

*这里pcre选择了pcre1，没有选择pcre2，因为之前遇到过nginx没有依赖最新的pcre2。*

接着去下载nginx：

可去nginx官方[下载页面](http://nginx.org/en/download.html)，选择一个较新的稳定版本。

这里选择[nginx 1.12.1](http://nginx.org/download/nginx-1.12.1.tar.gz)

```
cd ~/opt
wget http://nginx.org/download/nginx-1.12.1.tar.gz
tar -xzvf ginx-1.12.1.tar.gz
cd nginx-1.12.1
./configure --prefix=$HOME/local/nginx --with-pcre=$HOME/opt/pcre-8.41 --with-zlib=$HOME/opt/zlib-1.2.11 --with-openssl
make && make install
```

### nginx配置

使用include vhosts站点配置方式

```
# nginx 设置用户和用户组
user work work;
# 加载vhosts里面的各server配置
include vhosts/*.conf;
```

vhosts/\*.config

按不同域名不同端口作了不同的映射，指向不同的webs下的server路径，如proxy-pass.conf会将不同域名同一个端口反射到本机的不同端口。

```
server {
    listen       8081;
    server_name  www.czjb.ren;

    charset  utf-8;
    access_log  /home/work/webs/php-web/logs/access.log;
    error_log  /home/work/webs/php-web/logs/error.log;

    location / {
        proxy_pass http://127.0.0.1:8091;
        index  index.html index.htm;
    }
}

server {
    listen       8081;
    server_name  www.czjb.site;

    charset  utf-8;
    access_log  /home/work/webs/python-web/logs/access.log;
    error_log  /home/work/webs/python-web/logs/error.log;

    location / {
        proxy_pass http://127.0.0.1:8092;
        index  index.html index.htm;
    }
}

```


### iptables打开端口

```
vi /etc/sysconfig/iptables
# 添加如端口号或端口区间
-A INPUT -p tcp -m state --state NEW -m tcp --dport 80 -j ACCEPT
-A INPUT -p tcp -m state --state NEW -m tcp --dport 8080 -j ACCEPT
-A INPUT -p tcp -m state --state NEW -m tcp --dport 8091:8099 -j ACCEPT
service iptables restart
```

如果用阿里云，还需要阿里云实例控制台开放端口。

### nginx启动

因为监听了80端口，需要root权限（需要在/etc/sudoers给work用户添加sudo权限），子进程拥有者仍然是work

`sudo $HOME/local/nginx/sbin/nginx -c $HOME/local/nginx/conf/nginx.conf`

### 配置重启

`sudo $HOME/local/nginx/sbin/nginx -s reload`

### 访问

```
http://116.62.204.4/  => www.czjb.site.conf
http://www.czjb.ren:8080/  => www.czjb.ren.conf
http://www.czjb.ren:8081/  => www.czjb.ren.conf

```

### 停止

```
# 快速停止
sudo $HOME/local/nginx/sbin/nginx -s stop
# 完整有序的停止
sudo $HOME/local/nginx/sbin/nginx -s quit

# 其他方式
ps -ef | grep nginx
kill -QUIT 主进程号     ：从容停止Nginx
kill -TERM 主进程号     ：快速停止Nginx
pkill -9 nginx         ：强制停止Nginx
```

### nginx log

nginx log 以vhost里的*.confg 配置为准，不同的server配置不同的log路径

### nginx其他配置说明

### scp命令使用

```
# 拷贝到远程服务器上：
scp ~/full.tar.gz work@www.czjb.site:/home/work/
# 从远程服务器拷贝到本机上：
scp work@www.czjb.site:/home/work/full.tar.gz ~/remote/
```
