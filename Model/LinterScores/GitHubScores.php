 <?php
   require_once('..\databaseConn.php');
    session_start();
    $GLOBALS['conn'] = db::getConnection();
    $_SESSION['username'] = "andreiarusoaie";
    ini_set('max_execution_time', 300);

    function findIteration()
    {
    	if ($stmt = $GLOBALS['conn']->prepare('SELECT max(iteration) FROM scores where username = ?')){
    	   	
            $stmt->bind_param("s", $_SESSION['username']);
    	    $stmt->execute();
			$stmt->bind_result($GLOBALS['iteration']);
		    $stmt->fetch();	
			$stmt->close();
			$GLOBALS['iteration'] = $GLOBALS['iteration'] + 1;
		}
		else return 'DB: Error at getting current iteration';
    }

    function getCURL()
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_USERAGENT => "Technical-Skill-Enhancer-App"
        ]);

        return $curl;
    }

    function getResponse($URL)
    {
        $curl = getCURL();
        curl_setopt($curl, CURLOPT_URL, $URL);

        if(!($resp = curl_exec($curl))){
            return NULL;
        }else{
            curl_close($curl);
                return $resp;
        }   
    }

    function lintFiles($URL, $java_lang, $python_lang)
    {
    if($java_lang == 1 or $python_lang == 1)
      {
      if($contents = getResponse($URL));
          $filesJson = json_Decode($contents, true);
        foreach($filesJson as $components)
        {
          if(isset($components['type']))
            if($components['type'] == "file")
            {
               $format = explode(".", $components['name']);
               if(sizeof($format) == 2)
              {
                if($format[1] == "py" and $python_lang == 1)
               {
                //echo "<br><h1>Fisierul: ".$components['name']."</h1><br>";
                $codeFile = getResponse($components['download_url']);
                //echo "\"".nl2br($codeFile)."\"".'<br><br>';

                $python_file = fopen("pythonfile.py", "w") or die("Unable to open python file..");
                
                fwrite($python_file, $codeFile);
                fclose($python_file);
                
                exec("pylint pythonfile.py", $result);
                //print_r($result[count($result)-2]);
                $score_line = explode(" ", $result[count($result)-2]);
                if($score_line[0] == "Your" and $score_line[1] == "code" and $score_line[2] == "has" and $score_line[3] == "been")
                    if ($stmt = $GLOBALS['conn']->prepare('INSERT INTO scores (iteration, username, filename, language, score) Values (?, ?, ?, ?, ?)')) {
    			         $score = explode("/", $score_line[6])[0];
    			         $language = "python";
		    	         $stmt->bind_param("isssd", $GLOBALS['iteration'], $_SESSION['username'], $components['name'], $language, $score);
		    	         $stmt->execute();
				         $stmt->close();
				    }
				else return 'DB error: at insert into scores (python)';
               }

                if($format[1] == "java" and $java_lang == 1)
                {
                	//echo "<br><h1>Fisierul: ".$components['name']."</h1><br>";
               		$codeFile = getResponse($components['download_url']);
                	//echo "\"".nl2br($codeFile)."\"".'<br><br>';
                    
                     $java_file = fopen("javafile.java", "w") or die("Unable to open java file..");
                     fwrite($java_file, $codeFile);
                     fclose($java_file);

                     exec("..\..\linters\javaPMDLinter\pmd-bin-6.15.0\bin\pmd -d javafile.java -f xml -R java-unusedcode,java-naming,java-coupling,java-basic > resultJava.xml");
                     $result_java = simplexml_load_file("resultJava.xml");

                    if(isset($result_java->file) and isset($result_java->file->violation))
                    {
                     $error_number = count($result_java->file->violation);
                     $java_score = 10 - $error_number/10;
                     //echo "Your java score is ".$java_score."/10<br>";
                     if ($stmt = $GLOBALS['conn']->prepare('INSERT INTO scores (iteration, username, filename, language, score) Values (?, ?, ?, ?, ?)')) {
    					$language = "java";
		    			$stmt->bind_param("isssd", $GLOBALS['iteration'], $_SESSION['username'], $components['name'], $language, $java_score);
		    			$stmt->execute();
						$stmt->close();
						}
					 else return 'DB error: at insert into scores (java)';
                    }
                    else
                     return "invalid input for linter (syntax problem)";
                }
			  }
            }
          if(isset($components['type']) )
            if($components['type'] == 'dir')
                if(isset($components['url']))
                    lintFiles($components['url'], $java_lang, $python_lang);
        }
      }
    }

     function searchComponents($URL, $java_lang, $python_lang)
     {
        findIteration(); //gaseste iteratia curenta pentru utilizatorul curent
        $resp = getResponse($URL);
        $json = json_decode($resp, true);
        if(isset($json['repos_url']))
        {
         if($json['repos_url'] != "")
         {
         $repos = getResponse($json['repos_url']);
         $reposJson = json_decode($repos, true);
         foreach($reposJson as $repos)
         lintFiles($repos['url'].'/contents/', $java_lang, $python_lang);
         }
        }
        //else
         //echo "Rate limit again...";
     }

    //$java_lang = 1;                           // 0 pentru a ignora fisierele java
    //$python_lang = 1;                         // 0 pentru a ignora fisierele python
    //searchComponents("https://api.github.com/users/".$_SESSION['username'], $java_lang, $python_lang);           // asa se apeleaza