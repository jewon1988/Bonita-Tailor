<?php

session_start();

$userLogin = "";
$userNotLogin = "";

if($_SESSION['loggedin']){
    $userLogin = $_SESSION['username']." 님";
    $reserveNumErr = "";
    $nameErr = "";
    $phoneNumber1Err = "";
    $valid = true;


    if(isset($_POST['delete'])){
        if(empty($_POST['reserveNum'])){
            $reserveNumErr = "예약번호을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['name'])){
            $nameErr = "고객명을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['phoneNumber1'])){
            $phoneNumber1Err = "전화번호를 입력하세요..";
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

            $reserveNum = $_POST['reserveNum'];
            $custName = $_POST['name'];
            $phoneNumber1 = $_POST['phoneNumber1'];


            $connection->selectReserveDB4($reserveNum, $custName, $phoneNumber1);

            if ($connection->valid2 == true && $connection->empty2 == true){
                $message = $custName." 님의 정보가 없습니다..";
            }
            else if ($connection->valid2 == true && $connection->empty2 == false) {
                $connection->deleteReserveDB($reserveNum, $custName, $phoneNumber1);
                $message = $custName." 님의 예약정보가 성공적으로 삭제되었습니다..";
            }
        }
    }
    if($_POST['back']){
        header("Location: main.php");
    }
    ?>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Select Customer Information</title>
    </head>
    <style>
        .top{
            border-bottom:1px solid red;
            height:30px;
            padding:15px;
        }
        .bottom{
            padding:5px 15px;
        }
        .top .top-left{
            float:left;
        }
        .top .top-right{
            float:right;
        }
        a{
            text-decoration:none;
        }
        .table1 tr td{
            border-right:1px solid blue;
            padding:0 5px 0;
        }
        .table1 tr td:last-child{
            border-right:none;
        }
        .table2 td:first-child{
            text-align:right;
        }
        .table2 tr td{
            padding:5px;
        }
    </style>
    <body>
    <div class="top">
        <div class="top-left">
            <form method="post" action="">
                <table class="table1">
                    <tr>
                        <td><a href="InsertCustInfo.php">입 력</a></td>
                        <td><a href="UpdateCustInfo.php">수 정</a></td>
                        <td><a href="SelectCustInfo.php">조 회</a></td>
                        <td><a href="DeleteCustInfo.php">삭 제</a></td>
                        <td><a href="InsertReservationInfo.php">예약 입력</a></td>
                        <td><a href="UpdateReservationInfo.php">예약 수정</a></td>
                        <td><a href="SelectReservationInfo.php">예약 조회</a></td>
                        <td><a href="DeleteReservationInfo.php">예약 삭제</a></td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="top-right">
            <?php
            echo $userLogin;
            ?>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="bottom">
        <div>
            <h1>삭 제</h1>
        </div>
        <div>
            <form method="post" action="">
                <table class="table2">
                    <tr>
                        <td>예약번호 : </td>
                        <td><input type="text" name="reserveNum" value="<?php if(!empty($_POST['reserveNum'])) echo $_POST['reserveNum'];  ?>"></td>
                        <td><?php echo $reserveNumErr; ?></td>
                    </tr>
                    <tr>
                        <td>고객명 : </td>
                        <td><input type="text" name="name" value="<?php if(!empty($_POST['name'])) echo $_POST['name'];  ?>"></td>
                        <td><?php echo $nameErr; ?></td>
                    </tr>
                    <tr>
                        <td>연락처1 : </td>
                        <td><input type="text" name="phoneNumber1" value="<?php if(!empty($_POST['phoneNumber1'])) echo $_POST['phoneNumber1'];  ?>"> (예 : 010-1111-2222)</td>
                        <td><?php echo $phoneNumber1Err; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="delete" value="삭 제">
                            <input type="submit" name="back" value="뒤로가기">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div>
            <p>
                <?php
                echo $message;
                ?>
            </p>
        </div>
    </div>
    </body>
    </html>
    <?php
}
else {
    $userNotLogin = "로그인 해주세요..";
    ?>
    <html>
    <head>
        <title>Main</title>
    </head>
    <body>
    <?php
    echo $userNotLogin;
    ?>
    </body>
    </html>
    <?php
}
?>