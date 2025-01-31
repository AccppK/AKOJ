<?php
include("/home/judge/src/web/template/syzoj/header-admin.php");
include("/home/judge/src/web/include/db_info.inc.php");

if (!isset($_SESSION[$OJ_NAME.'_'.'administrator'])) {
    echo "<div style='text-align: center;'>
            <h1><b>".$OJ_NAME."提醒您</b></h1>
            <hr>
            <h2>很抱歉,您没有此权限!</h2>
            <p>您可以通过联系OJ管理员或用户管理者来解决此问题</p>";
    if ($OJ_NAME == "SHAOXIAOJ") {
        echo "
              <h3>如有疑问,请联系少侠Dr(QQ:169711625)以解决问题哦</h3>";
    }
    echo "</div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKOJ - 激活码添加</title>
    <style>
        .center {
            text-align: center;
        }
        .form-container {
            margin: 20px auto;
            width: 50%;
        }
    </style>
</head>
<body>

        <form action="/admin/yes_jihuo.php" method="post">
            <label for="code">激活码(NEW):</label>
            <input id="code" name="code" placeholder="需要新增的激活码" type="text">
            <br>
            <input class="ui button" type="submit" value="提交">
        </form>
    
</body>
</html>
