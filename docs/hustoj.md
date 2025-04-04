[![GitHub Stars](https://img.shields.io/github/stars/AccppK/AKOJ?style=social)](https://github.com/AccppK/AKOJ/stargazers)
[![GitHub Forks](https://img.shields.io/github/forks/AccppK/AKOJ?style=social)](https://github.com/AccppK/AKOJ/network/members)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)
# 🚀Hust OJ二次开发教程
## 概览
Hust OJ是华中科技大学开发的在线判题系统，提供C++,Python等语言的Web判题端。  
其主要语言由php,html组成。  
其中，我们仅开发Web端，所在的目录是:/home/judge/src/web/  
模板端:/home/judge/src/web/template/$OJ_TEMPLATE/  
📌如果您为宝塔或自定义部署，则上面的方法可能不适合您。  
  
## 🎉开发者
您应当拥有php,html,SQL语言的基础知识。  

## 🎉开始
### 数据库
Hust OJ默认数据库为jol，用户名为hustoj，密码在Web/include/目录的db_info.inc.php的$DB_PASS里。  
#### 📌宝塔可能不是默认
#### 如何连接数据库
官方描述可以使用pdo_query函数，但是为了php的完整性，我使用$conn函数进行连接。
示例代码如下：
```php
include("include/db_info.inc.php"); //替换为实际的路径
$conn=new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
if($conn->connect_error){
  die("数据库连接失败");
  exit;
} //连接错误处理
```

📌建议在include下新建config文件，将代码加入其中，方便调用。
### 💕感谢您的支持与鼓励，我们希望获得您的star，我也只是个小学五年级的学生，感谢！
