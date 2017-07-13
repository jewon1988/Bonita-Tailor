<?php

class DBLink{
    var $dbConnect;
    var $result;
    var $valid = true;
    var $empty;
    var $result2;
    var $valid2 = true;
    var $empty2;

    function construct($dbserver, $uid, $pw, $dbname){
        $this->connectDB($dbserver, $uid, $pw, $dbname);
    }

    function connectDB($dbserver, $uid, $pw, $dbname){
        $this->dbConnect =  mysqli_connect($dbserver, $uid, $pw, $dbname) or die("Cannot connect db");
    }

    function disconnectDB(){
        mysqli_close($this->dbConnect);
    }

// ------------------------------------------------- Customer ---------------------------------------------------------------------------

// INSERT
    function insertDB($custNum, $contractDate, $custName, $phoneNumber1, $phoneNumber2, $type, $product, $suitsFactory, $fixDate, $factoryFinishDate, $settingDate, $supplyDate, $shootingDate, $marriageDate, $price, $paid, $balance){
        $this->result = mysqli_query($this->dbConnect, 'insert into custinfo(cust_num, contract_date, cust_name, main_phone_number, sub_phone_number, type, product, suits_factory, fix_date, factory_finish_date, setting_date, supply_date, shooting_date, marriage_date, total_price, paid, balance) values("'. $custNum .'" , "'. $contractDate .'" , "'. $custName .'" , "'. $phoneNumber1 .'" , "'. $phoneNumber2 .'" , "'. $type .'" , "'. $product .'" , "'. $suitsFactory .'" , "'. $fixDate .'" , "'. $factoryFinishDate .'" , "'. $settingDate .'" , "'. $supplyDate .'" , "'. $shootingDate .'" , "'. $marriageDate .'" , "'. $price .'" , "'. $paid .'", "'. $balance .'" )') or die("Insert query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }

// UPDATE
    function phoneNumber2UpdateDB($custNum, $custName, $phoneNumber1, $phoneNumber2){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set sub_phone_number = "' .$phoneNumber2. '" where cust_num = "' .$custNum. '" and cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function typeUpdateDB($custNum, $custName, $phoneNumber1, $type){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set type = "' .$type. '" where cust_num = "' .$custNum. '" and cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function productUpdateDB($custNum, $custName, $phoneNumber1, $product){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set product = "' .$product. '" where cust_num = "' .$custNum. '" and cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function suitsFactoryUpdateDB($custNum, $custName, $phoneNumber1, $suitsFactory){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set suits_factory = "' .$suitsFactory. '" where cust_num = "' .$custNum. '" and cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function fixDateUpdateDB($custNum, $custName, $phoneNumber1, $fixDate){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set fix_date = "' .$fixDate. '" where cust_num = "' .$custNum. '" and cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function factoryFinishDateUpdateDB($custNum, $custName, $phoneNumber1, $factoryFinishDate){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set factory_finish_date = "' .$factoryFinishDate. '" where cust_num = "' .$custNum. '" and cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function settingDateUpdateDB($custNum, $custName, $phoneNumber1, $settingDate){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set setting_date = "' .$settingDate. '" where cust_num = "' .$custNum. '" and cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function supplyDateUpdateDB($custNum, $custName, $phoneNumber1, $supplyDate){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set supply_date = "' .$supplyDate. '" where cust_num = "' .$custNum. '" and cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function shootingDateUpdateDB($custNum, $custName, $phoneNumber1, $shootingDate){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set shooting_date = "' .$shootingDate. '" where cust_num = "' .$custNum. '" and cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function marriageDateUpdateDB($custNum, $custName, $phoneNumber1, $marriageDate){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set marriage_date = "' .$marriageDate. '" where cust_num = "' .$custNum. '" and cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function priceUpdateDB($custNum, $custName, $phoneNumber1, $price){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set total_price = "' .$price. '" where cust_num = "' .$custNum. '" and cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function paidUpdateDB($custNum, $custName, $phoneNumber1, $paid){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set paid = "' .$paid. '" where cust_num = "' .$custNum. '" and cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function balanceUpdateDB($custNum, $custName, $phoneNumber1, $balance){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set balance = "' .$balance. '" where cust_num = "' .$custNum. '" and cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }

// SELECT
    // by Phone Number
    function selectDB($custName, $phoneNumber1){
        $this->result = mysqli_query($this->dbConnect, 'select * from custinfo where cust_name = "'. $custName .'" and main_phone_number = "'. $phoneNumber1 .'" order by contract_date') or die("Select query error!");
        if(!($this->result)){
            $this->valid = false;
        }
        else{
            $this->emptyResult($this->result);
        }
    }

    // by Fix Date
    function selectDB2($startFixDate, $lastFixDate){
        $this->result = mysqli_query($this->dbConnect, 'select * from custinfo where fix_date >= "'. $startFixDate .'" and fix_date <= "'. $lastFixDate .'" order by fix_date') or die("Select query error!");
        if($this->result <= 0){
            $this->valid = false;
        }
        else{
            $this->emptyResult($this->result);
        }
    }

    // by Setting Date
    function selectDB5($startSettingDate, $lastSettingDate){
        $this->result = mysqli_query($this->dbConnect, 'select * from custinfo where setting_date >= "'. $startSettingDate .'" and setting_date <= "'. $lastSettingDate .'" order by setting_date') or die("Select query error!");
        if($this->result <= 0){
            $this->valid = false;
        }
        else{
            $this->emptyResult($this->result);
        }
    }

    // for update customer info
    function selectDB3($custNum, $custName, $phoneNumber1){
        $this->result = mysqli_query($this->dbConnect, 'select * from custinfo where cust_num = "' .$custNum. '" and cust_name = "'. $custName .'" and main_phone_number = "'. $phoneNumber1 .'" order by fix_date') or die("Select query error!");
        if(!($this->result)){
            $this->valid = false;
        }
        else{
            $this->emptyResult($this->result);
        }
    }

    // for delete customer info
    function selectDB4($custNum, $custName, $phoneNumber1){
        $this->result = mysqli_query($this->dbConnect, 'select * from custinfo where cust_num = "' . $custNum . '" and cust_name = "'. $custName .'" and main_phone_number = "'. $phoneNumber1 .'" order by fix_date') or die("Select query error!");
        if(!($this->result)){
            $this->valid = false;
        }
        else{
            $this->emptyResult($this->result);
        }
    }

    // by customer number
    function selectDB6($custNum){
        $this->result = mysqli_query($this->dbConnect, 'select * from custinfo where cust_num = "' . $custNum . '" order by fix_date') or die("Select query error!");
        if(!($this->result)){
            $this->valid = false;
        }
        else{
            $this->emptyResult($this->result);
        }
    }

// DELETE
    function deleteDB($custNum, $custName, $phoneNumber1){
        $this->result = mysqli_query($this->dbConnect, 'delete from custinfo where cust_num = "' . $custNum . '" and cust_name = "'. $custName .'" and main_phone_number = "'. $phoneNumber1 .'"') or die("Delete query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }

// -----------------------------------------------------------------------------------------------------------------------------------------


// ------------------------------------------------- Reservation ---------------------------------------------------------------------------

// Insert Reservation
    function insertReserveDB($reservationDate, $reservationTime, $custName, $phoneNumber1){
        $this->result2 = mysqli_query($this->dbConnect, 'insert into reserve(reserve_date, reserve_time, cust_name, main_phone_number) values("'. $reservationDate .'" , "'. $reservationTime .'" , "'. $custName .'" , "'. $phoneNumber1 .'")') or die("Insert query error!");
        if(!($this->result2)){
            $this->valid2 = false;
        }
    }

// Update Reservation
    function reservationDateUpdateDB($custName, $phoneNumber1, $reservationDate){
        $this->result2 = mysqli_query($this->dbConnect, 'update reserve set reserve_date = "' .$reservationDate. '" where cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result2)){
            $this->valid2 = false;
        }
    }
    function reservationTimeUpdateDB($custName, $phoneNumber1, $reservationTime){
        $this->result2 = mysqli_query($this->dbConnect, 'update reserve set reserve_time = "' .$reservationTime. '" where cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result2)){
            $this->valid2 = false;
        }
    }

// Select Reservation
    function selectReserveDB($custName, $phoneNumber1){
        $this->result2 = mysqli_query($this->dbConnect, 'select * from reserve where cust_name = "'. $custName .'" and main_phone_number = "'. $phoneNumber1 .'" order by reserve_date') or die("Select query error!");
        if(!($this->result2)){
            $this->valid2 = false;
        }
        else{
            $this->emptyResult($this->result2);
        }
    }

    function selectReserveDB2($startReserveDate, $lastReserveDate){
        $this->result2 = mysqli_query($this->dbConnect, 'select * from reserve where reserve_date >= "'. $startReserveDate .'" and reserve_date <= "'. $lastReserveDate .'" order by reserve_date') or die("Select query error!");
        if($this->result2 <= 0){
            $this->valid2 = false;
        }
        else{
            $this->emptyResult($this->result2);
        }
    }

    function selectReserveDB3($custName, $phoneNumber1){
        $this->result2 = mysqli_query($this->dbConnect, 'select * from reserve where cust_name = "'. $custName .'" and main_phone_number = "'. $phoneNumber1 .'" order by reserve_date') or die("Select query error!");
        if(!($this->result2)){
            $this->valid2 = false;
        }
        else{
            $this->emptyResult($this->result2);
        }
    }

    function selectReserveDB4($reserveNum, $custName, $phoneNumber1){
        $this->result2 = mysqli_query($this->dbConnect, 'select * from reserve where reserve_num = "' . $reserveNum . '" and cust_name = "'. $custName .'" and main_phone_number = "'. $phoneNumber1 .'" order by reserve_date') or die("Select query error!");
        if(!($this->result2)){
            $this->valid2 = false;
        }
        else{
            $this->emptyResult($this->result2);
        }
    }

// Delete Reservation
    function deleteReserveDB($reserveNum, $custName, $phoneNumber1){
        $this->result2 = mysqli_query($this->dbConnect, 'delete from reserve where reserve_num = "' . $reserveNum . '" and cust_name = "'. $custName .'" and main_phone_number = "'. $phoneNumber1 .'"') or die("Delete query error!");
        if(!($this->result2)){
            $this->valid2 = false;
        }
    }

// -----------------------------------------------------------------------------------------------------------------------------------------


    function emptyResult($result){
        if(mysqli_num_rows($result) == 0){
            $this->empty = true;
            $this->empty2 = true;
        }
        else{
            $this->empty = false;
            $this->empty2 = false;
        }
    }

    function destruct(){
        $this->disconnectDB();
    }

}

?>