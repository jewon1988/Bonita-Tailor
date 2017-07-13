<?php

session_start();

$userLogin = "";
$userNotLogin = "";

if($_SESSION['loggedin']){
    $userLogin = $_SESSION['username']." 님";
    $reservationDateErr = "";
    $reservationTimeErr = "";
    $nameErr = "";
    $phoneNumber1Err = "";
    $phoneNumber2Err = "";
    $sellerErr = "";
    $valid = true;
    $message = "";

    if(isset($_POST['insert'])){
        if(empty($_POST['reservationDate'])){
            $reservationDateErr = "예약일을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['reservationTime'])){
            $reservationTimeErr = "예약일을 입력하세요..";
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
        if($_POST['seller'] == "default"){
            $sellerErr = "상담자를 선택하세요..";
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

            $reservationDate = $_POST['reservationDate'];
            $reservationTime = $_POST['reservationTime'];
            $custName = $_POST['name'];
            $phoneNumber1 = $_POST['phoneNumber1'];
            $phoneNumber2 = $_POST['phoneNumber2'];
            $seller = $_POST['seller'];

            $connection->insertReserveDB($reservationDate, $reservationTime, $custName, $phoneNumber1, $phoneNumber2, $seller);
            if($connection->valid2 == true){
                header("Location: InsertReservationInfo.php");
                $message = "고객 예약 정보가 성공적으로 입력되었습니다..";
            }
        }
    }
    else if($_POST['back']){
        header("Location: main.php");
    }

    ?>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Insert Reservation Information</title>
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
            <h1>예약 입력</h1>
        </div>
        <div>
            <form method="post" action="">
                <table class="table2">
                    <tr>
                        <td>예약일 : </td>
                        <td><input type="text" name="reservationDate" value="<?php if(!empty($_POST['reservationDate'])) echo $_POST['reservationDate']; ?>"> (예 : 2017-01-03)</td>
                        <td><?php echo $reservationDateErr; ?></td>
                    </tr>
                    <tr>
                        <td>예약시간 : </td>
                        <td><input type="text" name="reservationTime" value="<?php if(!empty($_POST['reservationTime'])) echo $_POST['reservationTime']; ?>"> (예 : 12:30 ~ 1:30)</td>
                        <td><?php echo $reservationTimeErr; ?></td>
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
                        <td>연락처2 : </td>
                        <td><input type="text" name="phoneNumber2" value="<?php if(!empty($_POST['phoneNumber2'])) echo $_POST['phoneNumber2'];  ?>"> (예 : 010-1111-2222)</td>
                    </tr>
                    <tr>
                        <td>상담자 : </td>
                        <td>
                            <select name="seller">
                                <option value="default" <?php if(!$_POST['seller']) echo "SELECTED";  ?>>상담자를 선택하세요...</option>
                                <option value="Moon" <?php if($_POST['seller'] == "Moon") echo "SELECTED";  ?>>문상환</option>
                                <option value="Yun" <?php if($_POST['seller'] == "Yun") echo "SELECTED";  ?>>윤연현</option>
                            </select>
                        </td>
                        <td><?php echo $sellerErr; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="insert" value="입 력">
                        </td>
                        <td colspan="2">
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