<?php

session_start();

@include 'config.php';

//if(!isset($_SESSION['nurse_name']) && !isset($_SESSION['admin_name']) && !isset($_SESSION['headnurse_name'])){
   // Redirect to login page if none of the session variables are set
   //header('location:index.php');
   //exit();
//}
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>detail 1</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<header class="header">
   
   <section class="flex">

      <a href="index.php" class="logo">SmartStudy</a>

      <form action="search.html" method="post" class="search-form">
         <input type="text" name="search_box" required placeholder="search courses..." maxlength="100">
         <button type="submit" class="fas fa-search"></button>
      </form>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="toggle-btn" class="fas fa-sun"></div>
      </div>

      <div class="profile">
         <img src="images/download.jfif" class="image" alt="">
         <h3 class="name"><?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest'; ?></h3>
         <p class="role">student</p>
         <a href="profile.php" class="btn">view profile</a>
         <div class="flex-btn">
            <a href="login.php" class="option-btn">login</a>
            <a href="register.php" class="option-btn">register</a>
         </div>
      </div>

   </section>

</header>   

<div class="side-bar">
   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>
   <div class="profile">
      <img src="images/download.jfif" class="image" alt="">
      <h3 class="name"><?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest'; ?></h3>
      <p class="role">student</p>
      <a href="profile.php" class="btn">view profile</a>
   </div>
   <nav class="navbar">
      <a href="index.php"><i class="fas fa-home"></i><span>Home</span></a>
      <a href="lessons.php"><i class="fas fa-chalkboard-user"></i><span>Lessons</span></a>
      <a href="blank.php"><i class="fas fa-graduation-cap"></i><span>Added Lessons</span></a>
      <a href="about.php"><i class="fas fa-question"></i><span>About</span></a>
      <a href="contact.php"><i class="fas fa-headset"></i><span>Contact us</span></a>
   </nav>
</div>

<section class="playlist-details">

   <h1 class="heading">Earliest Computing Devices</h1>
   <div class="column">
   <form action="" method="post" class="save-playlist">
    <a href="topics.php" class="inline-btn" style="margin-bottom: 10px;">
        <i class='fas fa-chevron-circle-left'></i><span> Go back</span>
    </a>
</form>
      </div>
   <div class="row">
      <div class="column">
         <div class="thumb">
            <img src="images/tally.jfif" alt="">
         </div>
      </div>
      <div class="column">
         <div class="details">
            <h3>Tally Sticks</h3>
            <p>- Was an ancient memory aid device to record and document numbers, quantities, or even messages. </p>
            <p>- First appear as animal bones carved with notches.</p>
            <p>- Kinds of tally sticks: palaeolithic tally sticks, single tally, split tally
            </p>
         </div>
      </div>
      <div class="info-lesson">
        <ul>
            <li>Palaeolithic tally sticks - the Ishango bone is a bone tool, dated to the Upper Palaeolithic era, around 18,000 to 20,000BC. It is a dark brown length of bone, the fibula of a baboon. It has a series of tally marks carved in three columns running the length of the tool. It was found in 1960 in Belgian Congo.</li>
            <li>Single tally - was an elongated piece of bone, ivory, wood, or stone which is marked with a system of notches.</li>
            <li>Split tally - was a technique which became common in medieval Europe, which was constantly short of money (coins) and predominantly illiterate, in order to record bilateral exchange and debts. A stick (squared hazel wood sticks were most common) was marked with a system of notches and then split lengthwise.</li>
        </ul>
    </div>
   </div>
</section>

<script src="js/script.js"></script>
</body>
</html>