<?php

    session_start();
 
    // print_r($_POST);  //displays values passed in the form
    
    include 'dbConnection.php';
    $conn = getDatabaseConnection("mathCapstone");
    $email = $_POST['email'];
    
    
    // echo $password;
    
    // The following does not prevent SQL injection
    // $sql = "SELECT * 
    //         FROM admin
    //         WHERE username = '$username'
    //         AND   password = '$password'";
    
    // The following does prevent SQL injection     
    $sql = "INSERT INTO subscriber
            (`email`) VALUES (:email)";
            
    $np = array();
    $np[":email"] = $email;
    
            
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    $record = $stmt->fetch(PDO::FETCH_ASSOC); // expecting one single record
    
    print_r($record);

    if (empty($record))
    {
        header("Location:.php?msg=failed");
    } 
    else
    {
        header("Location:logIn.php?msg=failed");
        
    }

?>