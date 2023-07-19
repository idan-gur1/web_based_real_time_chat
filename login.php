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
        <section class="form login">
            <header>RealTime Chat App</header>

            <form action="#" method="post">
                <div class="error-txt"></div>
                <div class="field">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" placeholder="Email...">
                </div>
                <div class="field">
                    <label for="password">Password</label>
                    <div class="password-container">
                        <input type="password" name="password" id="password" placeholder="Password...">
                        <i class="fas fa-eye"></i>
                    </div>
                </div>
                <div class="field">
                    <input type="submit" name="submit" value="Log in">
                </div>
            </form>
            <div class="link">Not with us? <a href="index.php">Signup now</a></div>
        </section>
    </div>

    <script src="javascript/password-visibility.js"></script>
    <script src="javascript/login.js"></script>

</body>
</html>