<?php

    session_start();
 
    // print_r($_POST);  //displays values passed in the form
    
    include 'dbConnection.php';
    $conn = getDatabaseConnection("mathCapstone");
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    
    // echo $password;
    
    // The following does not prevent SQL injection
    // $sql = "SELECT * 
    //         FROM admin
    //         WHERE username = '$username'
    //         AND   password = '$password'";
    
    // The following does prevent SQL injection     
    $sql = "SELECT * 
            FROM admin
            WHERE username = :username
            AND   password = :password";
            
    $np = array();
    $np[":username"] = $username;
    $np[":password"] = $password;
            
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    $record = $stmt->fetch(PDO::FETCH_ASSOC); // expecting one single record
    
    print_r($record);

    if (empty($record))
    {
        header("Location:logIn.php?msg=failed");
    } 
    else
    {
        echo $record['firstName'] . " " . $record['lastName'];
        $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];
        header("Location:admin.php");
        
    }

?>