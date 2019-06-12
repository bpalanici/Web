<?php
  require_once('Controller/events.php');
  session_start();
?>

<!DOCTYPE html>
<html lang = "en">
  <head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="CSS/eventsRecommendations-style.css">
  <title>Profile</title>
  </head>

<body>

<header>
  	<div class="imageTitle">
		<a href="index.html">
			<img src="Images/Logo.png" alt = "img not found" class="imgHeader" height="100" width="150">
		</a>
		<div class="headerTitle">Events</div>
  	<nav>
  		<ul>
  			<li>
  				<a href="Controller/updateCfStatistics.php">
  			    Update Cf Statistics
  				</a>
  			</li>
  			<li>
  				<a href="eventsRecommendations.php">
  				Events and Suggestions
  				</a>
  			</li>
  			<li>
  				<a href="login.html">
  						Log Out
  				</a>
  			</li>
  		</ul>

  	</nav>
    </div>
</header>


<section>
  <div class="flexContainer">
	 <div class="main">
    <div class="list">
        <div class="list-header">
             <h2 class="list-title">Traininguri</h2>
        </div>
        <div class="card-list">
            <div class="card">
              <div class=flexInsideCard>
              <a class="card-title">Front-End Yonder</a>
              <button class="buttonCard"> Apply </button>
              </div>
            </div>
            <div class="card">
              <div class=flexInsideCard>
              <a class="card-title">Back-End Endava</a>
              <button class="buttonCard"> Apply </button>
              </div>
            </div>

        </div>
    </div>
</div>
<div class="main">
  <div class="list">
    <div class="list-header">
         <h2 class="list-title">Evenimente</h2>
    </div>
    <div class="card-list">
        <div class="card">

          <div class=flexInsideCard>
            <a class="card-title">Stagii pe bune 22.03.2019</a>
            <button class="buttonCard"> Apply </button>
          </div>
        </div>

        <div class="card">
          <div class=flexInsideCard>
          <a class="card-title">FIIPractic 24.03.2019</a>
          <button class="buttonCard"> Apply </button>
          </div>
        </div>
        <?php 
        echo controllerGetRecommendations();
        ?>
    </div>
  </div>
</div>
<div class="main">
    <div class="list">
        <div class="list-header">
             <h2 class="list-title">Repositories</h2>
        </div>
        <div class="card-list">
            <div class="card">
              <div class=flexInsideCard>
              <a class="card-title">Git link 1</a>
              <button class="buttonCard"> Get </button>
              </div>
            </div>
            <div class="card">
              <div class=flexInsideCard>
              <a class="card-title">Git link 2</a>
              <button class="buttonCard"> Get </button>
              </div>
            </div>
        </div>
     </div>
   </div>
</div>
</section>
</body>
</html>
