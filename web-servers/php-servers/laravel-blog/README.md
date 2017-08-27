# php-blog
简易 php 实现的blog站点

### laravel安装

laravel依赖composer, 先安装(composer)[https://getcomposer.org/download/]

将composer设置国内镜像，安装laravel/installer

```
composer config -g repo.packagist composer https://packagist.phpcomposer.com
```

laravel/install 会安装在$HOME/.composer/vendor/laravel下，命令行在 `$HOME/.composer/vendor/bin/laravel`

### 创建项目

```
cd ~/pro/webs/web-servers/php-servers
$HOME/.composer/vendor/bin/laravel new laravel-blog

```

### Auth 系统

激活登录功能

`php artisan make:auth`
