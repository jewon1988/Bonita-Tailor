<?php

session_start();

$userLogin = "";
$userNotLogin = "";

if($_SESSION['loggedin']){
    $userLogin = $_SESSION['username']." 님";
    $dateErr = "";
    $nameErr = "";
    $phoneNumber1Err = "";
    $addressErr = "";
    $typeErr = "";
    $productErr = "";
    $suitsErr = "";
    $suitsFactoryErr = "";
    $shirtsErr = "";
    $shirtsFactoryErr = "";
    $shoesErr = "";
    $shoesFactoryErr = "";
    $fixDateErr = "";
    $priceErr = "";
    $paidErr = "";
    $balanceErr = "";
    $sellerErr = "";
    $valid = true;
    $message = "";

    if(isset($_POST['insert'])){
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
        if(!$_POST['type']){
            $typeErr = "구분를 선택하세요..";
            $valid = false;
        }
        if(empty($_POST['product'])){
            $productErr = "구매내역을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['suits'])){
            $suitsErr = "수트항목을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['suitsFactory'])){
            $suitsFactoryErr = "수트공장명을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['shirts'])){
            $shirtsErr = "셔츠항목을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['shirtsFactory'])){
            $shirtsFactoryErr = "셔츠공장명을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['fixDate'])){
            $fixDateErr = "가봉일을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['price'])){
            $priceErr = "총 금액을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['paid'])){
            $paidErr = "선금액을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['balance'])){
            $balanceErr = "잔금액을 입력하세요..";
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

            $contractDate = $_POST['date'];
            $custName = $_POST['name'];
            $phoneNumber1 = $_POST['phoneNumber1'];
            $phoneNumber2 = $_POST['phoneNumber2'];
            $address = $_POST['address'];
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
            $suits = $_POST['suits'];
            $suitsFactory = $_POST['suitsFactory'];
            $shirts = $_POST['shirts'];
            $shirtsFactory = $_POST['shirtsFactory'];
            $shoes = $_POST['shoes'];
            $shoesFactory = $_POST['shoesFactory'];
            $fixDate = $_POST['fixDate'];
            $price = $_POST['price'];
            $paid = $_POST['paid'];
            $balance = $_POST['balance'];
            $seller = $_POST['seller'];

            $connection->insertDB( $contractDate, $custName, $phoneNumber1, $phoneNumber2, $address, $type, $product, $suits, $suitsFactory, $shirts, $shirtsFactory, $shoes, $shoesFactory, $fixDate, $price, $paid, $balance, $seller);
            if($connection->valid == true){
                header("Location: InsertCustInfo.php");
                $message = "고객정보가 성공적으로 입력되었습니다..";
            }
        }
    }
    else if($_POST['back']){
        header("Location: main.php");
    }
    ?>
    <html>
    <head>
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
                        <td><a href="InsertReservationInfo.php">예약 입력</a></td>
                        <td><a href="UpdateReservationInfo.php">예약 수정</a></td>
                        <td><a href="SelectReservationInfo.php">예약 조회</a></td>
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
                        <td>계약일 : </td>
                        <td><input type="text" name="date" value="<?php if(!empty($_POST['date'])) echo $_POST['date'];  ?>"> (예 : 2017-01-03)</td>
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
                        <td><?php echo $phoneNumberErr; ?></td>
                    </tr>
                    <tr>
                        <td>연락처2 : </td>
                        <td><input type="text" name="phoneNumber2" value="<?php if(!empty($_POST['phoneNumber2'])) echo $_POST['phoneNumber2'];  ?>"> (예 : 010-1111-2222)</td>
                    </tr>
                    <tr>
                        <td>주  소 : </td>
                        <td><input type="text" name="address" value="<?php if(!empty($_POST['address'])) echo $_POST['address'];  ?>"></td>
                        <td><?php echo $addressErr; ?></td>
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
                        <td>수  트 : </td>
                        <td><input type="text" name="suits" value="<?php if(!empty($_POST['suits'])) echo $_POST['suits'];  ?>"></td>
                        <td><?php echo $suitsErr; ?></td>
                    </tr>
                    <tr>
                        <td>수트공장 : </td>
                        <td><input type="text" name="suitsFactory" value="<?php if(!empty($_POST['suitsFactory'])) echo $_POST['suitsFactory'];  ?>"></td>
                        <td><?php echo $suitsFactoryErr; ?></td>
                    </tr>
                    <tr>
                        <td>셔  츠 : </td>
                        <td><input type="text" name="shirts" value="<?php if(!empty($_POST['shirts'])) echo $_POST['shirts'];  ?>"></td>
                        <td><?php echo $shirtsErr; ?></td>
                    </tr>
                    <tr>
                        <td>셔츠공장 : </td>
                        <td><input type="text" name="shirtsFactory" value="<?php if(!empty($_POST['shirtsFactory'])) echo $_POST['shirtsFactory'];  ?>"></td>
                        <td><?php echo $shirtsFactoryErr; ?></td>
                    </tr>
                    <tr>
                        <td>구  두 : </td>
                        <td><input type="text" name="shoes" value="<?php if(!empty($_POST['shoes'])) echo $_POST['shoes'];  ?>"></td>
                    </tr>
                    <tr>
                        <td>구두공장 : </td>
                        <td><input type="text" name="shoesFactory" value="<?php if(!empty($_POST['shoesFactory'])) echo $_POST['shoesFactory'];  ?>"></td>
                    </tr>
                    <tr>
                        <td>가봉,셋팅일 : </td>
                        <td><input type="text" name="fixDate" value="<?php if(!empty($_POST['fixDate'])) echo $_POST['fixDate'];  ?>"> (예 : 2017-01-03)</td>
                        <td><?php echo $fixDateErr; ?></td>
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