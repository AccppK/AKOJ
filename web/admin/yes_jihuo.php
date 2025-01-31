<?php
    include("/home/judge/src/web/include/db_info.inc.php");
    include("/home/judge/src/web/template/syzoj/header-admin.php");

    session_start(); // 确保会话已启动

    if(!(isset($_SESSION[$OJ_NAME.'_'.'administrator']))) {
        echo "<center><h1><b>".$OJ_NAME."提醒您</b></h1></center><hr>
        <center><h2>很抱歉,您没有此权限!</h2></center>
        <br><br><br>
        <center><h3>您可以通过联系OJ管理员或用户管理者来解决此问题</h3>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
        if($OJ_NAME=="SHAOXIAOJ"){
            echo "<center><img src='shaoxiaoj.PNG' width=500px></center>
                <center><h3>如有疑问,请联系少侠Dr(QQ:847075097)以解决问题哦</h3></center>";
        }
        exit(1);
    }
    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    if($conn->connect_error) {
        echo "数据库连接失败: " . $conn->connect_error;
        exit;
    }
    $code = $conn->real_escape_string($_POST["code"]);
    $sql = "INSERT INTO activation_codes (`code`, `is_used`, `user_id`, `created_at`) VALUES ('$code', '0', '', '2025-01-31');";
    if($conn->query($sql)) {
        ?>
        <center><h1>激活码 <?php echo htmlspecialchars($code); ?> 成功插入!</h1></center>
        <?php
    }
    $conn->close();
?>
