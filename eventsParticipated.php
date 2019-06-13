<?php
  require_once('Controller/eventsParticipated.php');
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
		<div class="topFlex">
        <div class="imageTitle">
            <a href="index.html" class="imageTitleImage" >
                <img src="images/Logo.png" alt="Image does not exist" width="200px">
            </a>

            <div class="titleText">
                Technical Skill Enhancer 
            </div>

            <input class="button-profile" type="button" value="Check out your profile" onclick="window.location.href='profile.php'" />
        </div>
    </div>

<section>
<div class="flexContainer">
    <div class="main competitions">
        <div class="list">
            <div class="list-header">
                 <h2 class="list-title">Concursuri</h2>
                 <hr>
            </div>
            <div class="card-list">
                <?php 
                    echo controllerGetCfVisited();
                ?>

            </div>
        </div>
    </div>

    <div class="main events">
        <div class="list">
            <div class="list-header">
                 <h2 class="list-title">Evenimente</h2>
                 <hr>
            </div>
            <div class="card-list">
                <?php 
                    echo controllerGetMeetupVisited();
                ?>
            </div>
        </div>
    </div>
</div>
</section>
</body>
</html>
