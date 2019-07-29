<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div><h1>登入帳號</h1></div>
            <form action="./handler_login.php" method="POST">
            <div><input type="text" name="username" id=""placeholder="請輸入帳戶"> </div>
            <div><input type="password" name="password" id=""placeholder="請輸入密碼"></div>
             <div><input type="submit" name="save" id="submit"value="提交"></div>
            </form>

        </div>
    </div>
</body>
</html>