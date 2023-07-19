<?php
    session_start();

    include_once "db.php";

    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    if (empty($email) || empty($password)) {
        exit("Please fill all fields");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit("Please enter a valid email");
    }

    $sql = mysqli_execute_query($conn, "SELECT * FROM users WHERE email=?", [$email]);

    if (mysqli_num_rows($sql) == 0) {
        exit("Email or password are incorrect");
    }

    $userRow = mysqli_fetch_assoc($sql);

    if (password_verify($password, $userRow["password"])) {
        $status = "Active Now";
        $statusSQL = mysqli_execute_query($conn, "UPDATE users SET status=? WHERE user_id=?", [$status, $userRow["user_id"]]);
        $_SESSION["user_id"] = $userRow["user_id"];
        exit("ok");
    } {
        exit("Email or password are incorrect");
    }

?>