<?php
/*
session_start();
include("template/syzoj/header.php");
include("include/db_info.inc.php");

if (!isset($_SESSION[$OJ_NAME.'_user_id'])) {
    ?>
    <center><h1>您没有登录！！！</h1><hr style='border-top: 1px solid #000;'></center>
    <?php
    exit; // 防止后续代码执行
}

$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($conn->connect_error) {
    echo "<center><h1>数据库连接失败,请联系管理员.</h1><hr style='border-top: 1px solid #000;'></center>";
    $conn->close();
    exit;
}

$sql = "SELECT code,user_id FROM activation_codes;";
$result = $conn->query($sql);

if ($result === false) {
    echo "<center><h1>查询失败，请联系管理员。</h1></center>";
    $conn->close();
    exit;
}

if ($result->num_rows <= 0) {
    ?>
    <center><h2>您似乎没有注册任何课程...<a href="jihuo_code.php">去激活</a></h2></center>
    <?php
} else {
    ?>
    <center>
    <table border="1" style="border-collapse: collapse; width: 50%; margin: auto;">
        <thead>
            <tr>
                <th>注册的课程</th>
                <th>激活码</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                if($row["user_id"] != $_SESSION[$OJ_NAME.'_user_id']){
                    ?>
                    <center><h2>您似乎没有注册任何课程...<a href="jihuo_code.php">去激活</a></h2></center>
                    <?php
                }
                echo "<tr>";
                echo "<td>基础课程</td>";
                echo "<td>".htmlspecialchars($row["code"])."</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    </center>
    <?php
}

$conn->close();
*/

?>
<?php
/*
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AKOJ - 课程激活</title>
<style>
    body {
        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #f4f4f4;
        padding: 20px;
    }
    .container {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 80%;
        max-width: 800px;
        margin-bottom: 20px;
    }
    .container h2 {
        text-align: center;
    }
    .container input {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .container button {
        width: 100%;
        padding: 10px;
        background-color: #28a745;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .container button:hover {
        background-color: #218838;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    table, th, td {
        border: 1px solid #ddd;
    }
    th, td {
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
</style>
</head>
<body>
<div class="container">
    <h2>课程激活码</h2>
    <form id="activationForm">
        <input type="text" id="activationCode" placeholder="请输入激活码" required>
        <button type="submit">验证</button>
    </form>
    <div id="message"></div>
</div>

<div class="container">
    <h2>已激活的课程</h2>
    <table id="activatedCoursesTable">
        <thead>
            <tr>
                <th>激活码</th>
                <th>课程名称</th>
                <th>激活时间</th>
            </tr>
        </thead>
        <tbody>
            <!-- 动态填充 -->
        </tbody>
    </table>
</div>

<script>
    // 提交激活码表单
    document.getElementById('activationForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const activationCode = document.getElementById('activationCode').value;
        const messageDiv = document.getElementById('message');

        fetch('verify_activation_code.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `code=${encodeURIComponent(activationCode)}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                messageDiv.innerHTML = '<p style="color: green;">激活成功！</p>';
                loadActivatedCourses(); // 激活成功后刷新课程列表
            } else {
                messageDiv.innerHTML = `<p style="color: red;">${data.message || '激活失败，请检查激活码是否正确。'}</p>`;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            messageDiv.innerHTML = '<p style="color: red;">验证过程中出现错误。</p>';
        });
    });

    // 加载已激活的课程
    function loadActivatedCourses() {
        fetch('get_activated_courses.php')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const tbody = document.querySelector('#activatedCoursesTable tbody');
                    tbody.innerHTML = ''; // 清空表格内容

                    data.courses.forEach(course => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${course.code}</td>
                            <td>${course.course_name}</td>
                            <td>${new Date(course.activated_at).toLocaleString()}</td>
                        `;
                        tbody.appendChild(row);
                    });
                } else {
                    console.error('Failed to load courses:', data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    // 页面加载时加载已激活的课程
    document.addEventListener('DOMContentLoaded', loadActivatedCourses);
</script>
</body>
</html>
*/
session_start();
include("template/syzoj/header.php");
include("include/db_info.inc.php");
$title="AKOJ激活页面表";
if (!isset($_SESSION[$OJ_NAME.'_user_id'])) {
    ?>
    <center><h1>您没有登录！！！</h1><hr style='border-top: 1px solid #000;'></center>
    <?php
    exit; // 防止后续代码执行
}

$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($conn->connect_error) {
    echo "<center><h1>数据库连接失败,请联系管理员.</h1><hr style='border-top: 1px solid #000;'></center>";
    $conn->close();
    exit;
}

$sql = "SELECT code,user_id FROM activation_codes;";
$result = $conn->query($sql);

if ($result === false) {
    echo "<center><h1>查询失败，请联系管理员。</h1></center>";
    $conn->close();
    exit;
}

if ($result->num_rows <= 0) {
    ?>
    <center><h2>您似乎没有注册任何课程...<a href="jihuo_code.php">去激活</a></h2></center>
    <?php
    exit;
} else {
    ?>
    <center>
    <table border="1" style="border-collapse: collapse; width: 50%; margin: auto;">
        <thead>
            <tr>
                <th>注册的课程</th>
                <th>激活码</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // 假设 $result 是从数据库查询得到的结果集
$hasCourse = false; // 用于标记是否有匹配的课程

while ($row = $result->fetch_assoc()) {
    // 如果当前记录的 user_id 与当前用户的 user_id 匹配
    if ($row["user_id"] == $_SESSION[$OJ_NAME.'_user_id']) {
        $hasCourse = true; // 标记为有匹配的课程
        echo "<tr>";
        echo "<td>基础课程</td>";
        echo "<td>".htmlspecialchars($row["code"])."</td>";
        echo "</tr>";
    }
}

// 如果没有任何一条记录的 user_id 匹配当前用户的 user_id
if (!$hasCourse) {
    ?>
    <center><h2>您似乎没有注册任何课程...<a href="jihuo_code.php">去激活</a></h2></center>
    <?php
}
            ?>
        </tbody>
    </table>
    </center>
    <?php
}

$conn->close();
?>
