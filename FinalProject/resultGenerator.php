<?php

class ResultGenerator{
    
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
        

    protected function searchAnimeTable(){

        #what ever the user inputs in the search bar is stored in the searchBar variable
        $searchBar=$_POST["searchBar"];
        
        
        
        global $connection,$animeRowNumber; 
        
        #Query that will search the Anime table for results similar to the user's input 
        #Kindly note the use of wildcards for some of the columns, this is because it will search for similarities in some columns
        #and not just the exact thing the user searches for incase the user only remembers a section or part of what they are looking for
        
        
        $searchAnimeTableQuery="SELECT AnimeName, YearCreated,AnimeCreatorFirstName, AnimeCreatorLastName FROM Anime 
        WHERE AnimeName LIKE '%$searchBar%' 
        OR AnimeDescription LIKE '%$searchBar%' OR AnimeCreatorFirstName = '$searchBar'
        OR AnimeCreatorLastName = '$searchBar' ";

        $runSearchAnimeTableQuery=mysqli_query ($connection, $searchAnimeTableQuery);
        $animeRowNumber=mysqli_num_rows($runSearchAnimeTableQuery); 
        
        #If there is atleast one match to the user's search then all the results will be displayed to the user
        if ($animeRowNumber>0){
            $animeNameArray=[];
            
            while($row = mysqli_fetch_assoc($runSearchAnimeTableQuery)) {

                
                $nameOfLink=$row['AnimeName'];
                
                #The primary key which is the name of the anime is converted to snake case
                #this is because it will be sent to the detailResult.php file via POST and the spaces
                #that are in some of the anime names will cause problems in the code.
                $convertedStringToSnakeCase=str_replace(" ", "_", "$nameOfLink");

                #each anime name converted will be pushed to the animeNameArray for the reason stated above
                array_push($animeNameArray,$convertedStringToSnakeCase);
                
                #For every anime matching the search the: Anime name , Creators first and last name and also the year the anime was created 
                #will be displayed to the user, When the user clicks on the anime they are looking for they will be sent to a page
                #with all the deatils of that anime
                echo 
                    "<div class='result'>".

                        "<form action='detailedResult.php' method='post'>".
                            #A hidden input type is used to describe which table in the database the detailedResult.php will need to search
                            #To show all the details of whatever the user clicks on
                            "<input type='hidden' name='anime'>".
                            
                            #A button containing the anime name that when clicked will send the user to view the full deatils of what they clicked on 
                            #on the detailedResult.php page
                            "<input class='name' type='submit'  name='$convertedStringToSnakeCase' value='$nameOfLink'>".     
                        "</form>".
                        
                        "<p class='minorDetails'>".
                            "Created By:".$row["AnimeCreatorFirstName"]. " ".$row["AnimeCreatorLastName"] .
                            "<br/>".
                            "Anime Created In: " .$row["YearCreated"].
                        "</p>".
                    "</div>";
                
            }
            
            #after the while loop finish iterating the animeNameArray varaible will be stored in a session variable of a similar name 
            #for further usage in the detailedResult.php file
            $_SESSION['animeNameArray']=$animeNameArray;
        }
        
    }

    #Kindly refer to the comments in the searchAnimeTable() function for a better understanding of the  following functions below
    
    
    
    protected function searchPetTable(){
        
        
        $searchBar=$_POST["searchBar"];

        global $connection,$petRowNumber;
        
        $searchPetTableQuery="SELECT PetName, PetSpecies, PetYOB,PetDescription FROM Pets WHERE PetName LIKE '%$searchBar%' 
        OR PetSpecies LIKE '%$searchBar%' OR PetYOB = '$searchBar'
        OR PetDescription LIKE '%$searchBar%' ";

        $runSearchPetTableQuery=mysqli_query ($connection, $searchPetTableQuery);
        $petRowNumber=mysqli_num_rows($runSearchPetTableQuery); 
        
        if ($petRowNumber>0){
            $petNameArray=[];
            while($row = mysqli_fetch_assoc($runSearchPetTableQuery)) {
                $nameOfPet=$row['PetName'];
                array_push($petNameArray,$nameOfPet);

                echo 
                    "<div class='result'>".
    
                        "<form action='detailedResult.php' method='post'>".
                            "<input type='hidden' name='pet'>".
                            "<input class='name' type='submit' name='$nameOfPet' value='$nameOfPet'>".        
                        "</form>".
                        
                        "<p class='minorDetails'>".
                            "Pet Species:".$row["PetSpecies"].
                            "<br/>".
                            "Pet Born In: ".$row["PetYOB"].
                        "</p>".
                    "</div>";
                
            }

            $_SESSION['petNameArray']=$petNameArray;
        }        
    }
    
    
    protected function searchCourseTable(){

        
        $searchBar=$_POST["searchBar"];

        global $connection,$courseRowNumber;
        
        $searchCourseTableQuery="SELECT CourseCode,CourseName,Semester FROM Courses WHERE CourseCode LIKE '%$searchBar%' 
        OR CourseName LIKE '%$searchBar%' OR Semester LIKE '%$searchBar%' ";
        $runSearchCourseTableQuery=mysqli_query ($connection, $searchCourseTableQuery);
        $courseRowNumber=mysqli_num_rows($runSearchCourseTableQuery); 

        if ($courseRowNumber>0){
            $courseCodeArray=[];
            while($row = mysqli_fetch_assoc($runSearchCourseTableQuery)) {
                $courseCode=$row['CourseCode'];
                array_push($courseCodeArray,$courseCode);

                echo 
                    "<div class='result'>".
    
                        "<form action='detailedResult.php' method='post'>".
                            "<input type='hidden' name='course'>".
                            "<input class='name' type='submit' name='$courseCode' value='$courseCode'>".        
                        "</form>".
                        
                        "<p class='minorDetails'>".
                            "Course Name:".$row["CourseName"].
                            "<br/>".
                            "Semester: ".$row["Semester"].
                        "</p>".
                    "</div>";
                
            }

            $_SESSION['courseCodeArray']=$courseCodeArray;
        }        
    }


    protected function searchMovieTable(){
        
        
        $searchBar=$_POST["searchBar"];
        
        global $connection,$movieRowNumber;
        
        $searchMovieTableQuery="SELECT MovieName, MainGenre,YearCreated FROM Movies WHERE MovieName LIKE '%$searchBar%' 
        OR MainGenre LIKE '%$searchBar%' OR YearCreated = '%$searchBar%' ";
        $runSearchMovieTableQuery=mysqli_query ($connection, $searchMovieTableQuery);
        $movieRowNumber=mysqli_num_rows($runSearchMovieTableQuery); 

        if ($movieRowNumber>0){
            $movieNameArray=[];
            
            while($row = mysqli_fetch_assoc($runSearchMovieTableQuery)) {
                $movieName=$row['MovieName'];
                $convertedStringToSnakeCase=str_replace(" ", "_", "$movieName");
                array_push($movieNameArray,$convertedStringToSnakeCase);

                echo 
                    "<div class='result'>".
    
                        "<form action='detailedResult.php' method='post'>".
                            "<input type='hidden' name='movie'>".
                            "<input class='name' type='submit' name='$convertedStringToSnakeCase' value='$movieName'>".        
                        "</form>".
                        
                        "<p class='minorDetails'>".
                            "Main Genre: ".$row["MainGenre"].
                            "<br/>".
                            "Year Created: ".$row["YearCreated"].
                        "</p>".
                    "</div>";
                
            }

            $_SESSION['movieNameArray']=$movieNameArray;
        }        
    }

    protected function totalResult(){
        global $animeRowNumber,  $petRowNumber,  $courseRowNumber,  $movieRowNumber;
        return  $animeRowNumber + $petRowNumber + $courseRowNumber + $movieRowNumber;
    }
    




    
}


?>