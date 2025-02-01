<?php

    session_start();
    include "../db/connection.php";

    if (!empty($_POST["date-res"])) {

        $date = $_POST["date-res"];
        $child = $_POST["child"];//1
        $adult = $_POST["adult"];//1
        $ts = $_POST["timeSlot"];
        $category = $_POST["category"];
        $add = $child + $adult;// $res = $add;
        $_SESSION["time_slot"] = $ts;
        $_SESSION["child"] = $child;
        $_SESSION["adult"] = $adult;
        $_SESSION["date_reserve"] = $date;
        $aquireddate = $date;

        //getting the date from reservation if exist 
        $sql = "SELECT `cottage/hall`.id as c_id, `cottage/hall`.img, `cottage/hall`.`name`, `cottage/hall`.category, `cottage/hall`.type, 
        `cottage/hall`.max_person, `cottage/hall`.price, reservation.id_res, reservation.trans_no, reservation.date_reserve, reservation.time_slot, reservation.`status`,
        reservation.`cottage/hall_id`, reservation.customer_id, reservation.date_created FROM `cottage/hall`
        INNER JOIN reservation ON `cottage/hall`.id = reservation.`cottage/hall_id` WHERE reservation.date_reserve = '$date' AND reservation.time_slot = '$ts' AND reservation.`status` != 'Cancelled'";

        $query = mysqli_query($con, $sql);
        $arr = array();
        
        if (mysqli_num_rows($query) > 0) {

            while ($fetch = mysqli_fetch_assoc($query)) {
                
                $fetch_id = $fetch["c_id"]; //fetch the id of cottage/hall
                array_push($arr, $fetch_id);

            }

        }else {

            $fetch_id = 0; //fetch the id of cottage/hall
            array_push($arr, $fetch_id);

        }
        
        $arra = implode(",",$arr);
    
        //get the avilable cottage/hall
        $sql2 = "SELECT * FROM `cottage/hall` WHERE NOT `cottage/hall`.`id` IN ($arra) AND `type` = '$category' AND `max_person` >= '$add'";

        $query2 = mysqli_query($con, $sql2);

        if (mysqli_num_rows($query2) > 0) {

            echo "<table class='table table-striped login-box-body'>";

            while ($fetch = mysqli_fetch_assoc($query2)) {

                echo "<tr>
                        <td style='vertical-align: center;'><img src='../admin/function/".$fetch['img']."' width='80px'></td> 
                        <td style='text-align:center; padding:20px;'>".$fetch['name']."</td>
                        <td style='text-align:center; padding:20px;'>Max Person: ".$fetch['max_person']."</td>
                        <td style='text-align:center; padding:20px;'>Price: ".number_format($fetch['price'])."</td>
                        <td style='text-align:center; padding:20px;'><a href='function/function_crud.php?reserve=".$fetch['id']."' class='btn btn-success'>Select</a></td>
                    </tr>";

            }

            echo "</table>";

        } else{

            echo "<div class='login-box-body'><center>No Availabale</center></div>";

        }

    }else {

        echo "<div class='login-box-body'><center>Empty Input (Please select date)</center></div>";

    }
?>