 <?php
    require_once('databaseConn.php');
    session_start();
    $GLOBALS['conn'] = db::getConnection();
    //$_SESSION['username'] = "andreiarusoaie";
    

    function calculateStats()
    {
        $language = "java";

        if ($stmt = $GLOBALS['conn']->prepare('SELECT max(iteration) FROM scores where username = ? and language = ?'))
        {    
            $stmt->bind_param("ss", $_SESSION['username'], $language);
            $stmt->execute();
            $stmt->bind_result($iteration);
            $stmt->fetch(); 
            $stmt->close();
        }
        else return 'DB: Error at getting current iteration'; //verificam numarul maxim de iterari facute pentru acelasi username
        

        for($i = 1; $i <= $iteration; $i++)
        {
            if ($stmt = $GLOBALS['conn']->prepare('SELECT count(*) FROM userstats where username = ? and iteration = ? and language = ?'))
            {
                $stmt->bind_param("sis", $_SESSION['username'], $i, $language);
                $stmt->execute();
                $stmt->bind_result($count_line);
                $stmt->fetch(); 
                $stmt->close();
            } 
            else return 'DB: Error at getting count line';
            
            if($count_line == 0) //verificam daca nu exista deja in userstats
            {
                if ($stmt = $GLOBALS['conn']->prepare('SELECT avg(score) FROM scores where username = ? and iteration = ? and language = ?'))
                {
                    $stmt->bind_param("sis", $_SESSION['username'], $i, $language);
                    $stmt->execute();
                    $stmt->bind_result($score_average); //punem in score_coverage media scorurilor de la iteratia $i
                    $stmt->fetch(); 
                    $stmt->close();
                }
                else return 'DB: Error at getting avg at iteration '.$i;

                if($score_average <= 2.5)
                    $level = "incepator";
                if($score_average > 2.5 and $score_average <= 5)
                    $level = "mediu";
                if($score_average > 5 and $score_average <= 7.5)
                    $level = "avansat";
                if($score_average > 7.5)
                    $level = "experimentat"; //asignam nivelul corespunzator utilizatorului

                if($i > 1) //daca nu este prima iteratie
                {
                  if ($stmt = $GLOBALS['conn']->prepare('SELECT scoreAvg FROM userStats where username = ? and iteration = ? and language = ?'))
                  {
                    $prev_iteration = $i - 1; //alegem media de la iteratia anterioara
                    $stmt->bind_param("sis", $_SESSION['username'], $prev_iteration, $language);
                    $stmt->execute();
                    $stmt->bind_result($past_score_average); //punem media anterioara in $past_score_average
                    $stmt->fetch(); 
                    $stmt->close();
                    $evolution = $score_average - $past_score_average;
                  }
                  else return 'DB: Error at getting stats at iteration '.$i;
                }
                else
                    $evolution = 0; //daca e prima iteratie atunci nu avem cum sa vedem vreo evolutie

                if ($stmt = $GLOBALS['conn']->prepare('INSERT INTO userstats (username, iteration, language, scoreAvg, level, evolution) Values (?, ?, ?, ?, ?, ?)')) 
                {
                    $stmt->bind_param("sisdsd", $_SESSION['username'], $i, $language, $score_average, $level, $evolution);
                    $stmt->execute();
                    $stmt->close();
                }
                else return 'DB error: at insert userstats (java)';
            }
        }

        $language = "python";

        if ($stmt = $GLOBALS['conn']->prepare('SELECT max(iteration) FROM scores where username = ? and language = ?'))
        {    
            $stmt->bind_param("ss", $_SESSION['username'], $language);
            $stmt->execute();
            $stmt->bind_result($iteration);
            $stmt->fetch(); 
            $stmt->close();
        }
        else return 'DB: Error at getting current iteration'; //verificam numarul maxim de iterari facute pentru acelasi username
        

        for($i = 1; $i <= $iteration; $i++)
        {
            if ($stmt = $GLOBALS['conn']->prepare('SELECT count(*) FROM userstats where username = ? and iteration = ? and language = ?'))
            {
                $stmt->bind_param("sis", $_SESSION['username'], $i, $language);
                $stmt->execute();
                $stmt->bind_result($count_line);
                $stmt->fetch(); 
                $stmt->close();
            } 
            else return 'DB: Error at getting count line';
            
            if($count_line == 0) //verificam daca nu exista deja in userstats
            {
                if ($stmt = $GLOBALS['conn']->prepare('SELECT avg(score) FROM scores where username = ? and iteration = ? and language = ?'))
                {
                    $stmt->bind_param("sis", $_SESSION['username'], $i, $language);
                    $stmt->execute();
                    $stmt->bind_result($score_average); //punem in score_coverage media scorurilor de la iteratia $i
                    $stmt->fetch(); 
                    $stmt->close();
                }
                else return 'DB: Error at getting avg at iteration '.$i;

                if($score_average <= 2.5)
                    $level = "incepator";
                if($score_average > 2.5 and $score_average <= 5)
                    $level = "mediu";
                if($score_average > 5 and $score_average <= 7.5)
                    $level = "avansat";
                if($score_average > 7.5)
                    $level = "experimentat"; //asignam nivelul corespunzator utilizatorului

                if($i > 1) //daca nu este prima iteratie
                {
                  if ($stmt = $GLOBALS['conn']->prepare('SELECT scoreAvg FROM userStats where username = ? and iteration = ? and language = ?'))
                  {
                    $prev_iteration = $i - 1; //alegem media de la iteratia anterioara
                    $stmt->bind_param("sis", $_SESSION['username'], $prev_iteration, $language);
                    $stmt->execute();
                    $stmt->bind_result($past_score_average); //punem media anterioara in $past_score_average
                    $stmt->fetch(); 
                    $stmt->close();
                    $evolution = $score_average - $past_score_average;
                  }
                  else return 'DB: Error at getting stats at iteration '.$i;
                }
                else
                    $evolution = 0; //daca e prima iteratie atunci nu avem cum sa vedem vreo evolutie

                if ($stmt = $GLOBALS['conn']->prepare('INSERT INTO userstats (username, iteration, language, scoreAvg, level, evolution) Values (?, ?, ?, ?, ?, ?)')) 
                {
                    $stmt->bind_param("sisdsd", $_SESSION['username'], $i, $language, $score_average, $level, $evolution);
                    $stmt->execute();
                    $stmt->close();
                }
                else return 'DB error: at insert userstats (java)';
            }
        }

        return "true";
    }


    /*if(calculateStats() == "true")                //se apeleaza cu calculateStats(); daca returneaza true atunci merge ok, altfel returneaza 
        echo "Succes";                              // sursa erorii
    else
        echo "This function is a failure...";
        */ 