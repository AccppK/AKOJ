<?php
include("../include/config.php");
session_start();

if (!isset($_SESSION[$OJ_NAME.'_user_id'])) {
    echo "请登录！！";
    exit;
}

$USER = $_SESSION[$OJ_NAME.'_user_id'];

// 使用预处理语句获取分数
$stmt = $conn->prepare("SELECT score FROM users WHERE user_id = ?");
$stmt->bind_param("s", $USER);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "用户不存在！";
    exit;
}

$row = $result->fetch_assoc();
$score = $row['score'];

if ($score < 100) {
    echo "金币不足！";
    exit;
}

// 更新分数
$new_score = $score - 30;
$update = $conn->prepare("UPDATE users SET score = ? WHERE user_id = ?");
$update->bind_param("is", $new_score, $USER);

if ($update->execute()) {
    // 更新成功后的操作
} else {
    echo "更新失败：" . $conn->error;
}

$QA = $_POST["Q"];

// 设置请求的URL
$url = 'https://dashscope.aliyuncs.com/compatible-mode/v1/chat/completions';
$apiKey = "USER_API";

// 设置请求头
$headers = [
    'Authorization: Bearer '.$apiKey,
    'Content-Type: application/json'
];

// 设置请求体
$data = [
    "model" => "deepseek-r1",
    "messages" => [
        [
            "role" => "user",
            "system" => "你是AKAI，编程能力超强，你只能解答编程问题，问题如果非用户要求，请使用C++输出答案。",
            "content" => "你是AKAI，编程能力超强，你只能解答编程问题，问题如果非用户要求，请使用C++输出答案，并且给予解释，用户的问题是:$QA"
        ]
    ]
];

// 初始化cURL会话
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// 执行cURL会话
$response = curl_exec($ch);

// 检查是否有错误发生
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
    exit;
}

// 关闭cURL资源
curl_close($ch);

// 解析响应结果
$responseData = json_decode($response, true);

// 提取回答内容
if (isset($responseData['choices'][0]['message']['content'])) {
    $markdownContent = $responseData['choices'][0]['message']['content'];

    // 输出 Markdown 内容
    header('Content-Type: text/markdown'); // 设置响应头为 Markdown 类型
    echo $markdownContent;
} else {
    echo "无法获取回答内容。";
}
?>
