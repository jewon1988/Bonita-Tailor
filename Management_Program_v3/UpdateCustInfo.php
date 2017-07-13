<?php

session_start();

$userLogin = "";
$userNotLogin = "";

if($_SESSION['loggedin']){
    $userLogin = $_SESSION['username']." 님";
    $nameErr = "";
    $phoneNumber1Err = "";
    $phoneNumber2Err = "";
    $addressErr = "";
    $typeErr = "";
    $productErr = "";
    $suitsErr = "";
    $suitsFactoryErr = "";
    $shirtsErr = "";
    $shoesErr = "";
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

    if(isset($_POST['phoneNumber2Update'])){
        if(empty($_POST['name'])){
            $nameErr = "고객명을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['phoneNumber1'])){
            $phoneNumber1Err = "연락처1을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['phoneNumber2'])){
            $phoneNumber2Err = "연락처2를 입력하세요..";
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

            $custName = $_POST['name'];
            $phoneNumber1 = $_POST['phoneNumber1'];
            $phoneNumber2 = $_POST['phoneNumber2'];

            $connection->selectDB3($custName, $phoneNumber1);

            if ($connection->valid == true && $connection->empty == true){
                $message = $custName." 님의 정보가 없습니다..";
            }
            else if ($connection->valid == true && $connection->empty == false) {
                $connection->phoneNumber2UpdateDB($custName, $phoneNumber1, $phoneNumber2);
                $message = $custName." 님의 연락처2 정보가 성공적으로 수정되었습니다..";
                $connection->selectDB3($custName, $phoneNumber1);
            }
        }
    }
    if(isset($_POST['addressUpdate'])){
        if(empty($_POST['name'])){
            $nameErr = "고객명을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['phoneNumber1'])){
            $phoneNumber1Err = "전화번호를 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['address'])){
            $addressErr = "주소를 입력하세요..";
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

            $custName = $_POST['name'];
            $phoneNumber1 = $_POST['phoneNumber1'];
            $address = $_POST['address'];

            $connection->selectDB3($custName, $phoneNumber1);

            if ($connection->valid == true && $connection->empty == true){
                $message = $custName." 님의 정보가 없습니다..";
            }
            else if ($connection->valid == true && $connection->empty == false) {
                $connection->addressUpdateDB($custName, $phoneNumber1, $address);
                $message = $custName." 님의 주소 정보가 성공적으로 수정되었습니다..";
                $connection->selectDB3($custName, $phoneNumber1);
            }
        }
    }
    if(isset($_POST['typeUpdate'])){
        if(empty($_POST['name'])){
            $nameErr = "고객명을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['phoneNumber1'])){
            $phoneNumber1Err = "전화번호를 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['type'])){
            $typeErr = "구분을 선택하세요..";
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

            $custName = $_POST['name'];
            $phoneNumber1 = $_POST['phoneNumber1'];
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

            $connection->selectDB3($custName, $phoneNumber1);

            if ($connection->valid == true && $connection->empty == true){
                $message = $custName." 님의 정보가 없습니다..";
            }
            else if ($connection->valid == true && $connection->empty == false) {
                $connection->typeUpdateDB($custName, $phoneNumber1, $type);
                $message = $custName." 님의 구분 정보가 성공적으로 수정되었습니다..";
                $connection->selectDB3($custName, $phoneNumber1);
            }
        }
    }
    if(isset($_POST['productUpdate'])){
        if(empty($_POST['name'])){
            $nameErr = "고객명을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['phoneNumber1'])){
            $phoneNumber1Err = "전화번호를 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['product'])){
            $productErr = "구매내역을 입력하세요..";
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

            $custName = $_POST['name'];
            $phoneNumber1 = $_POST['phoneNumber1'];
            $product = $_POST['product'];

            $connection->selectDB3($custName, $phoneNumber1);

            if ($connection->valid == true && $connection->empty == true){
                $message = $custName." 님의 정보가 없습니다..";
            }
            else if ($connection->valid == true && $connection->empty == false) {
                $connection->productUpdateDB($custName, $phoneNumber1, $product);
                $message = $custName." 님의 구매내역 정보가 성공적으로 수정되었습니다..";
                $connection->selectDB3($custName, $phoneNumber1);
            }
        }
    }
    if(isset($_POST['suitsUpdate'])){
        if(empty($_POST['name'])){
            $nameErr = "고객명을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['phoneNumber1'])){
            $phoneNumber1Err = "전화번호를 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['suits'])){
            $suitsErr = "수트 정보를 입력하세요..";
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

            $custName = $_POST['name'];
            $phoneNumber1 = $_POST['phoneNumber1'];
            $suits = $_POST['suits'];

            $connection->selectDB3($custName, $phoneNumber1);

            if ($connection->valid == true && $connection->empty == true){
                $message = $custName." 님의 정보가 없습니다..";
            }
            else if ($connection->valid == true && $connection->empty == false) {
                $connection->suitsUpdateDB($custName, $phoneNumber1, $suits);
                $message = $custName." 님의 수트 정보가 성공적으로 수정되었습니다..";
                $connection->selectDB3($custName, $phoneNumber1);
            }
        }
    }
    if(isset($_POST['suitsFactoryUpdate'])){
        if(empty($_POST['name'])){
            $nameErr = "고객명을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['phoneNumber1'])){
            $phoneNumber1Err = "전화번호를 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['suitsFactory'])){
            $suitsFactoryErr = "수트공장 정보를 입력하세요..";
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

            $custName = $_POST['name'];
            $phoneNumber1 = $_POST['phoneNumber1'];
            $suitsFactory = $_POST['suitsFactory'];

            $connection->selectDB3($custName, $phoneNumber1);

            if ($connection->valid == true && $connection->empty == true){
                $message = $custName." 님의 정보가 없습니다..";
            }
            else if ($connection->valid == true && $connection->empty == false) {
                $connection->suitsFactoryUpdateDB($custName, $phoneNumber1, $suitsFactory);
                $message = $custName." 님의 수트공장 정보가 성공적으로 수정되었습니다..";
                $connection->selectDB3($custName, $phoneNumber1);
            }
        }
    }
    if(isset($_POST['shirtsUpdate'])){
        if(empty($_POST['name'])){
            $nameErr = "고객명을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['phoneNumber1'])){
            $phoneNumber1Err = "전화번호를 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['shirts'])){
            $shirtsErr = "셔츠 정보를 입력하세요..";
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

            $custName = $_POST['name'];
            $phoneNumber1 = $_POST['phoneNumber1'];
            $shirts = $_POST['shirts'];

            $connection->selectDB3($custName, $phoneNumber1);

            if ($connection->valid == true && $connection->empty == true){
                $message = $custName." 님의 정보가 없습니다..";
            }
            else if ($connection->valid == true && $connection->empty == false) {
                $connection->shirtsUpdateDB($custName, $phoneNumber1, $shirts);
                $message = $custName." 님의 셔츠 정보가 성공적으로 수정되었습니다..";
                $connection->selectDB3($custName, $phoneNumber1);
            }
        }
    }
    if(isset($_POST['shoesUpdate'])){
        if(empty($_POST['name'])){
            $nameErr = "고객명을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['phoneNumber1'])){
            $phoneNumber1Err = "전화번호를 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['shoes'])){
            $shoesErr = "구두정보를 입력하세요..";
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

            $custName = $_POST['name'];
            $phoneNumber1 = $_POST['phoneNumber1'];
            $shoes = $_POST['shoes'];

            $connection->selectDB3($custName, $phoneNumber1);

            if ($connection->valid == true && $connection->empty == true){
                $message = $custName." 님의 정보가 없습니다..";
            }
            else if ($connection->valid == true && $connection->empty == false) {
                $connection->shoesUpdateDB($custName, $phoneNumber1, $shoes);
                $message = $custName." 님의 구두 정보가 성공적으로 수정되었습니다..";
                $connection->selectDB3($custName, $phoneNumber1);
            }
        }
    }
    if(isset($_POST['fixDateUpdate'])){
        if(empty($_POST['name'])){
            $nameErr = "고객명을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['phoneNumber1'])){
            $phoneNumber1Err = "전화번호를 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['fixDate'])){
            $fixDateErr = "가봉일 정보를 입력하세요..";
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

            $custName = $_POST['name'];
            $phoneNumber1 = $_POST['phoneNumber1'];
            $fixDate = $_POST['fixDate'];

            $connection->selectDB3($custName, $phoneNumber1);

            if ($connection->valid == true && $connection->empty == true){
                $message = $custName." 님의 정보가 없습니다..";
            }
            else if ($connection->valid == true && $connection->empty == false) {
                $connection->fixDateUpdateDB($custName, $phoneNumber1, $fixDate);
                $message = $custName." 님의 가봉일 정보가 성공적으로 수정되었습니다..";
                $connection->selectDB3($custName, $phoneNumber1);
            }
        }
    }
    if(isset($_POST['factoryFinishDateUpdate'])){
        if(empty($_POST['name'])){
            $nameErr = "고객명을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['phoneNumber1'])){
            $phoneNumber1Err = "전화번호를 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['factoryFinishDate'])){
            $factoryFinishDateErr = "공장완성일 정보를 입력하세요..";
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

            $custName = $_POST['name'];
            $phoneNumber1 = $_POST['phoneNumber1'];
            $factoryFinishDate = $_POST['factoryFinishDate'];

            $connection->selectDB3($custName, $phoneNumber1);

            if ($connection->valid == true && $connection->empty == true){
                $message = $custName." 님의 정보가 없습니다..";
            }
            else if ($connection->valid == true && $connection->empty == false) {
                $connection->factoryFinishDateUpdateDB($custName, $phoneNumber1, $factoryFinishDate);
                $message = $custName." 님의 공장완성일 정보가 성공적으로 수정되었습니다..";
                $connection->selectDB3($custName, $phoneNumber1);
            }
        }
    }
    if(isset($_POST['settingDateUpdate'])){
        if(empty($_POST['name'])){
            $nameErr = "고객명을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['phoneNumber1'])){
            $phoneNumber1Err = "전화번호를 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['settingDate'])){
            $settingDateErr = "셋팅일 정보를 입력하세요..";
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

            $custName = $_POST['name'];
            $phoneNumber1 = $_POST['phoneNumber1'];
            $settingDate = $_POST['settingDate'];

            $connection->selectDB3($custName, $phoneNumber1);

            if ($connection->valid == true && $connection->empty == true){
                $message = $custName." 님의 정보가 없습니다..";
            }
            else if ($connection->valid == true && $connection->empty == false) {
                $connection->settingDateUpdateDB($custName, $phoneNumber1, $settingDate);
                $message = $custName." 님의 셋팅일 정보가 성공적으로 수정되었습니다..";
                $connection->selectDB3($custName, $phoneNumber1);
            }
        }
    }
    if(isset($_POST['supplyDateUpdate'])){
        if(empty($_POST['name'])){
            $nameErr = "고객명을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['phoneNumber1'])){
            $phoneNumber1Err = "전화번호를 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['supplyDate'])){
            $supplyDateErr = "납품일 정보를 입력하세요..";
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

            $custName = $_POST['name'];
            $phoneNumber1 = $_POST['phoneNumber1'];
            $supplyDate = $_POST['supplyDate'];

            $connection->selectDB3($custName, $phoneNumber1);

            if ($connection->valid == true && $connection->empty == true){
                $message = $custName." 님의 정보가 없습니다..";
            }
            else if ($connection->valid == true && $connection->empty == false) {
                $connection->supplyDateUpdateDB($custName, $phoneNumber1, $supplyDate);
                $message = $custName." 님의 납품일 정보가 성공적으로 수정되었습니다..";
                $connection->selectDB3($custName, $phoneNumber1);
            }
        }
    }
    if(isset($_POST['shootingDateUpdate'])){
        if(empty($_POST['name'])){
            $nameErr = "고객명을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['phoneNumber1'])){
            $phoneNumber1Err = "전화번호를 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['shootingDate'])){
            $shootingDateErr = "촬영 날짜 정보를 입력하세요..";
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

            $custName = $_POST['name'];
            $phoneNumber1 = $_POST['phoneNumber1'];
            $shootingDate = $_POST['shootingDate'];

            $connection->selectDB3($custName, $phoneNumber1);

            if ($connection->valid == true && $connection->empty == true){
                $message = $custName." 님의 정보가 없습니다..";
            }
            else if ($connection->valid == true && $connection->empty == false) {
                $connection->shootingDateUpdateDB($custName, $phoneNumber1, $shootingDate);
                $message = $custName." 님의 촬영 날짜 정보가 성공적으로 수정되었습니다..";
                $connection->selectDB3($custName, $phoneNumber1);
            }
        }
    }
    if(isset($_POST['marriageDateUpdate'])){
        if(empty($_POST['name'])){
            $nameErr = "고객명을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['phoneNumber1'])){
            $phoneNumber1Err = "전화번호를 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['marriageDate'])){
            $marriageDateErr = "결혼식 날짜 정보를 입력하세요..";
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

            $custName = $_POST['name'];
            $phoneNumber1 = $_POST['phoneNumber1'];
            $marriageDate = $_POST['marriageDate'];

            $connection->selectDB3($custName, $phoneNumber1);

            if ($connection->valid == true && $connection->empty == true){
                $message = $custName." 님의 정보가 없습니다..";
            }
            else if ($connection->valid == true && $connection->empty == false) {
                $connection->marriageDateUpdateDB($custName, $phoneNumber1, $marriageDate);
                $message = $custName." 님의 결혼식 날짜 정보가 성공적으로 수정되었습니다..";
                $connection->selectDB3($custName, $phoneNumber1);
            }
        }
    }
    if(isset($_POST['priceUpdate'])){
        if(empty($_POST['name'])){
            $nameErr = "고객명을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['phoneNumber1'])){
            $phoneNumber1Err = "전화번호를 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['price'])){
            $priceErr = "총 금액 정보를 입력하세요..";
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

            $custName = $_POST['name'];
            $phoneNumber1 = $_POST['phoneNumber1'];
            $price = $_POST['price'];

            $connection->selectDB3($custName, $phoneNumber1);

            if ($connection->valid == true && $connection->empty == true){
                $message = $custName." 님의 정보가 없습니다..";
            }
            else if ($connection->valid == true && $connection->empty == false) {
                $connection->priceUpdateDB($custName, $phoneNumber1, $price);
                $message = $custName." 님의 총 금액 정보가 성공적으로 수정되었습니다..";
                $connection->selectDB3($custName, $phoneNumber1);
            }
        }
    }
    if(isset($_POST['paidUpdate'])){
        if(empty($_POST['name'])){
            $nameErr = "고객명을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['phoneNumber1'])){
            $phoneNumber1Err = "전화번호를 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['paid'])){
            $paidErr = "선금 정보를 입력하세요..";
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

            $custName = $_POST['name'];
            $phoneNumber1 = $_POST['phoneNumber1'];
            $paid = $_POST['paid'];

            $connection->selectDB3($custName, $phoneNumber1);

            if ($connection->valid == true && $connection->empty == true){
                $message = $custName." 님의 정보가 없습니다..";
            }
            else if ($connection->valid == true && $connection->empty == false) {
                $connection->paidUpdateDB($custName, $phoneNumber1, $paid);
                $message = $custName." 님의 선금 정보가 성공적으로 수정되었습니다..";
                $connection->selectDB3($custName, $phoneNumber1);
            }
        }
    }
    if(isset($_POST['balanceUpdate'])){
        if(empty($_POST['name'])){
            $nameErr = "고객명을 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['phoneNumber1'])){
            $phoneNumber1Err = "전화번호를 입력하세요..";
            $valid = false;
        }
        if(empty($_POST['balance'])){
            $balanceErr = "잔금 정보를 입력하세요..";
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

            $custName = $_POST['name'];
            $phoneNumber1 = $_POST['phoneNumber1'];
            $balance = $_POST['balance'];

            $connection->selectDB3($custName, $phoneNumber1);

            if ($connection->valid == true && $connection->empty == true){
                $message = $custName." 님의 정보가 없습니다..";
            }
            else if ($connection->valid == true && $connection->empty == false) {
                $connection->balanceUpdateDB($custName, $phoneNumber1, $balance);
                $message = $custName." 님의 잔금 정보가 성공적으로 수정되었습니다..";
                $connection->selectDB3($custName, $phoneNumber1);
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
        <title>Update Customer Information</title>
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
        .result tr td {
            border: 1px solid black;
            padding: 5px;
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
            <h1>수 정</h1>
        </div>
        <div>
            <form method="post" action="">
                <table class="table2">
                    <tr>
                        <td>고객명 : </td>
                        <td><input type="text" name="name" value="<?php if(!empty($_POST['name'])) echo $_POST['name'];  ?>"></td>
                        <td></td>
                        <td><?php echo $nameErr; ?></td>
                    </tr>
                    <tr>
                        <td>연락처1 : </td>
                        <td><input type="text" name="phoneNumber1" value="<?php if(!empty($_POST['phoneNumber1'])) echo $_POST['phoneNumber1'];  ?>"> (예 : 010-1111-2222)</td>
                        <td></td>
                        <td><?php echo $phoneNumber1Err; ?></td>
                    </tr>
                    <tr>
                        <td>연락처2 : </td>
                        <td><input type="text" name="phoneNumber2"> (예 : 010-1111-2222)</td>
                        <td><input type="submit" name="phoneNumber2Update" value="연락처2 수정"></td>
                        <td><?php echo $phoneNumber2Err ; ?></td>
                    </tr>
                    <tr>
                        <td>주  소 : </td>
                        <td><input type="text" name="address"></td>
                        <td><input type="submit" name="addressUpdate" value="주소 수정"></td>
                        <td><?php echo $addressErr ; ?></td>
                    </tr>
                    <tr>
                        <td>구  분 : </td>
                        <td>
                            <input type="radio" name="type" value="buy"> 맞춤
                            <input type="radio" name="type" value="handmade"> 수제
                            <input type="radio" name="type" value="rent"> 대여
                        </td>
                        <td><input type="submit" name="typeUpdate" value="구분 수정"></td>
                        <td><?php echo $typeErr ; ?></td>
                    </tr>
                    <tr>
                        <td>구매내역 : </td>
                        <td><input type="text" name="product"></td>
                        <td><input type="submit" name="productUpdate" value="구매내역 수정"></td>
                        <td><?php echo $productErr ; ?></td>
                    </tr>
                    <tr>
                        <td>수  트 : </td>
                        <td><input type="text" name="suits"></td>
                        <td><input type="submit" name="suitsUpdate" value="수트 수정"></td>
                        <td><?php echo $suitsErr ; ?></td>
                    </tr>
                    <tr>
                        <td>수트공장 : </td>
                        <td><input type="text" name="suitsFactory"></td>
                        <td><input type="submit" name="suitsFactoryUpdate" value="수트공장 수정"></td>
                        <td><?php echo $suitsFactoryErr ; ?></td>
                    </tr>
                    <tr>
                        <td>셔  츠 : </td>
                        <td><input type="text" name="shirts"></td>
                        <td><input type="submit" name="shirtsUpdate" value="셔츠 수정"></td>
                        <td><?php echo $shirtsErr ; ?></td>
                    </tr>
                    <tr>
                        <td>구  두 : </td>
                        <td><input type="text" name="shoes"></td>
                        <td><input type="submit" name="shoesUpdate" value="구두 수정"></td>
                        <td><?php echo $shoesErr ; ?></td>
                    </tr>
                    <tr>
                        <td>가봉일 : </td>
                        <td><input type="text" name="fixDate"> (예 : 2017-01-03)</td>
                        <td><input type="submit" name="fixDateUpdate" value="가봉일 수정"></td>
                        <td><?php echo $fixDateErr ; ?></td>
                    </tr>
                    <tr>
                        <td>공장완성일 : </td>
                        <td><input type="text" name="factoryFinishDate"> (예 : 2017-01-03)</td>
                        <td><input type="submit" name="factoryFinishDateUpdate" value="공장완성일 수정"></td>
                        <td><?php echo $factoryFinishDateErr ; ?></td>
                    </tr>
                    <tr>
                        <td>셋팅일 : </td>
                        <td><input type="text" name="settingDate"> (예 : 2017-01-03)</td>
                        <td><input type="submit" name="settingDateUpdate" value="셋팅일 수정"></td>
                        <td><?php echo $settingDateErr ; ?></td>
                    </tr>
                    <tr>
                        <td>납품일 : </td>
                        <td><input type="text" name="supplyDate"> (예 : 2017-01-03)</td>
                        <td><input type="submit" name="supplyDateUpdate" value="납품일 수정"></td>
                        <td><?php echo $supplyDateErr ; ?></td>
                    </tr>
                    <tr>
                        <td>촬영 날짜 : </td>
                        <td><input type="text" name="shootingDate"> (예 : 2017-01-03)</td>
                        <td><input type="submit" name="shootingDateUpdate" value="촬영 날짜 수정"></td>
                        <td><?php echo $shootingDateErr ; ?></td>
                    </tr>
                    <tr>
                        <td>결혼식 날짜 : </td>
                        <td><input type="text" name="marriageDate"> (예 : 2017-01-03)</td>
                        <td><input type="submit" name="marriageDateUpdate" value="결혼식 날짜 수정"></td>
                        <td><?php echo $marriageDateErr ; ?></td>
                    </tr>
                    <tr>
                        <td>총 금액 : </td>
                        <td><input type="text" name="price"></td>
                        <td><input type="submit" name="priceUpdate" value="총 금액 수정"></td>
                        <td><?php echo $priceErr ; ?></td>
                    </tr>
                    <tr>
                        <td>선  금 : </td>
                        <td><input type="text" name="paid"></td>
                        <td><input type="submit" name="paidUpdate" value="선금 수정"></td>
                        <td><?php echo $paidErr ; ?></td>
                    </tr>
                    <tr>
                        <td>잔  금 : </td>
                        <td><input type="text" name="balance"></td>
                        <td><input type="submit" name="balanceUpdate" value="잔금 수정"></td>
                        <td><?php echo $balanceErr ; ?></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="back" value="뒤로가기"></td>
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

        <?php
        if($_POST['phoneNumber2Update'] || $_POST['addressUpdate'] || $_POST['typeUpdate'] || $_POST['productUpdate'] || $_POST['suitsUpdate'] || $_POST['suitsFactoryUpdate'] || $_POST['shirtsUpdate'] || $_POST['shoesUpdate'] || $_POST['fixDateUpdate'] || $_POST['factoryFinishDateUpdate'] || $_POST['settingDateUpdate'] || $_POST['supplyDateUpdate'] || $_POST['shootingDateUpdate'] || $_POST['marriageDateUpdate'] || $_POST['priceUpdate'] || $_POST['paidUpdate'] || $_POST['balanceUpdate']){
            ?>
            <div>
                <?php
                if ($connection->valid == true && $connection->empty == false) {
                    ?>
                    <h3>Data Result</h3>
                    <table class="result">
                        <tr>
                            <th>고객번호</th>
                            <th>계약일 </th>
                            <th>고객명</th>
                            <th>연락처1</th>
                            <th>연락처2</th>
                            <th>주 소</th>
                            <th>구 분</th>
                            <th>구매내역 </th>
                            <th>수 트</th>
                            <th>수트공장 </th>
                            <th>셔 츠</th>
                            <th>구 두</th>
                            <th>가봉일</th>
                            <th>공장완성일</th>
                            <th>셋팅일</th>
                            <th>납품일</th>
                            <th>촬영 날짜</th>
                            <th>결혼식 날짜</th>
                            <th>총 금액</th>
                            <th>선 금</th>
                            <th>잔 금</th>
                        </tr>
                        <?php
                        // print all data
                        while ($row = mysqli_fetch_assoc($connection->result)) {
                            ?>
                            <tr>
                                <td><?php echo $row['cust_num']; ?></td>
                                <td><?php echo $row['contract_date']; ?></td>
                                <td><?php echo $row['cust_name']; ?></td>
                                <td><?php echo $row['main_phone_number']; ?></td>
                                <td><?php echo $row['sub_phone_number']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <?php
                                if($row['type'] == 'A'){
                                    $row['type'] = '맞춤';
                                    ?>
                                    <td><?php echo $row['type']; ?></td>
                                    <?php
                                }else if($row['type'] == 'B'){
                                    $row['type'] = '수제';
                                    ?>
                                    <td><?php echo $row['type']; ?></td>
                                    <?php
                                }else if($row['type'] == 'C'){
                                    $row['type'] = '대여';
                                    ?>
                                    <td><?php echo $row['type']; ?></td>
                                    <?php
                                }else{
                                    ?>
                                    <td><?php echo $row['type']; ?></td>
                                    <?php
                                }
                                ?>
                                <td><?php echo $row['product']; ?></td>
                                <td><?php echo $row['suits']; ?></td>
                                <td><?php echo $row['suits_factory']; ?></td>
                                <td><?php echo $row['shirts']; ?></td>
                                <td><?php echo $row['shoes']; ?></td>
                                <td><?php echo $row['fix_date']; ?></td>
                                <td><?php echo $row['factory_finish_date']; ?></td>
                                <td><?php echo $row['setting_date']; ?></td>
                                <td><?php echo $row['supply_date']; ?></td>
                                <td><?php echo $row['shooting_date']; ?></td>
                                <td><?php echo $row['marriage_date']; ?></td>
                                <td><?php echo $row['total_price']; ?></td>
                                <td><?php echo $row['paid']; ?></td>
                                <td><?php echo $row['balance']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                    <?php
                }else{
                    ?>
                    <p>검색 결과가 없습니다.</p>
                    <?php
                }
                ?>
            </div>
            <?php
        }
        ?>
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