<?php

    session_start();
    include "../db/connection.php";

    if (isset($_POST["btnlogin"])) {

        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = $con->query(" SELECT * FROM user INNER JOIN user_type ON user.user_type_id = user_type.user_type_id WHERE uname = '$username' ");

        if (mysqli_num_rows($query) > 0) {

            while ($res = mysqli_fetch_assoc($query)) {

                $get_user_id = $res["user_id"];
                $get_username = $res["uname"];
                $get_password = $res["pass"];
                $get_user_type = $res["user_type_name"];
                $type_id = $res["user_type_id"];

            }

            if ($password === $get_password) {

                if ($get_user_type == "admin") {

                    $_SESSION["admin_uname"] = $get_username;
                    $_SESSION["type_id"] = $type_id;
                    header("location: ../../admin/?dashboard"); // user locate to admin side

                }if ($get_user_type == "customer") {

                    $_SESSION["trans_no"] = rand();
                    $_SESSION["username"] = $get_username;
                    $_SESSION["user_id"] = $get_user_id;
                    header("location: ../?reservation"); // user locate to reservtion page
                    $_SESSION["notify"] = "login";

                }if ($get_user_type == "staff") {

                    $_SESSION["admin_uname"] = $get_username;
                    $_SESSION["type_id"] = $type_id;
                    $_SESSION["staff_trans_no"] = rand();
                    $_SESSION["staff_id"] = $get_user_id;
                    header("location: ../../admin/?dashboard"); // user locate to staff side

                }

            }else {

                $_SESSION["notify"] = "invalidP";
                header("location: ../?home");

            }

        }else {

            $_SESSION["notify"] = "invalidU";
            header("location: ../?home");

        }

    }

?>



