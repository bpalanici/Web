<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="CSS/repository-style.css">
        <title>Technical Skill Enhancer</title>
    </head>

    <?php
        require_once("Controller/profile.php");
        require_once("Controller/repository.php");
        session_start();
    ?>

    <body>
        <div class="main">
            <div class="topFlex">
                <div class="imageTitle">
                    <a href="index.html" class="imageTitleImage" >
                        <img src="images/Logo.png" alt="Image does not exist" width="200px">
                    </a>

                    <div class="titleText">
                        Technical Skill Enhancer 
                    </div>
                </div>
            </div>

            <div class="main-frame">
               <div class="left-container">
                    <div class="picture-container" id="picture-container">
                        <div class="profile-pic" id="profile-pic"><?php echo getPicture(); ?></div>
                        <div class="profile-text"><b>GMail</b> : <?= getVar("userGmail"); ?></div>
                        <div class="profile-text"><b>GitHub</b> : <?= getVar("username"); ?></div>
                        <div class="profile-text"><b>CodeForces</b> : <?= getVar("cfusername"); ?></div>
                        <div class="profile-text"><b>Nr of repos.</b> : <?= getVar("length"); ?></div>
                    </div>

                    <input class="button-events" type="button" value="See events nearby" onclick="window.location.href='eventsRecommendations.php'" />
                    <input class="button-events profile" type="button" value="See profile" onclick="window.location.href='profile.php'" /> 
                    <input class="button-events Logout" type="button" value="Logout" onclick="window.location.href='index.html'" />
   
                </div>

                <div class="right-container">
                    <?php echo controllerGetScores(); ?>
                </div>
            </div>
        </div>
    </body>
</html>