<?php

    include 'dbConnection.php';
    $conn = getDatabaseConnection("mathCapstone");

    function getInfo()
    {
        global $conn;
        
        $sql = "SELECT * FROM projectData WHERE id = "  .  $_GET['id'];

        // echo $_GET["id"];
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $record;
    }
    
    if (isset($_GET['submitData'])) 
    {
        
        $sql = "UPDATE projectData
                SET student = :student, 
                    inmate = :inmate, 
                    budget_educ_ca = :budget_educ_ca, 
                    budget_educ_ca_fed = :budget_educ_ca_fed, 
                    budget_cor_ca = :budget_cor_ca,
                    budget_cor_ca_fed = :budget_cor_ca_fed
                    WHERE id = :id";
                
        $np = array();
        $np[":student"] = $_GET['student'];
        $np[":inmate"] = $_GET['inmate'];
        $np[":budget_educ_ca"] = $_GET['budget_educ_ca'];
        $np[":budget_educ_ca_fed"] = $_GET['budget_educ_ca_fed'];
        $np[":budget_cor_ca"] = $_GET['budget_cor_ca'];
        $np[":budget_cor_ca_fed"] = $_GET['budget_cor_ca_fed'];
        $np[":id"] = $_GET['id']; 
        
        $statement = $conn->prepare($sql);
        $statement->execute($np); 
        
        header("Location:admin.php?msg=updated");
    }
    
    if(isset($_GET['id']))
    {
        $data = getInfo();
    }
    // print_r($data);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update a Record</title>
        <?php
            include 'scripts.php';
            include 'style.php';
        ?>
    </head>
    <body>
        <?php
            include 'header.php';
        ?>
        <h1>Update Record</h1>
        <h3> Updating record for <?=$data['year']?> </h3>
        <h5>Please enter budget values in thousands(US dollars)</h5>
        <div class="container update">
            <form>
                <input type="hidden" name="id" value= "<?=$data['id']?>"/>
                Student Count:
                    <input type="text" value="<?=$data['student']?>" name="student"><br>
                Inmate Count:
                    <br><input type="text" value="<?=$data['inmate']?>" name="inmate"><br>
                Education Budget CA:
                    <input type="text" value="<?=$data['budget_educ_ca']?>" name="budget_educ_ca"><br>
                Education Budget CA & Fed:
                    <input type="text" value="<?=$data['budget_educ_ca_fed']?>" name="budget_educ_ca_fed"><br>
                Corrections Budget CA:
                    <input type="text" value="<?=$data['budget_cor_ca']?>" name="budget_cor_ca"><br>
                Corrections Budget CA & Fed:
                    <input type="text" value="<?=$data['budget_cor_ca_fed']?>" name="budget_cor_ca_fed"><br><br>
                
                <input type="submit" name="submitData" value="Update Record"><br>
            </form>
            
        </div>
        
        
        <?php
            include 'footer.php';
        ?>
    </body>
</html>