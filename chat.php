<?php
session_start();

include_once "api/db.php";

if (!isset($_SESSION["user_id"])) {
    header("location: login.php");
}

$targrt_user = mysqli_real_escape_string($conn, $_GET["user_id"]);

$getOtherUser = mysqli_execute_query($conn, "SELECT * FROM users WHERE user_id=?", [$targrt_user]);

if (mysqli_num_rows($getOtherUser) < 1) {
    session_unset();
    session_destroy();
    header("location: login.php");
}

$userRow = mysqli_fetch_assoc($getOtherUser);
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
        <section class="chat-area">
            <header>
                <a href="users.php"><i class="fas fa-arrow-left"></i></a>
                <img src="api/<?php echo $userRow["img"] ?>" alt="">
                <div class="details">
                    <span><?php echo $userRow["fname"] . " " . $userRow["lname"] ?></span>
                    <p><?php echo $userRow["status"] ?></p>
                </div>
            </header>
            <div class="chat-box">
                
            </div>
            <form action="#" autocomplete="off">
                <input type="hidden" name="incoming_id" class="incoming_id" value="<?php echo $targrt_user ?>">
                <input type="text" name="message" class="input-field" placeholder="message">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>

    <script src="javascript/chat.js"></script>

</body>

</html>