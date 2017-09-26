# python-blog
简易 python 实现的blog站点


### 开发环境

**在开发环境启用virtualenv**

安装virtualenv: pip install virtualenv, linux环境增加sudo权限

安装成功后，启动virtualenv环境：

```cmd

cd pyblog
virtualenv venv
. venv/bin/activate             #windows环境使用 venv\scripts\activate
pip install Django              #安装Django
pip install mysql-python        #安装msyql
```

退出virtualenv环境使用：
```
deactivate
```

### 数据库设置

**创建数据库**

`create database pyblog;`

**创建新用户**

`create user 'pyblog'@'localhost' identified by 'pyblog';`

**对数据库授权用户**

`grant all on pyblog.* to 'pyblog'@'localhost';`

**刷新数据库权限**

`flush privileges;`

settings.py 里设置
```
# use mysql
import pymysql
pymysql.install_as_MySQLdb()

DATABASES = {
    'default': {
        'ENGINE': 'django.db.backends.mysql',
        'NAME': 'blog',
        'USER': 'blog',
        'PASSWORD': 'blog',
        'HOST': '127.0.0.1',
        'PORT': '3306',
    }
}
```

**执行migrate**

```
`python manage.py migrate`

Apply all migrations: admin, auth, contenttypes, sessions

生成以下各表
+----------------------------+
| Tables_in_pyblog           |
+----------------------------+
| auth_group                 |
| auth_group_permissions     |
| auth_permission            |
| auth_user                  |
| auth_user_groups           |
| auth_user_user_permissions |
| django_admin_log           |
| django_content_type        |
| django_migrations          |
| django_session             |
+----------------------------+

```


### manage.py
manage.py 支持很多命令行操作



### 启动
```
python manage.py runserver 8200
```