<?php
session_start();
include("include/db_info.inc.php");

// 检查用户是否登录
if (!isset($_SESSION[$OJ_NAME.'_user_id'])) {
    echo json_encode(['success' => false, 'message' => '用户未登录']);
    exit;
}

// 获取当前用户 ID
$user_id = $_SESSION[$OJ_NAME.'_user_id'];

// 获取 POST 数据
$code = $_POST['code'] ?? '';

// 检查激活码是否为空
if (empty($code)) {
    echo json_encode(['success' => false, 'message' => '激活码不能为空']);
    exit;
}

// 连接数据库
$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => '数据库连接失败']);
    exit;
}

// 查询激活码是否存在
$sql = "SELECT * FROM activation_codes WHERE code = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $code);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    // 检查激活码是否已被使用
    if ($row['is_used']) {
        echo json_encode(['success' => false, 'message' => '激活码已经被使用过']);
    } else {
        // 更新激活码状态并绑定用户 ID
        $updateSql = "UPDATE activation_codes SET is_used = TRUE, user_id = ? WHERE code = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param('ss', $user_id, $code);

        if ($updateStmt->execute()) {
            echo json_encode(['success' => true, 'message' => '激活成功']);
        } else {
            echo json_encode(['success' => false, 'message' => '激活失败，请重试']);
        }
    }
} else {
    // 激活码不存在
    echo json_encode(['success' => false, 'message' => '激活码无效']);
}

// 关闭连接
$stmt->close();
$conn->close();
?>
