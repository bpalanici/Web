<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="CSS/profile-style.css">
    <title>Profile | Technical Skill Enhancer</title>
    <?php
      session_start();
    ?>
  </head>

<body>
  <div class="main">
    <div class="container-header">
      <div class="content-header">
        <a href="index.html" class="logo"><img src="Images/Logo.png" width="200px"></a>
        <a href="index.html" class="Tab">
          Hello there, user 
          <?php
            require_once("Controller/profile.php");
            echo $_SESSION['userGmail'];
          ?> 
        </a>
        <a href="eventsRecommendations.php" class="Tab">Events</a>
        <a href="login.html" class="Tab">Logout</a>
      </div>
    </div>

    <div class="main-frame">
      <div class="profile-pic" id="profile-pic">

      </div>

      <div class="items">
        <?php echo getData() ?>
      </div>
        
    </div>
  </div>

</body>

</html>
