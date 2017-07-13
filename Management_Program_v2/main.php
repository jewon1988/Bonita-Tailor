<?php

session_start();

$userLogin = "";
$userNotLogin = "";

if($_SESSION['loggedin']){
    $userLogin = $_SESSION['username']." 님";


    ?>
    <html>
    <head>
        <title>Main</title>
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
        <p>Select Menu</p>
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