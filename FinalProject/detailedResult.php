<?php
    #Contains the functions that will be utilized to search for the exact details of what ever the user selects
    include_once "detailedResultGenerator.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href="detailedResultPageStyles.css">
</head>
<body>
    
    <header id="head">
        <div id="headerContainer">
            <a href='index.html'><img id="wolfResultLogoLeft" src="images/wolf.png" width="35px" height="35px"/></a>
            <h1 id="resultTitle">
                <span class="yellow">Dalvin's</span> <span class="white">Search</span> <span class="yellow">Engine</span> <span class="white">Detailed</span> <span class="yellow">Result</span> <span class="white">Page</span>
            </h1>
            <a href='index.html'><img id="wolfResultLogoRight" src="images/wolf.png" width="35px" height="35px"/></a>
        </div>
    </header>

    <div id="detailedResultArea">
       
        <?php
            class DetailedResult extends DetailedResultGenerator{
                
                function executeDetailedResult(){
                    session_start();
                    parent::setDbConnection();
                    
                    #The hidden input type nested in the respective forms in the resultGenerator.php file which contains all functions utilized
                    #by the result.php file
                    #is utilized to distinguish which table needs to be searched for the full details of what ever is displayed
                    #to the user

                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['anime'])){
                        parent::detailedAnimeResult();
                    }
                
                    else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pet'])){
                        parent::detailedPetResult(); 
                    }  

                    else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['course'])){
                        parent::detailedCourseResult(); 
                    }    
                    
                    else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['movie'])){
                        
                        parent::detailedMovieResult(); 
                    } 
                }
            }   
            
            $detailedResult= new DetailedResult();
            
            $detailedResult->executeDetailedResult();
        ?>     

    </div>


</body>
</html>