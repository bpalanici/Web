<?php
  require_once("databaseConn.php");

  // Returneaza CURL-ul cu optiunile setate, pentru a face codul mai lizibil.
  function getCURL(){
    $curl = curl_init();
        curl_setopt_array($curl, [
          CURLOPT_RETURNTRANSFER => 1,
          CURLOPT_SSL_VERIFYPEER => false,
          CURLOPT_USERAGENT => "Technical-Skill-Enhancer-App"
        ]);

    return $curl;
  }  

  // IN  : -
  // OUT : JSON cu repositourile user-ului.
  function getRepos(){
    $curl = getCURL();
    curl_setopt($curl, CURLOPT_URL, 'https://api.github.com/users/' . $_SESSION['username'] . '/repos');
    
    if(!($resp = curl_exec($curl))){
      return NULL;
    }else{
      curl_close($curl);
      return json_decode($resp, true);
    }
  }

  // IN  : JSON cu repoul corespunzator
  // OUT : JSON cu limbajele folosite de user
  function getLanguages($repo){
    $curl = getCURL();

    $url = $repo['url'];
    curl_setopt($curl, CURLOPT_URL, $url);
    
    if(!($resp = curl_exec($curl))){
      return NULL;
    }else{
      $result = json_decode($resp, true);
      if(isset($result['parent'])){
        $nextURL = $result['parent']['languages_url'];
      }else{
        $nextURL = $result['languages_url'];
      }

      curl_setopt($curl, CURLOPT_URL, $nextURL);
      if(!($resp = curl_exec($curl))){
        return NULL;
      }else{
          curl_close($curl);
          return json_decode($resp, true);
      }
    } 
  }

  function getIssues($repo){
    
  }

  //IN  : JSON cu repoul corespunzator
  //OUT : JSON cu modificarile/commiturile user-ului in repoul dat ca si parametru
  function getStatistics($repo){
    $curl = getCURL();
    if(isset($repo['url'])){
      $nameOfRepo = explode("/", $repo['url'])[5];
    }
    
    curl_setopt($curl, CURLOPT_URL, 'https://api.github.com/repos/' . $_SESSION['username'] . '/' . $nameOfRepo . '/stats/contributors');
    
    if(!($resp = curl_exec($curl))){
      return NULL;
    }else{
      curl_close($curl);
      return json_decode($resp, true);
    }
  }

  function getUsername($email){
    $conn = db::getConnection();
    if ($stmt = $conn->prepare('SELECT username FROM users where mail = ?')) {
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $stmt->bind_result($rez);
      $stmt->fetch();
      $stmt->close(); 
    }
    else return 'Some db Error, try again';

    return $rez;
  }
?>