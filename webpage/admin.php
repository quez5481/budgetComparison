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
    
    function allData()
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
        
        <h1 id="test"></h1>
        
        <script>
    
            // $(document).ready(function()
            // {
            //     $.ajax({
            //         type: "GET",
            //         url: "api.php",
            //         dataType: "json",
            //         data: {},
            //         success: function(data,status) 
            //         {
            //             //alert(data.breed);
            //             //log.console(data.pictureURL);
                       
            //             $("#test").html("<h2>" + data.year +"</h2>");
            //             // $('#petInfo').html("");
            //             // $("#petInfo").append("Age: " + data.age + " years <br>");
            //             // $("#petInfo").append(data.breed + "<br>");
            //             // $("#petInfo").append(data.description + "<br>");
            //             // $("#petInfo").append("<img src='img/" + data.pictureURL +"' width='150'>");
            //         },
            //         complete: function(data,status) 
            //         { 
            //           //optional, used for debugging purposes
            //           //alert(status);
            //         }
            //     });//ajax
            // }); //document ready
            
            
        </script>
        
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