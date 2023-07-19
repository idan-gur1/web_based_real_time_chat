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
        <section class="form signup">
            <header>RealTime Chat App</header>

            <form action="#" method="post" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field">
                        <label for="first_name">First Name</label>
                        <input type="text" name="fname" id="first_name" placeholder="First Name...">
                    </div>
                    <div class="field">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="lname" id="last_name" placeholder="Last Name...">
                    </div>
                </div>
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
                    <label for="image">Profile Picture</label>
                    <input type="file" name="image" id="image" accept="image/*">
                </div>
                <div class="field">
                    <input type="submit" name="submit" value="Sign Up">
                </div>
            </form>
            <div class="link">Already Signed up? <a href="login.php">Login here</a></div>
        </section>
    </div>

    <script src="javascript/password-visibility.js"></script>
    <script src="javascript/signup.js"></script>

</body>
</html>