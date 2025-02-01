<?php

    session_start();
    include "../db/connection.php";

    //RESERVATION
    if (isset($_GET["reserve"])) {

        $reserve = $_GET["reserve"];
        $trans_no = $_SESSION["trans_no"];
        $user_id = $_SESSION["user_id"];//$sum = $_SESSION["sum"];
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

            $_SESSION["notify"] = "success-reserve";
            header("location: ../?cart");

        }else {

            echo "failed reserved";

        }
    }
    //CHECKOUT
    if (isset($_POST["btnPayment"])) {

        $u = $_POST["userid"];
        $t = $_POST["transno"];
        $p = $_POST["pay"];//$child = $_SESSION["child"];
        $amm = $_POST["ammount"];//$adult = $_SESSION["adult"];

        $sql = "INSERT INTO payment(transaction_id,ammount_payment,payment_status, ref_no) VALUES('$t','$p','Paid','$amm')";

        $query = mysqli_query($con, $sql);

        if ($query) {

            $sqlUp = "UPDATE `reservation` SET `status` = 'Pending' WHERE `trans_no` = '$t'";
            $queryUp = mysqli_query($con, $sqlUp);

            unset($_SESSION["trans_no"]);
            unset($_SESSION["sum"]);
            unset($_SESSION["date_reserve"]);
            unset($_SESSION["child"]);
            unset($_SESSION["adult"]);
            $_SESSION["trans_no"]=rand();
            header("location: ../?payment-success");

        }else {

            echo "Failed1";

        }
    }

    //delete reserve
    if (isset($_GET["transnodelete"])) {

        $get = $_GET["transnodelete"];

        $sql = "DELETE FROM reservation WHERE trans_no = '$get'";

        $query = mysqli_query($con, $sql);

        if (!$query) {

            $_SESSION["notify"] = "failed";
            header("location: ../?cart");
            return;

        }

        if ($query) {

            $_SESSION["notify"] = "success";
            header("location: ../?cart");
            return;

        }
    } 
    //Registration
    if (isset($_POST["btn-reg"])) {

        $val1 = $_POST["fname"];
        $val2 = $_POST["lname"];
        $val3 = $_POST["contact"];
        $addr = $_POST["address"];
        $val4 = $_POST["username"];
        $val5 = $_POST["password"];

        $sql = "INSERT INTO `user`(`fname`, `lname`, `contact_no`, `address`, `uname`, `pass`, `user_type_id`) 
                VALUES ('$val1','$val2','$val3','$addr','$val4','$val5','3')";

        $query = mysqli_query($con, $sql);

        if ($query) {

            $_SESSION["notify"] = "success-reg";
            header("location: ../?home");

        }else {

            $_SESSION["notify"] = "failed";
            header("location: ../?home");

        }
    }

    //Feedback
    if (isset($_POST["btnFeedback"])) {

        $message = $_POST["message"];

        if (empty($_POST["name"])) {

            $name_me = "Anonymous";

        }else {

            $name_me = $_POST["name"];

        }

    
        $sql = "INSERT INTO `feedback`(`cust_id`, `name`, `description`) 
                VALUES ('','$name_me','$message')";

        $query = mysqli_query($con, $sql);

        if ($query) {

            $_SESSION["notify"] = "success-feedback";
            header("location: ../?home");
            return;

        }
    }


    if (isset($_POST["btnUpdateDetails"])) {

        $id = $_POST["id"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $contact_no = $_POST["contact_no"];
        $address = $_POST["address"];

        $sql = "UPDATE user SET fname = '$fname', lname='$lname', contact_no = '$contact_no', `address` = '$address' WHERE user_id = '$id'";

        $query = mysqli_query($con, $sql);

        if ($query) {

            $_SESSION["notify"] = "success-update";
            header("location: ../?cart");
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

                $_SESSION["notify"] = "success-update";
                header("location: ../?cart");
                return;

            }
        }else {
            $_SESSION["notify"] = "ferson-error";
            header("location: ../?cart");
        }

    }

    if (isset($_GET["res-id-cancel"])) {

        $res_id_cancel = $_GET["res-id-cancel"];

        $sql="UPDATE `reservation` SET `status` = 'Cancelled' WHERE `trans_no` = '$res_id_cancel'";

        $query = mysqli_query($con, $sql);

        if ($query) {

            $_SESSION["notify"] = "cancel";
            header("location: ../?my-res");

        }else {

            $_SESSION["notify"] = "cancel-failed";
            header("location: ../?my-res");

        }

    }

    if (isset($_POST["btnDeleteReservation"])) {

        $del = $_POST["id"];

        $sql = "DELETE FROM `reservation` WHERE `id_res` = '$del'";

        $query = mysqli_query($con, $sql);

        if ($query) {

            $_SESSION["notify"] = "success";
            header("location: ../?cart");
            return;

        }
    } 