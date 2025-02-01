<?php
    session_start();
    include "../db/connection.php";

    $get = $_SESSION["trans_no"];

    $sql = "DELETE FROM reservation WHERE trans_no = '$get'";

    mysqli_query($con, $sql);

    session_start();

    session_destroy();

    header("location: ../?home");

?>

