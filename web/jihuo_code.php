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
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
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

    <script>
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
                } else {
                    messageDiv.innerHTML = `<p style="color: red;">${data.message || '激活失败，请检查激活码是否正确。'}</p>`;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                messageDiv.innerHTML = '<p style="color: red;">验证过程中出现错误。</p>';
            });
        });
    </script>
</body>
</html>
