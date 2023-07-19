<?php
    session_start();

    if(!isset($_SESSION['user_id'])){

        header("location: ../login.php");
    }

    include_once "db.php";

    $outgoing_id = $_SESSION['user_id'];

    $searchTerm = mysqli_real_escape_string($conn, $_POST['search']);

    $query = "SELECT * FROM users WHERE user_id != ? AND (fname LIKE ? OR lname LIKE ?) ORDER BY user_id DESC";
    
    $sql = mysqli_execute_query($conn, $query, [$_SESSION['user_id'], "%".$searchTerm."%", "%".$searchTerm."%"]);

    if (mysqli_num_rows($sql) == 0){
        exit("There are no available users");
    }

    $output = "";

    include_once "load-users-data.php";

    exit($output);
?>