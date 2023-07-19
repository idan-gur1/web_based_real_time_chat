<?php
    session_start();

    if(!isset($_SESSION['user_id'])){

        header("location: ../login.php");
    }

    include_once "db.php";

    $outgoing_id = $_SESSION['user_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $msg = mysqli_real_escape_string($conn, $_POST['message']);
    
    if (!empty($msg)) {
        $sql = mysqli_execute_query($conn, "INSERT INTO messages (target_id, sender_id, msg) VALUES (?, ?, ?)", 
                                [$incoming_id, $outgoing_id, $msg]) or exit();
    }

?>