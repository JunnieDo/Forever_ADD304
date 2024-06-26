<?php
    session_start();
    if (isset($_SESSION['login_email']) || isset($_SESSION['fullname'])) {
        $user_id = $_SESSION['user_id'];
    }

    $errors = array('email' => '', 'firstname' => '', 'lastname' => '', 'password' => '');
    $success = '';
    include "connection.php";
    function registrationValidate($email, $firstname, $lastname, $password){
        global $errors;
        // Check if email already exists
        $con = checkConnectionDb();
        $stmt = $con->prepare("SELECT email FROM User WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($result);
        $stmt->fetch();
        $stmt->close();
        $con->close();
        if ($result) {
            $errors['email'] = "Email already exists";
        }

        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format";
        }

        // Check if first and last name is valid
        if (!preg_match("/^[a-zA-Z-' ]*$/", $firstname)) {
            $errors['firstname'] = "Only letters and white space allowed";
        }
        if (!preg_match("/^[a-zA-Z-' ]*$/", $lastname)) {
            $errors['lastname'] = "Only letters and white space allowed";
        }
        // Check if password is valid
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d])[^\s]{8,}$/", $password)) {
            $errors['password'] = "Password must contain at least 8 characters, an uppercase letter, a lowercase letter, a number, and a special character";
        }
        if (empty($errors['email']) && empty($errors['firstname']) && empty($errors['lastname']) && empty($errors['password'])) {
            return true;
        }
        return false;
        
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = strtolower($_POST['email']);
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        if (registrationValidate($email, $firstname, $lastname, $password)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            // Prepare the data to be written
            $con = checkConnectionDb();
            $stmt = $con->prepare("INSERT INTO User (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $firstname, $lastname, $email, $hashed_password);
            $stmt->execute();
            $stmt->close();
            $con->close();
            header('Location: success.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/form2.css">
</head>
<body>
    <?php include "navbar.php";?>
    <h1>Sign up to be a user!</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <!-- email -->
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <span class="error"><?php echo $errors['email']; ?></span><br>
        <!-- full name -->
        <div id="fullname">
            <div>
                <label for="firstname">First Name:</label><br>
                <input type="text" id="firstname" name="firstname" required><br>
                <span class="error"><?php echo $errors['firstname']; ?></span><br>
            </div>
            <div>
                <label for="lastname">Last Name:</label><br>
                <input type="text" id="lastname" name="lastname" required><br>
                <span class="error"><?php echo $errors['lastname']; ?></span><br>
            </div>
        </div>

        <!-- password -->
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <span class="error"><?php echo $errors['password']; ?></span><br>

        <input type="submit" value="Sign up!">  
    </form>
    <script src="https://kit.fontawesome.com/8115f5ec82.js" crossorigin="anonymous"></script>
</body>
</html>