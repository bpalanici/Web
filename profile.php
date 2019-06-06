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
            echo $_SESSION['userGmail'];
          ?> 
          .
        </a>
        <a href="index.html" class="Tab">Placeholdeeeeer2</a>
        <a href="login.html" class="Tab">Logout</a>
      </div>
    </div>

    <div class="main-frame">
      <div class="item">
          <div class="item-language">
            C++
          <hr>
          </div>

          <div class="item-list">
              <div class="info">Issues solved : 15</div>
              <div class="info">Issues created : 10</div>
              <div class="info">Issues received : 20</div>
              <div class="info">Rank  : advanced </div>
          </div>
      </div>

      <div class="item">
        <div class="item-language">
             Python
        </div>
        <hr>
        <div class="item-list">
            <div class="info">Issues solved : 15</div>
            <div class="info">Issues created : 10</div>
            <div class="info">Issues received : 20</div>
            <div class="info">Rank  : advanced</div>
        </div>
      </div>

      <div class="item">
        <div class="item-language">
             Assembly x86
        </div>
        <hr>
        <div class="item-list">
            <div class="info">Issues solved : 15</div>
            <div class="info">Issues created : 10</div>
            <div class="info">Issues received : 20</div>
            <div class="info">Rank  : advanced</div>
        </div>
      </div>

      <div class="item">
        <div class="item-language">
             AutoIT
        </div>
        <hr>
        <div class="item-list">
            <div class="info">Issues solved : 15</div>
            <div class="info">Issues created : 10</div>
            <div class="info">Issues received : 20</div>
            <div class="info">Rank  : advanced</div>
        </div>
      </div>

      <div class="item">
        <div class="item-language">
             Ruby
        </div>
        <hr>
        <div class="item-list">
            <div class="info">Issues solved : 15</div>
            <div class="info">Issues created : 10</div>
            <div class="info">Issues received : 20</div>
            <div class="info">Rank  : advanced</div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
