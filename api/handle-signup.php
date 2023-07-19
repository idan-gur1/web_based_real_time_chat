<?php
    session_start();

    include_once "db.php";

    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    if (empty($fname) || empty($lname) || empty($email) || empty($password)) {
        exit("Please fill all fields");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit("Please enter a valid email");
    }

    $emailSql = mysqli_execute_query($conn, "SELECT email FROM users WHERE email=?", [$email]);

    if (mysqli_num_rows($emailSql) > 0) {
        exit("This email is already in the system");
    }

    if (!empty($_FILES["image"]["name"])) {
        $target_picture_path = "pictures/" . time() . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_picture_path,PATHINFO_EXTENSION));

        if (!getimagesize($_FILES["image"]["tmp_name"]) || ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "svg")) {
            exit("Please upload a valid picture");
        }

        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_picture_path)) {
            exit("Something went wrong. Please try again later");
        } 

    } else {
        $target_picture_path = "pictures/default.png";
    }

    $status = "Active Now";
    $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);

    $insertSql = mysqli_execute_query($conn, "INSERT INTO users (fname, lname, email, password, img, status) VALUES (?, ?, ?, ?, ?, ?)", 
                                     [$fname, $lname, $email, $hashed_pwd, $target_picture_path, $status]);

    if (!$insertSql) {
        exit("Something went wrong. Please try again later");
    }

    $selectSql = mysqli_execute_query($conn, "SELECT * FROM users WHERE email=?", [$email]);

    if (mysqli_num_rows($selectSql) > 0) {
        $userRow = mysqli_fetch_assoc($selectSql);

        $_SESSION["user_id"] = $userRow["user_id"];
        exit("ok");
    } {
        exit("Something went wrong. Please try again later");
    }

?>