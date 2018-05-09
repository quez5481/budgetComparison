<?php

    include 'dbConnection.php';
    
    $connection = getDatabaseConnection("mathCapstone");
    
    $sql = "DELETE FROM projectData WHERE id =  " . $_GET['id'];
    $statement = $connection->prepare($sql);
    $statement->execute();
    
    header("Location: admin.php?msg=deleted");
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <link href="styles.css"type="text/css" rel="stylesheet" />
    </head>
    <body>

    </body>
</html>