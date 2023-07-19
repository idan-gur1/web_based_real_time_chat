<?php
    session_start();

    include_once "db.php";

    if(!isset($_SESSION['user_id'])){

        header("location: ../login.php");
    }
    $status = "Offline now";
    $sql = mysqli_execute_query($conn, "UPDATE users SET status=? WHERE user_id=?", [$status, $_SESSION['user_id']]);

    session_unset();
    session_destroy();
    header("location: ../login.php");
?>