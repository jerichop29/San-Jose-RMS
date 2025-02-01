<?php

    session_start();
    include "../../home/db/connection.php";

    //delete reserve
    if (isset($_GET["transnodelete"])) {

        $get = $_GET["transnodelete"];

        $sql = "DELETE FROM reservation WHERE trans_no = '$get'";

        $query = mysqli_query($con, $sql);

        if (!$query) {

            $_SESSION["notify"] = "failed";
            header("location: ../?staff-cart");
            return;

        }

        if ($query) {

            $_SESSION["notify"] = "success";
            header("location: ../?staff-cart");
            return;

        }
    } 

    if (isset($_POST["btnUpdateFerson"])) {

        $coha = $_POST["c/h_id"];
        $id = $_POST["id"];
        $child = $_POST["ch"];
        $adult = $_POST["ad"];
        $total = $child + $adult;//3

        $sql = "SELECT * FROM `cottage/hall` WHERE `id` = '$coha' AND `max_person` >= '$total'";
        $query = mysqli_query($con, $sql);

        if (mysqli_num_rows($query) > 0) {
            $sql = "UPDATE `reservation` SET `child` = '$child', `adult`='$adult' WHERE id_res = '$id'";

            $query = mysqli_query($con, $sql);

            if ($query) {

                $_SESSION["notify"] = "success";
                header("location: ../?staff-cart");
                return;

            }
        }else {
            $_SESSION["notify"] = "failed";
            header("location: ../?staff-cart");
        }

    }

    if (isset($_POST["btnDeleteReservation"])) {

        $del = $_POST["id"];

        $sql = "DELETE FROM `reservation` WHERE `id_res` = '$del'";

        $query = mysqli_query($con, $sql);

        if ($query) {

            $_SESSION["notify"] = "success";
            header("location: ../?staff-cart");
            return;

        }
    } 

    //CHECKOUT
    if (isset($_POST["btnPayment"])) {

        $u = $_POST["userid"];
        $t = $_POST["transno"];//$child = $_SESSION["child"];
        $amm = $_POST["ammount"];//$adult = $_SESSION["adult"];

        $sql = "INSERT INTO payment(transaction_id,ammount_payment,payment_status, ref_no) VALUES('$t','$amm','Fullypaid','Cash Bases')";

        $query = mysqli_query($con, $sql);

        if ($query) {

            $sqlUp = "UPDATE `reservation` SET `status` = 'Fullypaid' WHERE `trans_no` = '$t'";
            $queryUp = mysqli_query($con, $sqlUp);

            unset($_SESSION["staff_trans_no"]);
            unset($_SESSION["sum"]);
            unset($_SESSION["date_reserve"]);
            unset($_SESSION["child"]);
            unset($_SESSION["adult"]);
            $_SESSION["staff_trans_no"]=rand();
            //header("location: ../?payment-success");
            $_SESSION["notify"] = "success-add";
            header("location: ../?walkin");

        }else {

            echo "Failed1";

        }
    }

    //RESERVATION
    if (isset($_GET["reserve"])) {

        $reserve = $_GET["reserve"];
        $trans_no = $_SESSION["staff_trans_no"];
        $user_id = $_SESSION["staff_id"];//$sum = $_SESSION["sum"];
        $date_reserve = $_SESSION["date_reserve"];
        $date_today = date("Y-m-d");
        $child = $_SESSION["child"];
        $adult = $_SESSION["adult"];
        $ts = $_SESSION["time_slot"];
        $additional = 0;

        if ($ts == "Night (7pm to 6am)") {
            $additional = 50;
        }

        $sql = "INSERT INTO `reservation`(`trans_no`, `date_reserve`, `child`,`adult`,`time_slot`,`additional`,`check_in`, `check_out`, `status`, `cottage/hall_id`, `customer_id`, `date_created`) 
                VALUES ('$trans_no','$date_reserve','$child','$adult','$ts','$additional','','','Processing','$reserve','$user_id','$date_today')";

        $query = mysqli_query($con, $sql);

        if ($query) {

            $_SESSION["notify"] = "success-add";
            header("location: ../?staff-cart");

        }else {

            echo "failed reserved";

        }
    }

    //add cottage
    if (isset($_POST["btn-cottage-add"])) {

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $actual_no = $_POST["actual_no"];
        $name = $_POST["name"];
        $type = $_POST["type"];
        $cat = $_POST["category"];
        $max_person = $_POST["max-person"];
        $price = $_POST["price"];

        $sqlcott = "INSERT INTO `cottage/hall`(`img`, `actual_no`, `name`,`type`,`category`,`max_person`,`price`) 
                    VALUES('$target_file','$actual_no','$name','$type','$cat','$max_person','$price')";
        $query = mysqli_query($con, $sqlcott);

        if ($query) {

            move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
            $_SESSION["notify"] = "success-add";
            header("location: ../?cottage");

        }else {

            $_SESSION["notify"] = "failed-add";
            header("location: ../?cottage");

        }

    }

    //delte cottage
    if (isset($_GET["cottage-del"])) {

        $id = $_GET["cottage-del"];
        $sql = "DELETE FROM `cottage/hall` WHERE id = '$id'";
        $query = mysqli_query($con, $sql);

        if ($query) {

            $_SESSION["notify"] = "success-delete";
            header("location: ../?cottage");

        }else {

            echo "failed to delete";

        }

    }

    //delte feature
    if (isset($_GET["feature-del"])) {

        $id = $_GET["feature-del"];
        $sql = "DELETE FROM `feature` WHERE id = '$id'";
        $query = mysqli_query($con, $sql);

        if ($query) {

            $_SESSION["notify"] = "success-delete";
            header("location: ../?features");

        }else {

            echo "failed to delete";

        }

    }

    //delte picture
    if (isset($_GET["picture-del"])) {

        $id = $_GET["picture-del"];
        $sql = "DELETE FROM `picture` WHERE id = '$id'";
        $query = mysqli_query($con, $sql);

        if ($query) {

            $_SESSION["notify"] = "success-delete";
            header("location: ../?pictures");

        }else {

            echo "failed to delete";

        }

    }



    //add feature
    if (isset($_POST["btn-feature-add"])) {

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $name = $_POST["name"];
        $desc = $_POST["desc"];

        $sql = "INSERT INTO `feature`(`img`,`name`,`desc`) VALUES('$target_file','$name','$desc')";
        $query = mysqli_query($con, $sql);

        if ($query) {

            move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
            $_SESSION["notify"] = "success-add";
            header("location: ../?features");

        }else {

            $_SESSION["notify"] = "failed-add";
            header("location: ../?features");

        }

    }



    //add picture
    if (isset($_POST["btn-picture-add"])) {

        $target_dir_pic = "uploads/";
        $target_file_pic = $target_dir_pic . basename($_FILES["img"]["name"]);
        $namepic = $_POST["name"];
        $descpic = $_POST["desc"];

        $sql2 = "INSERT INTO `picture`(`img`, `name`, `des`) VALUES ('$target_file_pic','$namepic','$descpic')"; 
        $query2 = mysqli_query($con, $sql2);

        if ($query2) {

            move_uploaded_file($_FILES["img"]["tmp_name"], $target_file_pic);
            $_SESSION["notify"] = "success-add";
            header("location: ../?pictures");

        }else {

            $_SESSION["notify"] = "failed-add";
            header("location: ../?pictures");

        }

    }


    //confirmation reservation
    if (isset($_GET["res-for-confirm-id"])) {

        $res_id = $_GET["res-for-confirm-id"];
        $no = $_GET["no"];
        
        $sqlGet = "SELECT * FROM payment WHERE transaction_id = '$res_id'";
        $queryGet = mysqli_query($con, $sqlGet);

        //$resPay = mysqli_fetch_assoc($queryGet);
        //$vaPay = $resPay["ammount_payment"] * 2;

        $sql="UPDATE `reservation` SET `status` = 'Reserved' WHERE `trans_no` = '$res_id'";

        $query = mysqli_query($con, $sql);

        if ($query) {
            //SMS HERE
            $text = 'Good day! this is San Jose Resort and Event Center,  your reservation was successfully reserved. Thank you';
            $number = $no;
            exec('echo '.$text.' | gnokii --sendsms '.$number);
            $_SESSION["notify"] = "confirm";
            header("location: ../?pending");

        }else {

            $_SESSION["notify"] = "confirm-failed";
            header("location: ../?pending");

        }

    }

    //fullypaid reservation
    if (isset($_GET["res-id"])) {

        $res_id = $_GET["res-id"];

        $sqlGet = "SELECT * FROM payment WHERE transaction_id = '$res_id'";
        $queryGet = mysqli_query($con, $sqlGet);

        $resPay = mysqli_fetch_assoc($queryGet);
        $vaPay = $resPay["ammount_payment"] * 2;

        $sql="UPDATE `reservation` SET `status` = 'Fullypaid' WHERE `trans_no` = '$res_id'";
        $query = mysqli_query($con, $sql);

        if ($query) {

            $sqlUpdate ="UPDATE `payment` SET ammount_payment = '$vaPay', `payment_status` = 'Fullypaid' WHERE `transaction_id` = '$res_id'";
            $queryUpdate = mysqli_query($con, $sqlUpdate);
            $_SESSION["notify"] = "paid";
            header("location: ../?reserved2");

        }else {

            $_SESSION["notify"] = "paid-failed";
            header("location: ../?reserved2");

        }

    }

    //cancel reservation
    if (isset($_GET["res-id-cancel"])) {

        $res_id_cancel = $_GET["res-id-cancel"];

        $sql="UPDATE `reservation` SET `status` = 'Cancelled' WHERE `trans_no` = '$res_id_cancel'";
        $query = mysqli_query($con, $sql);

        if ($query) {

            $_SESSION["notify"] = "cancel";
            header("location: ../?pending");

        }else {

            $_SESSION["notify"] = "cancel-failed";
            header("location: ../?pending");

        }

    }

    //add user
    if (isset($_POST["btnAddUser"])) {

        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $uname = $_POST["uname"];
        $pass  = $_POST["pass"];
        $utype = $_POST["utype"];

        $sql = "INSERT INTO `user`(`fname`, `lname`, `uname`, `pass`, `user_type_id`) VALUES ('$fname','$lname','$uname','$pass','$utype')";
        $query = mysqli_query($con, $sql);

        if ($query) {

            $_SESSION["notify"] = "success";
            header("location: ../?users");
            return;

        } 

        if(!$query) {

            $_SESSION["notify"] = "failed";
            header("location: ../?users");
            return;

        }

    }


    //delte user
    if (isset($_GET["user-del"])) {

        $id = $_GET["user-del"];

        $sql = "DELETE FROM `user` WHERE user_id = '$id'";
        $query = mysqli_query($con, $sql);

        if ($query) {

            $_SESSION["notify"] = "success-delete";
            header("location: ../?users");

        }else {

            echo "failed to delete";

        }

    }

    //delte feedback
    if (isset($_GET["feedback-del"])) {

        $id = $_GET["feedback-del"];

        $sql = "DELETE FROM `feedback` WHERE feedback_id = '$id'";
        $query = mysqli_query($con, $sql);

        if ($query) {

            $_SESSION["notify"] = "success-delete";
            header("location: ../?feedback");

        }else {

            echo "failed to delete";

        }

    }

    //update cottage
    if (isset($_POST["btn-cottage-edit"])) {

        $id = $_POST["id"];
        $actual_no  = $_POST["actual_no"];
        $name = $_POST["name"];
        $type = $_POST["type"];
        $category = $_POST["category"];
        $max_person = $_POST["max-person"];
        $price    = $_POST["price"];

        $sql = "UPDATE `cottage/hall` SET `name`='$name', `actual_no` = '$actual_no',`type`='$type',`category`='$category',`max_person`='$max_person',`price`='$price' WHERE id = '$id'";
        $query = mysqli_query($con, $sql);

        if (!$query) {

            $_SESSION["notify"] = "failed";
            header("location: ../?cottage");
            return;

        }

        if ($query) {

            $_SESSION["notify"] = "success";
            header("location: ../?cottage");
            return;

        }

    }

    //update user
    if (isset($_POST["updateuser"])) {

        $id = $_POST["id"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $uname = $_POST["uname"];
        $pass  = $_POST["pass"];
        $utype = $_POST["utype"];

        $sql = "UPDATE `user` SET `fname`='$fname',`lname`='$lname',`uname`='$uname',`pass`='$pass',`user_type_id`='$utype' WHERE user_id = '$id'";
        $query = mysqli_query($con, $sql);

        if (!$query) {

            $_SESSION["notify"] = "failed";
            header("location: ../?users");
            return;

        }

        if ($query) {

            $_SESSION["notify"] = "success";
            header("location: ../?users");
            return;

        }

    }

    if (isset($_POST["btn-feature-edit"])) {

        $get_id = $_POST["id"];
        $name = $_POST["name"];
        $desc = $_POST["desc"];

        $sql = "UPDATE `feature` SET `name`='$name',`desc`='$desc' WHERE id = $get_id";
        $query = mysqli_query($con, $sql);

        if(!$query){
            $_SESSION["notify"] = "failed";
            header("location: ../?features");
            return;
        }
        if($query){
            $_SESSION["notify"] = "success";
            header("location: ../?features");
            return;
        }

    }

    if (isset($_POST["btn-picture-edit"])) {

        $get_id = $_POST["id"];
        $name = $_POST["name"];
        $desc = $_POST["desc"];

        $sql = "UPDATE `picture` SET `name`='$name',`des`='$desc' WHERE id = $get_id";
        $query = mysqli_query($con, $sql);

        if(!$query){
            $_SESSION["notify"] = "failed";
            header("location: ../?pictures");
            return;
        }
        if($query){
            $_SESSION["notify"] = "success";
            header("location: ../?pictures");
            return;
        }
        
    }







