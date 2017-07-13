<?php
session_start();
$userLogin = "";
$userNotLogin = "";

if($_SESSION['loggedin']){

    $reservationDateErr = "";
    $reservationTimeErr = "";
    $nameErr = "";
    $phoneNumber1Err = "";
    $phoneNumber2Err = "";
    $sellerErr = "";
    $valid = true;
    $userLogin = $_SESSION['username']." 님";
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
            $dbserver = 'db-mysql.zenit';
            $uid = 'int322_163a12';
            $pw = '!aA26076833';
            $dbname = 'int322_163a12';
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
        <title>Insert Customer Information</title>
    </head>
    <style>
        table td:first-child{
            text-align:right;
        }
    </style>
    <body>
    <div>
        <h1>예약 입력</h1>
        <?php
        echo $userLogin;
        ?>
    </div>
    <div>
        <form method="post" action="">
            <table>
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
    </body>
    </html>
    <?php
}
else {
    $userNotLogin = "로그인 해주세요..";
    ?>
    <html>
    <head>
        <title>Insert Customer Information</title>
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