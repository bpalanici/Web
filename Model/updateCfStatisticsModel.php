<?php
   require_once('databaseConn.php');
   session_start();
   function updateCfStatus() {
      $c = curl_init();
      curl_setopt($c, CURLOPT_URL,'https://codeforces.com/api/user.status?handle=' . $_SESSION['cfusername']);//$_SESSION['cfusername']);              // stabilim URL-ul serviciului
      curl_setopt($c, CURLOPT_RETURNTRANSFER, true);  // rezultatul cererii va fi disponibil ca șir de caractere
      curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false); // nu verificam certificatul digital
      $res = curl_exec($c);                           // executam cererea GET
      curl_close($c);

      $data = json_decode($res, true);

      $usergmail = $_SESSION['userGmail']; 
      $cfUsername = $_SESSION['cfusername'];
      $nrAccepted = 0;
      $problemsSolved = array();
      $date = date_default_timezone_get(); //done
      $nrSubmissions = count($data['result']); //done

      foreach ($data['result'] as $key => $value) {
         if ($value['verdict'] == 'OK')  {
            $nrAccepted++;
            $problemsSolved[$value['problem']['name']] = 1;
         }
      }

     // echo json_encode($data['result'], JSON_PRETTY_PRINT);
      $nrSolved = count($problemsSolved);
      //return count($problemsSolved) . ' ' .  $nrAccepted . ' ' . $nrSubmissions; 

      $date=date("Y-m-d",strtotime($date));
      $conn = db::getConnection();
      if ($stmt = $conn->prepare('INSERT INTO cfstatistics (usergmail, cfusername, nrAccepted, nrSolved, date, nrSubmissions) Values (?, ?, ?, ?, ?, ?)')) {
          $stmt->bind_param("ssssss", $usergmail, $cfUsername, $nrAccepted, $nrSolved, $date, $nrSubmissions);
          $stmt->execute();
         $stmt->close();
      }
      else return 'Some db Error, try again';

      return 'ok';
      }
?>