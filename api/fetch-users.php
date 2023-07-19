<?php
    session_start();

    if(!isset($_SESSION['user_id'])){

        header("location: ../login.php");
    }

    include_once "db.php";

    $outgoing_id = $_SESSION['user_id'];

    $query = "SELECT * FROM users WHERE user_id != ? ORDER BY user_id DESC";
    
    $sql = mysqli_execute_query($conn, $query, [$_SESSION['user_id']]);

    if (mysqli_num_rows($sql) == 0){
        exit("There are no available users");
    }

    $output = "";

    include_once "load-users-data.php";

    exit($output);
?>