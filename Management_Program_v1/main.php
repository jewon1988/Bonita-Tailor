<?php
    session_start();

    $userLogin = "";
    $userNotLogin = "";

    if($_SESSION['loggedin']){
        $userLogin = $_SESSION['username']." 님";

        if($_POST['insert']){
            header('Location: InsertCustInfo.php');
        }
        if($_POST['update']){
            header('Location: UpdateCustInfo.php');
        }
        if($_POST['select']){
            header('Location: SelectCustInfo.php');
        }
        if($_POST['insertReserve']){
            header('Location: InsertReservationInfo.php');
        }
        if($_POST['updateReserve']){
            header('Location: UpdateReservationInfo.php');
        }
        if($_POST['selectReserve']){
            header('Location: SelectReservationInfo.php');
        }
?>
        <html>
        <head>
            <title>Main</title>
        </head>
        <body>
        <div>
            <?php
                echo $userLogin;
            ?>
            <a href="logout.php">Logout</a>
        </div>
        <div>
            <form method="post" action="">
                <table>
                    <tr>
                        <th colspan="3">고객 정보</th>
                    </tr>
                    <tr>
                        <td><input type="submit" name="insert" value="입 력"></td>
                        <td><input type="submit" name="update" value="수 정"></td>
                        <td><input type="submit" name="select" value="조 회"></td>
                    </tr>
                    <tr>
                        <th colspan="3">예약 정보</th>
                    </tr>
                    <tr>
                        <td><input type="submit" name="insertReserve" value="예약 입력"></td>
                        <td><input type="submit" name="updateReserve" value="예약 수정"></td>
                        <td><input type="submit" name="selectReserve" value="예약 조회"></td>
                    </tr>
                </table>
            </form>
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