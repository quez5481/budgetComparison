<?php

    include 'dbConnection.php';

    $conn = getDatabaseConnection('mathCapstone');
      
    $sql = "SELECT id, year, student, 
                   inmate, budget_educ_ca, 
                   budget_educ_ca_fed, 
                   budget_cor_ca,
                   budget_cor_ca_fed
                   FROM projectData WHERE id = :id";
      
    $stmt = $conn->prepare($sql);  
    $stmt->execute(array(":id"=>$_GET['id']));
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    // print_r($record);  
    
    echo json_encode($record);
?>