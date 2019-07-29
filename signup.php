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
        <div><h1>建立新帳號</h1></div>
        <p>帳號密碼強度至少要有「數字+英文字母大小寫8位~12位 」</p>
            <form action="./register.php" method="POST">            
            <div><input type="text" name="username" id=""placeholder="  請輸入帳戶"> </div>
            <div><input type="password" name="password" id=""placeholder="  請輸入密碼"></div>
            <div><input type="text" name="nickname" id=""placeholder="  請輸入暱稱"></div>
            <div classs='sub'><input type="submit" name="save" id="btn"value="提交"></div>
            </form>

        </div>
    </div>
</body>
</html>