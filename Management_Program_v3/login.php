<?php
session_start();

$idErr = "";
$pwErr = "";
$loginErr = "";
$valid = true;

if(isset($_POST['login'])){

    if(empty($_POST['id'])){
        $idErr = "ID를 입력하세요..";
        $valid = false;
    }
    if(empty($_POST['pw'])){
        $pwErr = "Password를 입력하세요..";
        $valid = false;
    }

    if($valid){
        $dbserver = 'localhost';
        $uid = 'moon1134';
        $pw = '1134moon!!';
        $dbname = 'moon1134';
        require 'myClasses.php';

        $connection = new DBLink();
        $connection->construct($dbserver, $uid, $pw, $dbname);

        $username = $_POST['id'];
        $password = $_POST['pw'];

        $result = mysqli_query($connection->dbConnect, 'select * from users where id = "'. $username .'" and password = "'. $password .'"');
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) >= 1){
            if($row['username'] == 'Moon'){
                $_SESSION['username'] = '문제원';
            }
            $_SESSION['password'] = $password;
            $_SESSION['loggedin'] = $_SESSION['username'];
            header('Location: main.php');
        }
        else{
            $loginErr = "아이디 또는 비밀번호를 다시 확인하세요..";
            $connection->destruct();
        }
    }
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>
<style> 
    tr td:first-child{
        text-align:right;
    }
</style>
<body>
<div>
    <meta charset="utf-8">
    <h1>로그인</h1>
</div>
<div>
    <form method="post" action="">
        <table>
            <tr>
                <td>ID : </td>
                <td><input type="text" name="id" value="<?php if(!empty($_POST['id'])) echo $_POST['id']; ?>"></td>
                <td><?php echo $idErr; ?></td>
            </tr>
            <tr>
                <td>password : </td>
                <td><input type="password" name="pw" value="<?php if(!empty($_POST['pw'])) echo $_POST['pw']; ?>"></td>
                <td><?php echo $pwErr; ?></td>
            </tr>
            <tr>
                <td colspan="2"><?php echo $loginErr; ?></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="login" value="로그인"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>