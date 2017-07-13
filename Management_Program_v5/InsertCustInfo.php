<?php

session_start();

$userLogin = "";
$userNotLogin = "";

if($_SESSION['loggedin']){
    $userLogin = $_SESSION['username']." 님";
    $custNumErr = "";
    $dateErr = "";
    $nameErr = "";
    $phoneNumber1Err = "";
    $typeErr = "";
    $productErr = "";
    $suitsFactoryErr = "";
    $factoryFixDateErr = "";
    $fixDateErr = "";
    $factoryFinishDateErr = "";
    $settingDateErr = "";
    $supplyDateErr = "";
    $shootingDateErr = "";
    $marriageDateErr = "";
    $priceErr = "";
    $paidErr = "";
    $balanceErr = "";
    $valid = true;
    $message = "";

    if(isset($_POST['insert'])){
        if(empty($_POST['custNum'])){
            $custNumErr = "고객번호를 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['date'])){
            $dateErr = "계약일을 입력하세요..";
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

            $custNum = $_POST['custNum'];
            $contractDate = $_POST['date'];
            $custName = $_POST['name'];
            $phoneNumber1 = $_POST['phoneNumber1'];
            $phoneNumber2 = $_POST['phoneNumber2'];
            if($_POST['type'] == 'buy'){
                $_POST['type'] = 1;
                $type = $_POST['type'];
            }
            else if($_POST['type'] == 'handmade'){
                $_POST['type'] = 2;
                $type = $_POST['type'];
            }
            else if($_POST['type'] == 'rent'){
                $_POST['type'] = 3;
                $type = $_POST['type'];
            }
            $product = $_POST['product'];
            $suitsFactory = $_POST['suitsFactory'];
            $factoryFixDate = $_POST['factoryFixDate'];
            $fixDate = $_POST['fixDate'];
            $factoryFinishDate = $_POST['factoryFinishDate'];
            $settingDate = $_POST['settingDate'];
            $supplyDate = $_POST['supplyDate'];
            $shootingDate = $_POST['shootingDate'];
            $marriageDate = $_POST['marriageDate'];
            $price = $_POST['price'];
            $paid = $_POST['paid'];
            $balance = $_POST['balance'];

            $connection->insertDB( $custNum, $contractDate, $custName, $phoneNumber1, $phoneNumber2, $type, $product, $suitsFactory, $factoryFixDate, $fixDate, $factoryFinishDate, $settingDate, $supplyDate, $shootingDate, $marriageDate, $price, $paid, $balance);
            if($connection->valid == true){
                ob_start();
                $message = "고객정보가 성공적으로 입력되었습니다..";
                header("Location: InsertCustInfo.php");
                echo "<script type='text/javascript'>alert('$message');</script>";
                ob_end_flush();
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
        <title>Insert Customer Information</title>
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
        .table2 td:last-child{
            color:red;
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
            <h1>입 력</h1>
        </div>
        <div>
            <form method="post" action="">
                <table class="table2">
                    <tr>
                        <td>고객번호 : </td>
                        <td><input type="text" name="custNum" value="<?php if(!empty($_POST['custNum'])) echo $_POST['custNum'];  ?>"></td>
                        <td><?php echo $custNumErr; ?></td>
                    </tr>
                    <tr>
                        <td>계약일 : </td>
                        <td><input type="text" name="date" value="<?php if(!empty($_POST['date'])) echo $_POST['date'];  ?>"> (예 : 2017-01-01)</td>
                        <td><?php echo $dateErr; ?></td>
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
                        <td><?php  ?></td>
                    </tr>
                    <tr>
                        <td>구  분 : </td>
                        <td>
                            <input type="radio" name="type" value="buy" <?php if($_POST['type'] == "buy") echo "CHECKED";  ?>> 맞춤
                            <input type="radio" name="type" value="handmade" <?php if($_POST['type'] == "handmade") echo "CHECKED";  ?>> 수제
                            <input type="radio" name="type" value="rent" <?php if($_POST['type'] == "rent") echo "CHECKED";  ?>> 대여
                        </td>
                        <td>
                            <?php echo $typeErr; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>구매내역 : </td>
                        <td><input type="text" name="product" value="<?php if(!empty($_POST['product'])) echo $_POST['product'];  ?>"></td>
                        <td><?php echo $productErr; ?></td>
                    </tr>
                    <tr>
                        <td>수트공장 : </td>
                        <td><input type="text" name="suitsFactory" value="<?php if(!empty($_POST['suitsFactory'])) echo $_POST['suitsFactory'];  ?>"></td>
                        <td><?php echo $suitsFactoryErr; ?></td>
                    </tr>
                    <tr>
                        <td>공장 가봉일 : </td>
                        <td><input type="text" name="factoryFixDate" value="<?php if(!empty($_POST['factoryFixDate'])) echo $_POST['factoryFixDate'];  ?>"> (예 : 2017-01-01)</td>
                        <td><?php echo $factoryFixDateErr; ?></td>
                    </tr>
                    <tr>
                        <td>가봉일 : </td>
                        <td><input type="text" name="fixDate" value="<?php if(!empty($_POST['fixDate'])) echo $_POST['fixDate'];  ?>"> (예 : 2017-01-01)</td>
                        <td><?php echo $fixDateErr; ?></td>
                    </tr>
                    <tr>
                        <td>공장완성일 : </td>
                        <td><input type="text" name="factoryFinishDate" value="<?php if(!empty($_POST['factoryFinishDate'])) echo $_POST['factoryFinishDate'];  ?>"> (예 : 2017-01-01)</td>
                        <td><?php echo $factoryFinishDateErr; ?></td>
                    </tr>
                    <tr>
                        <td>셋팅일 : </td>
                        <td><input type="text" name="settingDate" value="<?php if(!empty($_POST['settingDate'])) echo $_POST['settingDate'];  ?>"> (예 : 2017-01-01)</td>
                        <td><?php echo $settingDateErr; ?></td>
                    </tr>
                    <tr>
                        <td>납품일 : </td>
                        <td><input type="text" name="supplyDate" value="<?php if(!empty($_POST['supplyDate'])) echo $_POST['supplyDate'];  ?>"> (예 : 2017-01-01)</td>
                        <td><?php echo $supplyDateErr; ?></td>
                    </tr>
                    <tr>
                        <td>촬영 날짜 : </td>
                        <td><input type="text" name="shootingDate" value="<?php if(!empty($_POST['shootingDate'])) echo $_POST['shootingDate'];  ?>"> (예 : 2017-01-01)</td>
                        <td><?php echo $shootingDateErr; ?></td>
                    </tr>
                    <tr>
                        <td>결혼식 날짜 : </td>
                        <td><input type="text" name="marriageDate" value="<?php if(!empty($_POST['marriageDate'])) echo $_POST['marriageDate'];  ?>"> (예 : 2017-01-01)</td>
                        <td><?php echo $marriageDateErr; ?></td>
                    </tr>
                    <tr>
                        <td>총 금액 : </td>
                        <td><input type="text" name="price" value="<?php if(!empty($_POST['price'])) echo $_POST['price'];  ?>"></td>
                        <td><?php echo $priceErr; ?></td>
                    </tr>
                    <tr>
                        <td>선  금 : </td>
                        <td><input type="text" name="paid" value="<?php if(!empty($_POST['paid'])) echo $_POST['paid'];  ?>"></td>
                        <td><?php echo $paidErr; ?></td>
                    </tr>
                    <tr>
                        <td>잔  금 : </td>
                        <td><input type="text" name="balance" value="<?php if(!empty($_POST['balance'])) echo $_POST['balance'];  ?>"></td>
                        <td><?php echo $balanceErr; ?></td>
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