## 系统要求
 + php5.6+
 + ThinkPHP5.1.6+

## 安装步骤：

 + 第一步：
    + Composer方式：
     ~~~
        Composer install 或 Composer update
     ~~~
     
    + 手动下载ThinkPHP核心包，命名为thinkphp，放入根目录，推荐下载[releases包](https://github.com/top-think/framework/releases)
 + 第二步：执行SQL文件（根目录sql.sql文件）
 
 ## 验证码：
 + 安装think-captcha扩展包
 
  ~~~
     composer require topthink/think-captcha=2.*
  ~~~
 
 + 配置验证码开启状态：应用配置目录captcha.php文件
 
 ~~~
    'is_open' => true
 ~~~
 
 
## 默认账号密码
 + 默认账号：admin
 + 密码：123456

## 核心内容
 + 采用ThinkPHP5.1框架
 + 前端采用layui构建
 + 用户管理
 + 配置管理
 + 菜单管理
 + 缓存管理
 + 权限管理
 + API接口校验
 
## 感谢
 + ThinkPHP
 + layui
 + layuicms
 
 ## 捐献
 ![](https://github.com/gaoyuUp/orginThink/blob/master/public/images/wechat.png)
 ![](https://oscimg.oschina.net/oscnet/b762fa2cbf2f9042562011d38aaa1cbcada.jpg)
