
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pomodoro Timer</title>
    <!-- Font Awesome Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
      rel="stylesheet"
    />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="time.css" />
  </head>
  <body>
    <div class="time-container">
      <div class="section-container">
        <button id="focus" class="btn btn-timer btn-focus">Focus</button>
        <button id="shortbreak" class="btn btn-shortbreak">Short Break</button>
        <button id="longbreak" class="btn btn-longbreak">Long Break</button>
      </div>
      <div class="time-btn-container">
        <span id="time"></span>
        <div class="btn-container">
          <button id="btn-start" class="show">Start</button>
          <button id="btn-pause" class="hide">Pause</button>
          <button id="btn-reset" class="hide">
            <i class="fa-solid fa-rotate-right"></i>
          </button>
        </div>
      </div>
    </div>

    <section class="playlist-details">
         <h1 class="heading">Earliest Computing Devices</h1>
         <div class="column">
         <form action="" method="post" class="save-playlist">
          <a href="topics.php" class="inline-btn" style="margin-bottom: 10px;">
              <i class='fas fa-chevron-circle-left'></i><span> Go back</span>
          </a>
      </form>
        <div class="row">
            <div class="column">
               <div class="thumb">
                  <img src="images/tally.jfif" alt="">
               </div>
            </div>
        <div class="column">
               <div class="details">
                  <h3>Tally Sticks</h3>
                  <li>Was an ancient memory aid device to record and document numbers, quantities, or even messages.</li>
                  <li>First appear as animal bones carved with notches.</li>
                  <li>Kinds of tally sticks: palaeolithic tally sticks, single tally, split tally</li>
               </div>
            </div>
            <div class="info-lesson">
              <ul>
                  <li>Palaeolithic tally sticks - the Ishango bone is a bone tool, dated to the Upper Palaeolithic era, around 18,000 to 20,000BC. It is a dark brown length of bone, the fibula of a baboon. It has a series of tally marks carved in three columns running the length of the tool. It was found in 1960 in Belgian Congo.</li>
                  <li>Single tally - was an elongated piece of bone, ivory, wood, or stone which is marked with a system of notches.</li>
                  <li>Split tally - was a technique which became common in medieval Europe, which was constantly short of money (coins) and predominantly illiterate, in order to record bilateral exchange and debts. A stick (squared hazel wood sticks were most common) was marked with a system of notches and then split lengthwise.</li>
              </ul>
          </div>
          <div class="row">
            <div class="column">
               <div class="thumb">
                  <img src="images/abacus.jpg" alt="">
               </div>
            </div>
        <div class="column">
               <div class="details">
                  <h3>Abacus</h3>
                  <li>First invented manual data processing device.</li>
                  <li>Useful manual mathematical computer.</li>
                  <li>KOldest surviving abacus was used in 300bc by Babylonians but it is often wrongly attributed to china.</li>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="column">
               <div class="thumb">
                  <img src="images/napier.jfif" alt="">
               </div>
            </div>
        <div class="column">
               <div class="details">
                  <h3>John Napier
                  </h3>
                  <li>Scottish mathematician; known for his invention of logarithm in early 1600's, 
                    </li>
                  <li>logarithm is a technology that allows multiplication to be computed through addition</li>
               </div>
            </div>
         </div>
      </section>

    <!-- Script -->
    <script>
      let focusButton = document.getElementById("focus");
      let buttons = document.querySelectorAll(".btn");
      let shortBreakButton = document.getElementById("shortbreak");
      let longBreakButton = document.getElementById("longbreak");
      let startBtn = document.getElementById("btn-start");
      let reset = document.getElementById("btn-reset");
      let pause = document.getElementById("btn-pause");
      let time = document.getElementById("time");
      let set;
      let active = "focus";
      let count = 59;
      let paused = true;
      let minCount = 24;
      time.textContent = `${minCount + 1}:00`;

      const appendZero = (value) => {
        value = value < 10 ? `0${value}` : value;
        return value;
      };

      reset.addEventListener(
        "click",
        (resetTime = () => {
          pauseTimer();
          switch (active) {
            case "long":
              minCount = 14;
              break;
            case "short":
              minCount = 4;
              break;
            default:
              minCount = 24;
              break;
          }
          count = 59;
          time.textContent = `${minCount + 1}:00`;
        })
      );

      const removeFocus = () => {
        buttons.forEach((btn) => {
          btn.classList.remove("btn-focus");
        });
      };

      focusButton.addEventListener("click", () => {
        removeFocus();
        focusButton.classList.add("btn-focus");
        pauseTimer();
        minCount = 24;
        count = 59;
        time.textContent = `${minCount + 1}:00`;
      });

      shortBreakButton.addEventListener("click", () => {
        active = "short";
        removeFocus();
        shortBreakButton.classList.add("btn-focus");
        pauseTimer();
        minCount = 4;
        count = 59;
        time.textContent = `${appendZero(minCount + 1)}:00`;
      });

      longBreakButton.addEventListener("click", () => {
        active = "long";
        removeFocus();
        longBreakButton.classList.add("btn-focus");
        pauseTimer();
        minCount = 14;
        count = 59;
        time.textContent = `${minCount + 1}:00`;
      });

      pause.addEventListener(
        "click",
        (pauseTimer = () => {
          paused = true;
          clearInterval(set);
          startBtn.classList.remove("hide");
          pause.classList.remove("show");
          reset.classList.remove("show");
        })
      );

      startBtn.addEventListener("click", () => {
        reset.classList.add("show");
        pause.classList.add("show");
        startBtn.classList.add("hide");
        startBtn.classList.remove("show");
        if (paused) {
          paused = false;
          time.textContent = `${appendZero(minCount)}:${appendZero(count)}`;
          set = setInterval(() => {
            count--;
            time.textContent = `${appendZero(minCount)}:${appendZero(count)}`;
            if (count == 0) {
              if (minCount != 0) {
                minCount--;
                count = 60;
              } else {
                clearInterval(set);
              }
            }
          }, 1000);
        }
      });
    </script>
  </body>
</html>