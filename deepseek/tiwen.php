<html>
    <head>
        <meta charset="utf-8">
        <title>向DeepSeek-R1提问</title>
        <!-- <link rel="stylesheet" href="../new.css"> -->
         <style>
            /* 按钮样式 */
.button {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.button:hover {
    background-color: #0056b3;
}

.button:active {
    background-color: #004080;
}

/* 卡片样式 */
.card {
    width: 300px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.card img {
    width: 100%;
    height: auto;
}

.card-content {
    padding: 20px;
}

.card-title {
    font-size: 20px;
    margin-bottom: 10px;
}

.card-description {
    font-size: 14px;
    color: #666;
}

/* 导航栏样式 */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #333;
    padding: 10px 20px;
}

.navbar a {
    color: #fff;
    text-decoration: none;
    padding: 10px 15px;
    transition: background-color 0.3s ease;
}

.navbar a:hover {
    background-color: #555;
}

.navbar-brand {
    font-size: 24px;
    font-weight: bold;
}

/* 输入框样式 */
.input-field {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
    transition: border-color 0.3s ease;
}

.input-field:focus {
    border-color: #007bff;
}

.input-field.error {
    border-color: #ff0000;
}

/* 加载动画 */
.loader {
    border: 4px solid #f3f3f3;
    border-top: 4px solid #3498db;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

         </style>
    </head>
    <body>
        <!-- <form action="deepseek.php" method="post">
            Q(问题):<input type="text" name="Q">
            <input type="submit" value="提交">
        </form> -->
        <form action="deepseek.php" method="post">
    <textarea class="input-field" name="Q" placeholder="请输入问题..."></textarea>
    <input type="submit" class="button" value="提交">
</form>
</br>
<font color="red">温馨提示：使用该功能需要支出30金币</font>
    </body>
</html>
