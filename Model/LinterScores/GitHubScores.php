 <?php
    ini_set('max_execution_time', 300);
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
                echo "<br><h1>Fisierul: ".$components['name']."</h1><br>";
                $codeFile = getResponse($components['download_url']);
                //echo "\"".nl2br($codeFile)."\"".'<br><br>';

                $python_file = fopen("pythonfile.py", "w") or die("Unable to open python file..");
                
                fwrite($python_file, $codeFile);
                fclose($python_file);
                
                exec("pylint pythonfile.py", $result);
                print_r($result[count($result)-2]);
                }

                if($format[1] == 'java' and $java_lang == 1)
                {
                	echo "<br><h1>Fisierul: ".$components['name']."</h1><br>";
               		$codeFile = getResponse($components['download_url']);
                	//echo "\"".nl2br($codeFile)."\"".'<br><br>';
                    
                     $java_file = fopen("javafile.java", "w") or die("Unable to open python file..");
                     fwrite($java_file, $codeFile);
                     fclose($java_file);

                     exec("..\..\linters\javaPMDLinter\pmd-bin-6.15.0\bin\pmd -d javafile.java -f xml -R java-unusedcode,java-naming,java-coupling,java-basic > resultJava.xml");
                     $result_java = simplexml_load_file("resultJava.xml");
                     if(isset($result_java->file) and isset($result_java->file->violation))
                     {
                     $error_number = count($result_java->file->violation);
                     $java_score = 10 - $error_number/10;
                     echo "Your java score is ".$java_score."/10<br>";
                     }
                     else
                     echo "invalid input for linter (syntax problem)";
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
        else
         echo "Rate limit again...";
    }

    $java_lang = 1; // 0 pentru a ignora fisierele java
    $python_lang = 1; // 0 pentru a ignora fisierele python
    searchComponents("https://api.github.com/users/andreiarusoaie", $java_lang, $python_lang);