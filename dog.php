<?php
    session_start();
    include 'connection.php';
    $conn = checkConnectionDb();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/card.css">
    <link rel="stylesheet" href="https://use.typekit.net/cfk5sas.css">
</head>
<style>
    body {
        background-image: url('assets/img/bg/dog_bg.png');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: left bottom;
        background-size: 35%;
    }
</style>
<body>
    <?php include 'navbar.php'; ?>
    <h1><i class="fa-solid fa-dog"></i> DOG</h1>    
    <a class="rescue-btn" href="list_pet.php"><i class="fa-solid fa-shield-dog"></i></a>
    <div class="cat-list">
        <?php
                // fetch data from database and display each of the cat card
                $sql = "SELECT * FROM pet_info WHERE type = 'dog'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='main-container'>";
                        echo    "<div class='card'>";
                        echo        "<img src='data:image/jpeg;base64,".base64_encode(stripslashes($row['image']))."' alt='Dog' class='card-img'>";
                        echo        "<div class='card-content'>";
                        echo            "<h3 class='card-name'>" . $row['name'] . "</h3>";
                        echo            "<p class='card-age'>Dog Age: " . $row['age'] . " years</p>";
                        echo            "<p class='card-description'>" . $row['description'] . "</p>";
                        echo            "<button class='card-btn'>Details</button>";
                        echo        "</div>";
                        echo    "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "0 results";
                }
            ?>
    </div>
</body>
<script src="https://kit.fontawesome.com/8115f5ec82.js" crossorigin="anonymous"></script>
</html>