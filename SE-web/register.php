<?php
session_start();
require 'config.php'; // Ensure this file contains your database connection code

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form inputs
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['pass'];
    $confirm_password = $_POST['c_pass'];
    $time = date("Y-m-d H:i:s");

    // Validate that the passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit();
    }

    // hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

     // concatenate first name and last name to create a username
     $username = $fname . " " . $lname;

    try {
        // SQL statement to prevent SQL injection
        $stmt = $db_con->prepare("INSERT INTO users (fname, lname, email, password, time) VALUES (:fname, :lname, :email, :password, :time)");
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':time', $time);

        if ($user && password_verify($password, $user['password'])) {
         // store user information in session
         $_SESSION['username'] = $user['fname'] . " " . $user['lname'];
         $_SESSION['role'] = $user['role'];
         $_SESSION['profile_pic'] = $user['profile_pic'];
         $_SESSION['email'] = $user['email'];

         // redirect to profile page
         header("Location: profile.php");
         exit();
     } else {
         echo "Invalid email or password.";
     }
        // execute the statement
        if ($stmt->execute()) {
            echo "User registered successfully!";
            // Redirect to a index page
            header("Location: login.php");
            exit();
        } else {
            echo "Error: Could not execute the query.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/register.css">

</head>
<body style="
  background-image: url('images/bglogin.jpg'); /* Adjust the path if necessary */
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
">
<section class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>register now</h3>
      <p>your first name <span>*</span></p>
      <input type="text" name="fname" placeholder="enter your first name" required maxlength="50" class="box">
      <p>your last name <span>*</span></p>
      <input type="text" name="lname" placeholder="enter your last name" required maxlength="50" class="box">
      <p>your email <span>*</span></p>
      <input type="email" name="email" placeholder="enter your email" required maxlength="50" class="box">
      <p>your password <span>*</span></p>
      <input type="password" name="pass" placeholder="enter your password" required maxlength="20" class="box">
      <p>confirm password <span>*</span></p>
      <input type="password" name="c_pass" placeholder="confirm your password" required maxlength="20" class="box">
      <input type="submit" value="register" name="submit" class="btn">
   </form>

</section>



 <!--custom js file link  -->
<script src="js/script.js"></script>

   
</body>
</html>