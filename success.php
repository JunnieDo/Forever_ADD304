<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/success.css">
</head>
<body>
    <?php include "navbar.php";?>
    <h1>Registration Success!</h1>
    <p>Thank you for registering!</p>
    <p> You will be redirect to <a class="join-us" href="LogIn.php">Log in</a> to start setting up your profile </p>
    <div id="countdown">
        <div id="countdown-number"></div>
        <svg>
            <circle r="18" cx="20" cy="20"></circle>
        </svg>
    </div>
    <script src="assets/js/countdown.js"></script>
    <script src="https://kit.fontawesome.com/8115f5ec82.js" crossorigin="anonymous"></script>
</body>
</html>