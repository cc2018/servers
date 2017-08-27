# 数据库相关配置
mysql的安装、配置、启动等

### MariaDB
centos7 默认携带MariaDB

yum install mariadb mariadb-server


### MariaDB启动

`service mariadb start`

### MariaDB 设置密码

`# mysql_secure_installation`

测试登录

mysql -uroot -pxxx

### MariaDB停止

`service mariadb stop`

### MariaDB重启

`service mariadb restart`

### MariaDB状态

`service mariadb status`

### MariaDB utf-8字符集设置

编辑/etc/my.cnf，增加如下字段：

```
#在[client]段增加下面代码
[client]
default-character-set=utf8
#在[mysqld]段增加下面的代码
[mysqld]
default-storage-engine=INNODB
character-set-server=utf8
collation-server=utf8_general_ci

# 重启mariadb
service mariadb restart
```

### 数据库操作

```
# 创建数据库
create database php_web;
#对数据库授权用户
grant all privileges on php_web.* to work@localhost identified by 'work';
#刷新数据库权限
flush privileges;


# 创建表

use php_web;

CREATE TABLE IF NOT EXISTS `users` (    
`user_id` bigint not null primary key AUTO_INCREMENT,
`phone` bigint not null,
`name` varchar(32) NOT NULL,
`nick_name` varchar(255) DEFAULT NULL,
`pwd` varchar(64) NOT NULL,
`sex` tinyint not null DEFAULT '0',
`email` varchar(64) DEFAULT NULL,
`img` varchar(255) DEFAULT NULL,
`role` tinyint(1) DEFAULT '0',
`address` varchar(255) DEFAULT NULL,
`last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
`create_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
`update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
UNIQUE KEY `phone` (`phone`),
UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `posts` (    
`post_id` bigint not null primary key AUTO_INCREMENT,
`user_id` bigint not null,
`nick_name` varchar(255) DEFAULT NULL,
`title` varchar(255) DEFAULT NULL,
`desc` varchar(255) DEFAULT NULL,
`content` varchar(1024) DEFAULT NULL,
`path` varchar(255) DEFAULT NULL,
`create_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
`update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

# 删除表
drop table table_name;


# 插入数据

# users 插入数据
INSERT INTO users values('', '18617001234', 'cc', '曹曹', '1234', '1', 'cao@126.com', '', '9', '深圳市南山区学府路', null, null, null);
INSERT INTO users values('', '18617006789', 'cc_2012', '曹爷', '1234', '1', 'caoye@126.com', '', '1', '深圳市南山区学府路', null, null, null);

# posts 插入数据
INSERT INTO posts values('', '1', '曹曹', '测试文章一', '这是文章描述一', '暂木有写内容', '', null, null);
INSERT INTO posts values('', '1', '曹曹', '测试文章二', '这是文章描述二', '写了一点点内容', '', null, null);
INSERT INTO posts values('', '2', '曹爷', '测试文章三', '这是文章描述三', '想写还没有写内容', '', null, null);
```
