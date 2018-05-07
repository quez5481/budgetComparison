<?php

    include 'dbConnection.php';

    $conn = getDatabaseConnection('mathCapstone');
      
    $sql = "SELECT * FROM projectData";
      
    $stmt = $conn->prepare($sql);  
    $stmt->execute();
    $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // print_r($record);  
    
    echo json_encode($record);
?>