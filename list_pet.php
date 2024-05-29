<?php
    include 'connection.php';
    ini_set('display_errors', 1); error_reporting(E_ALL);
    $conn = checkConnectionDb();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $petType = $_POST['pet-type'];
        $petName = $_POST['pet-name'];
        $petAge = $_POST['pet-age'];
        $petDescription = $_POST['pet-description'];

        // Handle the uploaded file
        if (isset($_FILES['pet-img'])) {
            $petImage = addslashes(file_get_contents($_FILES['pet-img']['tmp_name']));
        } else {
            $petImage = null;
        }

        $sql = "INSERT INTO pet_info (type, image, name, age, description) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssis", $petType, $petImage, $petName, $petAge, $petDescription);

        if ($stmt->execute()) {
            echo "<h2>New record created successfully</h2>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/form.css">
    <link rel="stylesheet" href="https://use.typekit.net/cfk5sas.css">
</head>
<body>
    <h1>Rescue Form</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div>
            <p><label for="pet-type">Pet Type:</label></p>
            <p><label for="pet-img">Pet Image:</label></p>
            <p><label for="pet-name">Pet Name:</label></p>
            <p><label for="pet-age">Pet Age:</label></p>
            <p><label for="pet-description">Pet Description:</label></p>
        </div>
        <div>
            <br>
            <select name="pet-type" id="pet-type">
                <option value="cat">Cat</option>
                <option value="dog">Dog</option>
            </select><br>
            <input type="file" name="pet-img" id="pet-img"><br>
            <input type="text" name="pet-name" id="pet-name"><br>
            <input type="number" name="pet-age" id="pet-age"><br>
            <textarea name="pet-description" id="pet-description" cols="30" rows="10"></textarea><br>
            <button type="submit">Submit</button>
        </div>      
    </form>
    <a href="index.html" class="btn-primary" style="text-decoration: none;
    color: white; background-color: #333; padding: 10px; margin: 20px; border-radius: 10px;">Back to home</a>
</body>
</html>