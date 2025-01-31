<?php
// 启动会话
session_start();

// 包含数据库配置文件
include("/home/judge/src/web/include/db_info.inc.php");

// 检查用户权限
if ($_SESSION[$OJ_NAME.'_user_id'] !== "admin") {
    echo "error";
    exit;
}

// 连接数据库
$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($conn->connect_error) {
    echo "连接MySQL失败.";
    exit;
}

// 验证并过滤 GET 参数
$id = isset($_GET["id"]) ? intval($_GET["id"]) : 0; // 确保 id 是整数
$is = isset($_GET["is"]) ? $_GET["is"] : ""; // 获取 is 参数

// 根据 is 参数执行不同的操作
if ($is === "Y" || $is === "N") {
    // 使用预处理语句防止 SQL 注入
    $stmt = $conn->prepare("UPDATE activation_codes SET is_used = ? WHERE id = ?");
    $is_used = ($is === "Y") ? 1 : 0; // 根据 is 参数设置 is_used 的值
    $stmt->bind_param("ii", $is_used, $id); // 绑定参数

    // 执行更新
    if ($stmt->execute()) {
        echo $is; // 输出 Y 或 N
        // 返回上一页
        echo '<script language="javascript">history.go(-1);</script>';
    } else {
        echo "更新失败.";
    }

    // 关闭预处理语句
    $stmt->close();
} else {
    echo "无效的参数.";
}

// 关闭数据库连接
$conn->close();
?>
