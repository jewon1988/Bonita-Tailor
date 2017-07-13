<?php
    session_start();
    $userLogin = "";
    $userNotLogin = "";

    if($_SESSION['loggedin']){
        $nameErr = "";
        $phoneNumber1Err = "";
        $fixDateErr = "";
        $valid = true;
        $userLogin = $_SESSION['username']." 님";

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
                $dbserver = 'db-mysql.zenit';
                $uid = 'int322_163a12';
                $pw = '!aA26076833';
                $dbname = 'int322_163a12';
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
                $fixDateErr = "조회할 가봉,셋팅일을 입력하세요..";
                $valid = false;
            }
            if($_POST['startFixDate'] >= $_POST['lastFixDate']){
                $fixDateErr = "조회할 가봉,셋팅일의 입력이 잘 못되었습니다..";
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

                $startFixDate = $_POST['startFixDate'];
                $lastFixDate = $_POST['lastFixDate'];

                $connection->selectDB2($startFixDate, $lastFixDate);

            }
        }
        if($_POST['back']){
            header("Location: main.php");
        }
?>
<html>
<head>
    <title>Select Customer Information</title>
</head>
<style>
    table td:first-child{
        text-align:right;
    }
    .result tr td{
        border:1px solid black;
    }
    table tr td{
        padding:5px;
    }
</style>
<body>
    <div>
        <h1>조 회</h1>
        <?php
            echo $userLogin;
        ?>
    </div>
    <div>
        <h4>고객명으로 조회</h4>
        <form method="post" action="">
            <table>
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
            <table>
                <tr>
                    <td>가봉,셋팅일 : </td>
                    <td>
                        <input type="text" name="startFixDate" value="<?php if(!empty($_POST['startFixDate'])) echo $_POST['startFixDate'];  ?>"> ~
                        <input type="text" name="lastFixDate" value="<?php if(!empty($_POST['lastFixDate'])) echo $_POST['lastFixDate'];  ?>"> (예 : 2017-01-03)
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
    <?php
    if($_POST['select1'] || $_POST['select2']){
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
                    <th>셔츠공장 </th>
                    <th>구 두</th>
                    <th>구두공장 </th>
                    <th>가봉,셋팅일</th>
                    <th>총 금액</th>
                    <th>선 금</th>
                    <th>잔 금</th>
                    <th>상담자 </th>
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
                        <td><?php echo $row['shirts_factory']; ?></td>
                        <td><?php echo $row['shoes']; ?></td>
                        <td><?php echo $row['shoes_factory']; ?></td>
                        <td><?php echo $row['fix_date']; ?></td>
                        <td><?php echo $row['total_price']; ?></td>
                        <td><?php echo $row['paid']; ?></td>
                        <td><?php echo $row['balance']; ?></td>
                        <?php
                        if($row['seller'] == 'Moon'){
                            $row['seller'] = '문상환';
                        ?>
                        <td><?php echo $row['seller']; ?></td>
                        <?php
                        }else if($row['seller'] == 'Yun'){
                            $row['seller'] = '윤연현';
                        ?>
                        <td><?php echo $row['seller']; ?></td>
                        <?php
                        }else{
                        ?>
                        <td><?php echo $row['seller']; ?></td>
                        <?php
                        }
                        ?>
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