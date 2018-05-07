<?php

    session_start();
    
    if(!isset($_SESSION['adminName']))
    {
        header("Location:logIn.php");
    }
    
    if (isset($_GET["msg"]) && $_GET["msg"] == 'added') 
    {
        echo "<strong>Item successfully added in database.</strong><br><br>";
    }
    if (isset($_GET["msg"]) && $_GET["msg"] == 'updated') 
    {
        echo "<strong>Item successfully updated in database.</strong><br><br>";
    }
    if (isset($_GET["msg"]) && $_GET["msg"] == 'deleted') 
    {
        echo "<strong>Item successfully deleted in database.</strong><br><br>";
    }
    
    
    include 'dbConnection.php';
    
    $conn = getDatabaseConnection("mathCapstone");
    
    function display()
    {
        global $conn;
        
        $sql = "SELECT * FROM projectData";
                
                
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
        print_r($records);
        
        return $records;
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
        <link href="styles.css"type="text/css" rel="stylesheet" />
        
        <?php
            include 'style.php';
        ?>
        
        <script>
            function confirmDelete() 
            {
                return confirm("Are you sure you want to delete it?");
            }
        </script>
    </head>
    <body>
        <?php
            include 'header.php';
        ?>


        
        <h1> Admin Main Page </h1>
        
        <h3> Welcome <?=$_SESSION['adminName']?>! </h3>

        <br />
        
        <?php
            display();
        
        ?>
        
        <!--<form action="addProduct.php">-->
        <!--    <input type="submit" name="addproduct" value="Add Product"/>-->
        <!--</form>-->
        
        <form action="logout.php">
            <input type="submit" value="Logout"/>
        </form>
        
        <br /><br />
        
        <!--<strong> Products: </strong> <br />-->
        
        <?php 
        
            // $records=display();
            
            // foreach($records as $record)
            // {
            //     echo "<a href='updateProduct.php?productId=".$record['productId']."'>Update </a>";
            //     // echo "<a href='deleteProduct.php?productId=".$record['productId']."'>Delete </a>";
                
            //     echo "<form action='deleteProduct.php' onsubmit='return confirmDelete()'>";
            //     echo "<input type='hidden' name='productId' value= " . $record['productId'] . " />";
            //     echo "<input type='submit' value='Delete'>";
            //     echo "</form>";
                
            //     echo $record['productName'];
            //     echo '<br>';
            // }
            
        ?>
        <?php
            include 'footer.php';
        ?>
    </body>
</html>