# servers
实验生产环境布置不同的web服务器和应用服务

### 基本生产环境

```

1、centos 7.2、gcc
2、work用户组：将lamp 或 lnmp环境编译布置到具体用户下
3、linux + nginx + mysql/mongo + redis/memcached + php/python

```

### 项目目录结构

```
├── config
|   ├── nginx
|   |     ├── nginx.conf
|   |     ├── vhosts
|   |     └── README.md
|   ├── mysql
|   ├── mongo
└── README.md

├── web-servers
|   ├── php-servers
|   |     ├── php-server-pro1
|   |     |       └── README.md
|   |     ├── php-server-pro2
|   |     |       └── README.md
|   ├── python-servers
|   |     ├── python-server-pro1
|   |     |       └── README.md
|   |     ├── python-server-pro2
|   |     |       └── README.md
|   ├── nodejs-servers
|   |     ├── nodejs-server-pro1
|   |     |       └── README.md
|   |     ├── nodejs-server-pro2
|   |     |       └── README.md
|   └── README.md

├── files-server
|   └── README.md

├── crawlers
|   └── README.md

├── auto-deploy
|   └── README.md

```

config:        lnmp的基本配置 + app的配置

webs:          按开发语言分不同的web服务器

files-server:  文件服务

crawlers:      爬虫服务

auto-deploy:   自动化发布

*每个小项目都带README.md，详细说明项目的安装、测试、发布、启动、停止、查看log等必要信息。*


### 线上发布路径

```
$HOME=/home/work

$HOME/opt: 下载的软件包放在此路径下
$HOME/local: 软件安装路径，包含nginx，mysql，php，python等
$HOME/web-servers: 各个web服务器，可以域名命名子项目路径
$HOME/crawlers: 爬虫服务
```
