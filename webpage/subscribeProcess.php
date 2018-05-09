<?php

    session_start();
 
    // print_r($_POST);  //displays values passed in the form
    
    include 'dbConnection.php';
    $conn = getDatabaseConnection("mathCapstone");
    
    $email = $_POST['email'];

    // The following does prevent SQL injection     
    $sql = "INSERT INTO subscriber
            (`email`) VALUES (:email)";
            
    $np = array();
    $np[":email"] = $email;
    
            
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    
    header("Location:homePage.php?msg=userAdded");



?>