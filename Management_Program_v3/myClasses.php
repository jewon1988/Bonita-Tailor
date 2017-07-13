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
    function insertDB($contractDate, $custName, $phoneNumber1, $phoneNumber2, $address, $type, $product, $suits, $suitsFactory, $shirts, $shoes, $fixDate, $factoryFinishDate, $settingDate, $supplyDate, $shootingDate, $marriageDate, $price, $paid, $balance){
        $this->result = mysqli_query($this->dbConnect, 'insert into custinfo(contract_date, cust_name, main_phone_number, sub_phone_number, address, type, product, suits, suits_factory, shirts, shoes, fix_date, factory_finish_date, setting_date, supply_date, shooting_date, marriage_date, total_price, paid, balance) values("'. $contractDate .'" , "'. $custName .'" , "'. $phoneNumber1 .'" , "'. $phoneNumber2 .'" , "'. $address .'" , "'. $type .'" , "'. $product .'" , "'. $suits .'" , "'. $suitsFactory .'" , "'. $shirts .'" , "'. $shoes .'" , "'. $fixDate .'" , "'. $factoryFinishDate .'" , "'. $settingDate .'" , "'. $supplyDate .'" , "'. $shootingDate .'" , "'. $marriageDate .'" , "'. $price .'" , "'. $paid .'", "'. $balance .'" )') or die("Insert query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }

// UPDATE
    function phoneNumber2UpdateDB($custName, $phoneNumber1, $phoneNumber2){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set sub_phone_number = "' .$phoneNumber2. '" where cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function addressUpdateDB($custName, $phoneNumber1, $address){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set address = "' .$address. '" where cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function typeUpdateDB($custName, $phoneNumber1, $type){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set type = "' .$type. '" where cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function productUpdateDB($custName, $phoneNumber1, $product){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set product = "' .$product. '" where cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function suitsUpdateDB($custName, $phoneNumber1, $suits){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set suits = "' .$suits. '" where cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function suitsFactoryUpdateDB($custName, $phoneNumber1, $suitsFactory){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set suits_factory = "' .$suitsFactory. '" where cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function shirtsUpdateDB($custName, $phoneNumber1, $shirts2){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set shirts = "' .$shirts2. '" where cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function shirtsFactoryUpdateDB($custName, $phoneNumber1, $shirtsFactory){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set shirts_factory = "' .$shirtsFactory. '" where cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function shoesUpdateDB($custName, $phoneNumber1, $shoes){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set shoes = "' .$shoes. '" where cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function shoesFactoryUpdateDB($custName, $phoneNumber1, $shoesFactory){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set shoes_factory = "' .$shoesFactory. '" where cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function fixDateUpdateDB($custName, $phoneNumber1, $fixDate){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set fix_date = "' .$fixDate. '" where cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function factoryFinishDateUpdateDB($custName, $phoneNumber1, $factoryFinishDate){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set factory_finish_date = "' .$factoryFinishDate. '" where cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function settingDateUpdateDB($custName, $phoneNumber1, $settingDate){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set setting_date = "' .$settingDate. '" where cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function supplyDateUpdateDB($custName, $phoneNumber1, $supplyDate){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set supply_date = "' .$supplyDate. '" where cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function shootingDateUpdateDB($custName, $phoneNumber1, $shootingDate){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set shooting_date = "' .$shootingDate. '" where cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function marriageDateUpdateDB($custName, $phoneNumber1, $marriageDate){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set marriage_date = "' .$marriageDate. '" where cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function priceUpdateDB($custName, $phoneNumber1, $price){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set total_price = "' .$price. '" where cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function paidUpdateDB($custName, $phoneNumber1, $paid){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set paid = "' .$paid. '" where cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }
    function balanceUpdateDB($custName, $phoneNumber1, $balance){
        $this->result = mysqli_query($this->dbConnect, 'update custinfo set balance = "' .$balance. '" where cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result)){
            $this->valid = false;
        }
    }

// SELECT
    function selectDB($custName, $phoneNumber1){
        $this->result = mysqli_query($this->dbConnect, 'select * from custinfo where cust_name = "'. $custName .'" and main_phone_number = "'. $phoneNumber1 .'" order by fix_date') or die("Select query error!");
        if(!($this->result)){
            $this->valid = false;
        }
        else{
            $this->emptyResult($this->result);
        }
    }

    function selectDB2($startFixDate, $lastFixDate){
        $this->result = mysqli_query($this->dbConnect, 'select * from custinfo where fix_date >= "'. $startFixDate .'" and fix_date <= "'. $lastFixDate .'" order by fix_date') or die("Select query error!");
        if($this->result <= 0){
            $this->valid = false;
        }
        else{
            $this->emptyResult($this->result);
        }
    }
    // for update customer info
    function selectDB3($custName, $phoneNumber1){
        $this->result = mysqli_query($this->dbConnect, 'select * from custinfo where cust_name = "'. $custName .'" and main_phone_number = "'. $phoneNumber1 .'" order by fix_date') or die("Select query error!");
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
    function insertReserveDB($reservationDate, $reservationTime, $custName, $phoneNumber1, $phoneNumber2, $seller){
        $this->result2 = mysqli_query($this->dbConnect, 'insert into reserve(reserve_date, reserve_time, cust_name, main_phone_number, sub_phone_number, seller) values("'. $reservationDate .'" , "'. $reservationTime .'" , "'. $custName .'" , "'. $phoneNumber1 .'" , "'. $phoneNumber2 .'" , "'. $seller .'")') or die("Insert query error!");
        if(!($this->result2)){
            $this->valid2 = false;
        }
    }

// Update Reservation
    function reservePhoneNumber2UpdateDB($custName, $phoneNumber1, $phoneNumber2){
        $this->result2 = mysqli_query($this->dbConnect, 'update reserve set sub_phone_number = "' .$phoneNumber2. '" where cust_name = "' .$custName. '" and main_phone_number = "' .$phoneNumber1. '"') or die("Update query error!");
        if(!($this->result2)){
            $this->valid2 = false;
        }
    }
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

    function selectReserveDB2($startFixDate, $lastFixDate){
        $this->result2 = mysqli_query($this->dbConnect, 'select * from reserve where reserve_date >= "'. $startFixDate .'" and reserve_date <= "'. $lastFixDate .'" order by reserve_date') or die("Select query error!");
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