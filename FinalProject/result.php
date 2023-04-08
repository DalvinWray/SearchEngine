<?php
    #Functions  that search the database based on the user input is located in this file
    include_once "resultGenerator.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=rr, initial-scale=1.0">
    <title>Result Page</title>
    <link rel='stylesheet' href="resultPageStyles.css">
</head>

<body>
    <header id="head">
        <div id="headerContainer">
            <a href='index.html'><img id="wolfResultLogoLeft" src="images/wolf.png" width="35px" height="35px"/></a>
            <h1 id="resultTitle">
                <span class="yellow">Dalvin's</span> <span class="white">Search</span> <span class="yellow">Engine</span> <span class="white">Results</span> <span class="yellow">Page</span> 
            </h1>
            <a href='index.html'><img id="wolfResultLogoRight" src="images/wolf.png" width="35px" height="35px"/></a>
        </div>
    </header>
    
    <div id="resultArea">
        
        <?php

            class Result extends ResultGenerator{

                function executeResult(){
                    
                    
                    #Executes the functions to search the database and also establish a connection to the database, 
                    #these functions can be found in the resultGenerator.php file 
                    
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["searchButton"])){
                        session_start();
                        parent::setDbConnection();
                        parent::searchAnimeTable();
                        parent::searchPetTable();
                        parent::searchCourseTable();
                        parent::searchMovieTable();
                        
                    }
                    
                    #The total results from all the searches in the database is calculated then displayed to the user
                    $totalResult = parent::totalResult();
                    
                    echo "<p id='resultTotal'>The Total Results From Your Search is: $totalResult </p>";

                    #If the Total Result is zero a clickable error message will be displayed to bring the user back to the search page
                    if ($totalResult==0){
                        echo "<a href='index.html'> No Result Is Currently Available For Your Search. Click Here To Return To The Search Page</a>";
                    }
                }
            
            }

            $result= new Result();
            
            $result->executeResult();
            
        ?>
    </div>
    
</body>
</html>