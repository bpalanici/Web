<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="CSS/profile-style.css">
        <title>Profile | Technical Skill Enhancer</title>
        <?php
            require_once("Controller/profile.php");
            session_start();
        ?>
    </head>

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
                <div class="items">
                    <?php echo getData() ?>
                </div>

                <div class="left-container">
                    <div class="picture-container" id="picture-container">
                        <div class="profile-pic" id="profile-pic"></div>
                        <div class="profile-text"><b>GMail</b> : <?= getVar("userGmail"); ?></div>
                        <div class="profile-text"><b>GitHub</b> : <?= getVar("username"); ?></div>
                        <div class="profile-text"><b>CodeForces</b> : <?= getVar("cfusername"); ?></div>
                        <div class="profile-text"><b>Nr of repos.</b> : <?= getVar("length"); ?></div>
                    </div>

                    <form>
                        <input class="button-events" type="button" value="See events nearby" onclick="window.location.href='eventsRecommendations.php'" />
                    </form>

                    <form>
                        <input class="button-events" type="button" value="Export Statistics" onclick="window.location.href='Controller/export.php'" />
                    </form>

                    <form>
                        <input class="button-events Logout" type="button" value="Logout" onclick="window.location.href='login.html'" />
                    </form>        
                </div>
            </div>
        </div>
    </body>
</html>