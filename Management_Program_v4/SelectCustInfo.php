<?php

session_start();

$userLogin = "";
$userNotLogin = "";

if($_SESSION['loggedin']){
    $userLogin = $_SESSION['username']." 님";
    $custNumErr = "";
    $nameErr = "";
    $phoneNumber1Err = "";
    $fixDateErr = "";
    $settingDateErr = "";
    $valid = true;


    if(isset($_POST['select1'])){
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

            $custName = $_POST['name'];
            $phoneNumber1 = $_POST['phoneNumber1'];

            $connection->selectDB($custName, $phoneNumber1);
        }
    }
    if(isset($_POST['select2'])){
        if(empty($_POST['startFixDate']) || empty($_POST['lastFixDate'])){
            $fixDateErr = "조회할 가봉일을 입력하세요..";
            $valid = false;
        }
        if($_POST['startFixDate'] > $_POST['lastFixDate']){
            $fixDateErr = "조회할 가봉일의 입력이 잘 못되었습니다..";
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

            $startFixDate = $_POST['startFixDate'];
            $lastFixDate = $_POST['lastFixDate'];

            $connection->selectDB2($startFixDate, $lastFixDate);
        }
    }
    if(isset($_POST['select3'])){
        if(empty($_POST['startSettingDate']) || empty($_POST['lastSettingDate'])){
            $settingDateErr = "조회할 셋팅일을 입력하세요..";
            $valid = false;
        }
        if($_POST['startSettingDate'] > $_POST['lastSettingDate']){
            $settingDateErr = "조회할 셋팅일의 입력이 잘 못되었습니다..";
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

            $startSettingDate = $_POST['startSettingDate'];
            $lastSettingDate = $_POST['lastSettingDate'];

            $connection->selectDB5($startSettingDate, $lastSettingDate);
        }
    }
    if(isset($_POST['select4'])){
        if(empty($_POST['custNum'])){
            $custNumErr = "고객번호를 입력하세요..";
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

            $connection->selectDB6($custNum);
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
        .table2 td:last-child{
            color:red;
        }
        .table2 tr td{
            padding:5px;
        }
        .result tr td {
            border: 1px solid black;
            padding: 3px;
        }
        .result tr th{
            padding: 3px;
            color:white;
            background-color:black;
        }
        .result{
            font-size: 0.9em;
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
            <h1>조 회</h1>
        </div>
        <div>
            <h4>고객번호로 조회</h4>
            <form method="post" action="">
                <table class="table2">
                    <tr>
                        <td>고객번호 : </td>
                        <td><input type="text" name="custNum" value="<?php if(!empty($_POST['custNum'])) echo $_POST['custNum'];  ?>"></td>
                        <td><?php echo $custNumErr; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="select4" value="조 회">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div>
            <h4>고객명으로 조회</h4>
            <form method="post" action="">
                <table class="table2">
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
                            <input type="submit" name="select1" value="조 회">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div>
            <h4>가봉일로 조회</h4>
            <form method="post" action="">
                <table class="table2">
                    <tr>
                        <td>가봉일 : </td>
                        <td>
                            <input type="text" name="startFixDate" value="<?php if(!empty($_POST['startFixDate'])) echo $_POST['startFixDate'];  ?>"> ~
                            <input type="text" name="lastFixDate" value="<?php if(!empty($_POST['lastFixDate'])) echo $_POST['lastFixDate'];  ?>"> (예 : 2017-01-01)
                        </td>
                        <td><?php echo $fixDateErr; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="select2" value="조 회">
                            <input type="submit" name="back" value="뒤로가기">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div>
            <h4>셋팅일로 조회</h4>
            <form method="post" action="">
                <table class="table2">
                    <tr>
                        <td>셋팅일 : </td>
                        <td>
                            <input type="text" name="startSettingDate" value="<?php if(!empty($_POST['startSettingDate'])) echo $_POST['startSettingDate'];  ?>"> ~
                            <input type="text" name="lastSettingDate" value="<?php if(!empty($_POST['lastSettingDate'])) echo $_POST['lastSettingDate'];  ?>"> (예 : 2017-01-01)
                        </td>
                        <td><?php echo $settingDateErr; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="select3" value="조 회">
                            <input type="submit" name="back" value="뒤로가기">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <?php
        if($_POST['select1'] || $_POST['select2'] || $_POST['select3'] || $_POST['select4']){
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
                            <th>구 분</th>
                            <th>구매내역 </th>
                            <th>수트공장 </th>
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
                                <td><?php echo $row['suits_factory']; ?></td>
                                <td>
                                    <?php
                                    if($row['fix_date'] == "0000-00-00"){
                                        echo " ";
                                    }else{
                                        echo $row['fix_date'];
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if($row['factory_finish_date'] == "0000-00-00"){
                                        echo " ";
                                    }else{
                                        echo $row['factory_finish_date'];
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if($row['setting_date'] == "0000-00-00"){
                                        echo " ";
                                    }else{
                                        echo $row['setting_date'];
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if($row['supply_date'] == "0000-00-00"){
                                        echo " ";
                                    }else{
                                        echo $row['supply_date'];
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if($row['shooting_date'] == "0000-00-00"){
                                        echo " ";
                                    }else{
                                        echo $row['shooting_date'];
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if($row['marriage_date'] == "0000-00-00"){
                                        echo " ";
                                    }else{
                                        echo $row['marriage_date'];
                                    }
                                    ?>
                                </td>
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