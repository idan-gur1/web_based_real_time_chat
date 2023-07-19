<?php
    session_start();

    include_once "api/db.php";

    if (!isset($_SESSION["user_id"])) {
        header("location: login.php");
    }

    $getUser = mysqli_execute_query($conn, "SELECT * FROM users WHERE user_id=?", [$_SESSION["user_id"]]);

    if (mysqli_num_rows($getUser) < 1) {
        session_unset();
        session_destroy();
        header("location: login.php");
    }

    $userRow = mysqli_fetch_assoc($getUser);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtime chat app</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.css">
</head>
<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <div class="content">
                    <img src="api/<?php echo $userRow["img"] ?>" alt="">
                    <div class="details">
                        <span><?php echo $userRow["fname"] . " " . $userRow["lname"] ?></span>
                        <p><?php echo $userRow["status"] ?></p>
                    </div>
                </div>
                <a href="api/logout.php" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" name="search" id="search" placeholder="Name to search...">
                <button id="search-btn"><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
                
            </div>
        </section>
    </div>

    <script src="javascript/users.js"></script>

</body>
</html>