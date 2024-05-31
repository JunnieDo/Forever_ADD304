<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
body{
    background-color: rgba(255, 164, 98, 1);
}
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: rgba(255, 164, 98, 1);
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
  margin-top: 20px;
}

input[type=text], input[type=email], input[type=tel] {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 4px;
    resize: vertical;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  margin: 50px 40px 20px 40px;
}

.inner-container {
    border-radius: 5px;
    background-color: rgba(174, 207, 237, 1);
    padding: 20px;
    margin-left: 20px;
}

.card-img {
    width: 250px;
    border-radius: 5px;
    float: right;
    transform: translateY(-60px);
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

.col-50 {
    float: left;
    width: 50%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
<body>
    <?php 

        session_start();
        include 'navbar.php';
        // retrieve the pet_id from the URL and get the pet information from the database
        if (isset($_GET['pet_id']) && isset($_SESSION['login_email']) && isset($_SESSION['fullname'])) {
            include 'connection.php';
            $conn = checkConnectionDb();
            $petId = $_GET['pet_id'];
            $sql = "SELECT * FROM pet_info WHERE id = $petId";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            }
            
        } else {
            header("Location: index.php");
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $userPhoneNum = $_POST['user-phonenum'];
            $userMailBox = $_POST['user-mailbox'];
            $userId = $_SESSION['user_id'];

            $sql = "INSERT INTO user_support_pet (user_id, pet_id) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $userId, $petId);
            $stmt->execute();

            // if the phone number and mailbox got change, update the user information in the database
            $stmt = $conn->prepare("UPDATE user SET phone_number = ?, mailbox = ? WHERE user_id = ?");
            $stmt->bind_param("ssi", $userPhoneNum, $userMailBox, $userId);
            $stmt->execute();
            $stmt->close();
        }
    ?>
    <div class="container">
        <div class="row">
            <h2 class="col-25">Adoption Form</h2>
            <?php echo "<img src='data:image/jpeg;base64,".base64_encode(stripslashes($row['image']))."' alt='Cat' class='card-img'>" ?>
        </div>
        <div class="row" style="margin-top: 20px;">
            <div class="col-50">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-25">
                            <label for="user-name">Full Type</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="user-name" id="user-name" value="<?php echo $_SESSION['fullname']; ?>" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="user-email">Email</label>
                        </div>
                        <div class="col-75">
                            <input type="email" name="user-email" id="user-email" value="<?php echo $_SESSION['login_email']; ?>" disabled>
                        </div>
                    </div>
                    <?php
                        $userId = $_SESSION['user_id'];
                        $stmt = $conn->prepare("SELECT phone_number, mailbox FROM user WHERE user_id = ?");
                        $stmt->bind_param("i", $userId);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row_user = $result->fetch_assoc();
                    ?>
                    <div class="row">
                        <div class="col-25">
                            <label for="user-phonenum">Phone Number</label>
                        </div>
                        <div class="col-75">
                            <input required type="tel" name="user-phonenum" id="user-phonenum" 
                                <?php if (isset($row_user['phone_number'])){echo "value='" . $row_user['phone_number'] . "' ";} ?>>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="user-mailbox">Mail Box</label>
                        </div>
                        <div class="col-75">
                            <input required type="text" name="user-mailbox" id="user-mailbox" 
                                <?php if (isset($row_user['mailbox'])){echo "value='" . $row_user['mailbox'] . "' ";} ?>>
                        </div>
                    </div>               
                    <div class="row">
                        <input type="submit" value="Submit"></input>
                    </div>
                </form>

            </div>
            <div class="col-50">
                <div class="inner-container">
                    <h3>Pet Information:</h3>
                    <div class="row">
                        <div class="col-25">
                            <p>Pet Name</p>
                        </div>
                        <div class="col-75">
                            <p><?php echo $row['name']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <p>Pet Age</p>
                        </div>
                        <div class="col-75">
                            <p><?php echo $row['age']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <p>Pet Description</p>
                        </div>
                        <div class="col-75">
                            <p><?php echo $row['description']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <p>Pet Support Amount</p>
                        </div>
                        <div class="col-75">
                            <p><?php echo $row['fee']; ?>$ per month</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
<script src="https://kit.fontawesome.com/8115f5ec82.js" crossorigin="anonymous"></script>
</html>