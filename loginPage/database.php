<?php
    //remake kung d sa balay i open
    $db_server = "localhost";
    $db_user = "root";
    $db_password = "2311600032Ed";
    $db_name = "ebookdb";
    $conn = "";
    try{
        // Argument is server host name, username, password, db name 
        $conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);
    }
    catch(mysqli_sql_exception){
        echo"Cant connect";
    }
    
?>