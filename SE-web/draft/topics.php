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
   <title>lessons and topics</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<header class="header">
   
   <section class="flex">

      <a href="home.html" class="logo">SmartStudy</a>

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

   <h1 class="heading">Lesson details</h1>

   <div class="row">

      <div class="column">
         <form action="" method="post" class="save-playlist">
            <button type="submit"><i class="far fa-bookmark"></i> <span>save lesson</span></button>
         </form>
   
         <div class="thumb">
            <img src="images/history.jpg" alt="">
           <!-- <span>10 videos</span>-->
         </div>
      </div>
      <div class="column">
         <div class="details">
            <h3>History of Computer</h3>
            <p>The history of computers began with early computing devices like the abacus and mechanical calculators in the 17th century. Significant advancements in electronic data processing occurred during World War II with the development of computers like Colossus and ENIAC, which used vacuum tubes. The invention of transistors and integrated circuits in the 1950s and 1960s revolutionized data processing, making computers smaller and faster...</p>
           <!-- <a href="teacher_profile.html" class="inline-btn">view profile</a>-->
         </div>
      </div>
   </div>

</section>

<section class="playlist-videos">

   <h1 class="heading">Lessons</h1>

   <div class="box-container">
      <div class="box">
         <div class="tutor">
            <div class="info">
               <h1>Lesson 1</h1>
            </div>
         </div>
         <div class="thumb">
            <img src="images/history.jpg" alt="">
         </div>
         <h3 class="title">Earliest Computing Devices</h3>
         <a href="inside.php" class="inline-btn">view</a>
      </div>

      <div class="box">
         <div class="tutor">
            <div class="info">
               <h1>Lesson 2</h1>
            </div>
         </div>
         <div class="thumb">
            <img src="images/prog.jfif" alt="">
         </div>
         <h3 class="title">Early Developments in Electronic Data processing</h3>
         <a href="wmethods.php" class="inline-btn">view</a>
      </div>
      <div class="box">
         <div class="tutor">
            <div class="info">
               <h1>Lesson 3</h1>
            </div>
         </div>
         <div class="thumb">
            <img src="images/prog.jfif" alt="">
         </div>
         <h3 class="title">Understanding Information System</h3>
         <a href="topics.php" class="inline-btn">view</a>
      </div>
      <div class="box">
         <div class="tutor">
            <div class="info">
               <h1>Lesson 4</h1>
            </div>
         </div>
         <div class="thumb">
            <img src="images/prog.jfif" alt="">
         </div>
         <h3 class="title">Data Processing</h3>
         <a href="topics.php" class="inline-btn">view</a>
      </div>
   </div>

</section>












<!--
<footer class="footer">

   &copy; copyright @ 2022 by <span>mr. web designer</span> | all rights reserved!

</footer>

 custom js file link  -->
<script src="js/script.js"></script>

   
</body>
</html>