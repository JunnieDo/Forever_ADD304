<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/home.css">
</head>
<style>
    body {
        background-image: url('assets/img/bg/CIRCLE_cut_BG.png');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: right bottom;
        background-size: 45%;
    }
</style>
<body>
    <?php include 'navbar.php'; ?>
    <button id="popup-btn"><img src="assets/img/bg/Dog_n_cat_bg.png" alt="button"></button>
    
    <div id="popup-overlay" class="popup-overlay">
        <div id="popup" class="popup">
            <p>Want to get started?</p>
            <div class="popup-container">
                <a href="cat.php"><i class="fa-solid fa-cat"></i></a>
                <a href="dog.php"><i class="fa-solid fa-dog"></i></a>
            </div>
        </div>
    </div>
</body>
<script src="https://kit.fontawesome.com/8115f5ec82.js" crossorigin="anonymous"></script>
<script>
    document.getElementById('popup-btn').addEventListener('click', function() {
        document.getElementById('popup').style.display = 'block';
    });

    document.getElementById('popup-btn').addEventListener('click', function() {
        document.getElementById('popup-overlay').style.display = 'block';
    });
    
    document.getElementById('popup-overlay').addEventListener('click', function(event) {
        if (event.target == this) {
            this.style.display = 'none';
        }
    });
</script>
</html>