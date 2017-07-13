<?php
session_start();

$message = "로그아웃 되었습니다..";
session_destroy();   // function that Destroys Session
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Logout</title>
</head>
<style>
    p{
        color:red;
    }
    div{
        padding-top:50px;
        width:300px;
        margin:0 auto;
        text-align:center;
    }
    a{
        text-decoration:none;
        color:black;
    }
    a:hover{
        color:red;
    }
</style>
<body>
    <div>
        <p><?php echo $message; ?></p>
        <a href="login.php">로그인</a>
    </div>
</body>
</html>
