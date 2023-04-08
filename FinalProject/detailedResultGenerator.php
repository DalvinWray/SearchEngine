<?php


    class DetailedResultGenerator{
        

        protected function setDbConnection(){

            global $connection;
            
            define("servername","localhost");
            define ("database", "SearchEngineDB");
            define ("user","root");
            define ("password","");

            $connection=mysqli_connect(servername,user,password,database);

            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }
        }

        
        protected function detailedAnimeResult(){
            
            #searches the session variable with all of the anime name for the one matching the name of the anime the user clicked
            for($i=0;$i<sizeof($_SESSION['animeNameArray']);$i++ ){
                
                $animeDataPost=$_SESSION['animeNameArray'][$i];
                
                #POST from the resultGenerator.php file which is the file containing the functions for the result.php file
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["$animeDataPost"])){
                    
                    global $connection;
                    
                    
                    #the name of the anime which is the primary key for the Anime table is converted back to how it exists in the database
                    #Note: it was converted to snake case in the resultGenerator.php file so that the POST super global variable could use it
                    $animeDataPost= str_replace("_", " ", "$animeDataPost");

                    #all the columns from the Anime Table is selected and the anime name will return the row that matches it.
                    #as stated previously the primary key is utilized to avoid duplicate values
                    $animeTableQuery="SELECT AnimeName,YearCreated,NumberofEpisodes,AnimeDescription,AnimeCreatorFirstName,AnimeCreatorLastName 
                    FROM Anime where AnimeName='$animeDataPost'";
                    $runAnimeTableQuery=mysqli_query ($connection, $animeTableQuery);
                    $animeRowNumber=mysqli_num_rows($runAnimeTableQuery);

                    #Despite the usage of the primary key a second fail safe is utilized to ensure that only one row of Data is displayed to the user
                    #by ensuring that the number of rows from the search will be one
                    if ($animeRowNumber==1){
                        #Data is displayed to the user
                        while($row = mysqli_fetch_assoc($runAnimeTableQuery)) {
                            echo
                                "<div class='detailResult'>".
                                    "<h2 class='name'>".
                                        $row['AnimeName'].
                                    "</h2>".
                                    
                                    "<h3>".
                                        "Created By: ". $row['AnimeCreatorFirstName']. " ".$row['AnimeCreatorLastName'].
                                    "</h3>".
                                    
                                    "<h3>".
                                        "Created In: ". $row['YearCreated']. 
                                    "</h3>".
                                    
                                    "<h3>".
                                        "Number of Episodes: ". $row['NumberofEpisodes']. 
                                    "</h3>".
                                    
                                    "<h3 class='descriptionTitle'>".
                                        "Anime Description".
                                    "</h3>".
                                    
                                    "<p class='descriptionDetails'>".
                                        $row['AnimeDescription']. 
                                    "</p>".


                                "</div>";
                        }

                    }
                    


                    break;
                }
                
            }
        }

        #kindly refer to the comments in the detailedAnimeResult() function above for details on the functions below

        protected function detailedPetResult(){
            for($i=0;$i<sizeof($_SESSION['petNameArray']);$i++ ){
                $petDataPost=$_SESSION['petNameArray'][$i];
                
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["$petDataPost"])){
                    
                    
                    global $connection;
                    
                    

                    $petTableQuery="SELECT PetName, PetSpecies, PetYOB,PetDescription FROM Pets where PetName='$petDataPost'";
                    $runPetTableQuery=mysqli_query ($connection, $petTableQuery);
                    $petRowNumber=mysqli_num_rows($runPetTableQuery);

                    if ($petRowNumber==1){
                        while($row = mysqli_fetch_assoc($runPetTableQuery)) {
                            echo
                                "<div class='detailResult'>".
                                    "<h2 class='name'>".
                                        $row['PetName'].
                                    "</h2>".
                                    
                                    "<h3>".
                                        "Pet Species: ". $row['PetSpecies'].
                                    "</h3>".
                                    
                                    "<h3>".
                                        "Year of Birth: ". $row['PetYOB']. 
                                    "</h3>".
                                    
                                    
                                    "<h3 class='descriptionTitle'>".
                                        "Pet Description".
                                    "</h3>".
                                    
                                    "<p class='descriptionDetails'>".
                                        $row['PetDescription']. 
                                    "</p>".


                                "</div>";
                        }

                    }
                    


                    break;
                }
                
            }
        }


        protected function detailedCourseResult(){
            for($i=0;$i<sizeof($_SESSION['courseCodeArray']);$i++ ){
                $courseDataPost=$_SESSION['courseCodeArray'][$i];
                
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["$courseDataPost"])){
                    
                    global $connection;
                    
                    

                    $courseTableQuery="SELECT CourseCode,CourseName,Semester,CourseDescription FROM Courses where CourseCode='$courseDataPost'";
                    $runCourseTableQuery=mysqli_query ($connection, $courseTableQuery);
                    $courseRowNumber=mysqli_num_rows($runCourseTableQuery);

                    if ($courseRowNumber==1){
                        while($row = mysqli_fetch_assoc($runCourseTableQuery)) {
                            echo
                                "<div class='detailResult'>".
                                    "<h2 class='name'>".
                                        $row['CourseCode'].
                                    "</h2>".
                                    
                                    "<h3>".
                                        "Course Name: ". $row['CourseName'].
                                    "</h3>".
                                    
                                    "<h3>".
                                        "Semester: ". $row['Semester']. 
                                    "</h3>".
                                    
                                    
                                    "<h3 class='descriptionTitle'>".
                                        "Course Description".
                                    "</h3>".
                                    
                                    "<p class='descriptionDetails'>".
                                        $row['CourseDescription']. 
                                    "</p>".


                                "</div>";
                        }

                    }
                    


                    break;
                }
                
            }
        }


        protected function detailedMovieResult(){
            
            for($i=0;$i<sizeof($_SESSION['movieNameArray']);$i++ ){
                
                $movieDataPost=$_SESSION['movieNameArray'][$i];
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["$movieDataPost"])){
                    
                    global $connection;
                    
                    $movieDataPost= str_replace("_", " ", "$movieDataPost");

                    $movieTableQuery="SELECT MovieName, MainGenre,YearCreated, MovieDescription FROM Movies where MovieName='$movieDataPost'";
                    $runMovieTableQuery=mysqli_query ($connection, $movieTableQuery);
                    $movieRowNumber=mysqli_num_rows($runMovieTableQuery);

                    if ($movieRowNumber==1){
                        
                        while($row = mysqli_fetch_assoc($runMovieTableQuery)) {
                            echo
                                "<div class='detailResult'>".
                                    "<h2 class='name'>".
                                        $row['MovieName'].
                                    "</h2>".
                                    
                                    "<h3>".
                                        "Main Genre: ". $row['MainGenre'].
                                    "</h3>".
                                    
                                    "<h3>".
                                        "Year Created: ". $row['YearCreated']. 
                                    "</h3>".
                                    
                                    
                                    "<h3 class='descriptionTitle'>".
                                        "Movie Description".
                                    "</h3>".
                                    
                                    "<p class='descriptionDetails'>".
                                        $row['MovieDescription']. 
                                    "</p>".


                                "</div>";
                        }

                    }
                    


                    break;
                }
                
            }
        }




    }

?>