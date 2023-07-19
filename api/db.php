<?php
    $host = "localhost";
    $username = "root";
    $pwd = "";
    $db = "chatDB";
    $conn = mysqli_connect($host, $username, $pwd, $db);
    if (!$conn) {
        echo "db connection error" . mysqli_connect_error();
    }
?>
