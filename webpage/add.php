<?php
    
    
    session_start();
    if(!isset( $_SESSION['adminName']))
    {
      header("Location:index.php");
    }
    
    include "dbConnection.php";
    $conn = getDatabaseConnection("mathCapstone");
    
    
    if(isset($_GET['submitRecord']))
    {
        $id = $_GET['id'];
        $year = $_GET['year'];
        $student = $_GET['student'];
        $inmate = $_GET['inmate'];
        $budget_educ_ca = $_GET['budget_educ_ca'];
        $budget_educ_ca_fed = $_GET['budget_educ_ca_fed'];
        $budget_cor_ca = $_GET['budget_cor_ca'];
        $budget_cor_ca_fed = $_GET['budget_cor_ca_fed'];
        
        $sql = "INSERT INTO projectData
                ( `id`, `year`, `student`, `inmate`, `budget_educ_ca`, `budget_educ_ca_fed`, `budget_cor_ca`, `budget_cor_ca_fed') 
                 VALUES ( :id, :year, :student, :inmate, :budget_educ_ca, :budget_educ_ca_fed, :budget_cor_ca, :budget_cor_ca_fed)";
        
        $namedParameters = array();
        $namedParameters[':id'] = $id;
        $namedParameters[':year'] = $year;
        $namedParameters[':student'] = $student;
        $namedParameters[':inmate'] = $inmate;
        $namedParameters[':budget_educ_ca'] = $budget_educ_ca;
        $namedParameters[':budget_cor_ca_fed'] = $budget_educ_ca_fed;
        $namedParameters[':budget_cor_ca'] = $budget_cor_ca;
        $namedParameters[':budget_cor_ca_fed'] = $budget_cor_ca_fed;
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        header("Location:admin.php?msg=added");
        
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Add a Record</title>
        <?php
            include 'scripts.php';
            include 'style.php';
        ?>
    </head>
    <body>
        <?php
            include 'header.php';
        ?>
        <h1>Add a Record</h1>
        <form>
            id:
                <input type="text" name="id"><br>
            Year(Format: "x-x+1"):
                <input type="text" name="year"><br>
            Student Count:
                <input type="text" name="student"><br>
            Inmate Count:
                <input type="text" name="inmate"><br>
            Education Budget CA:
                <input type="text" name="budget_educ_ca"><br>
            Education Budget CA & Fed:
                <input type="text" name="budget_educ_ca_fed"><br>
            Corrections Budget CA:
                <input type="text" name="budget_cor_ca"><br>
            Corrections Budget CA & Fed:
                <input type="text" name="budget_cor_ca_fed"><br>
                
            <input type="submit" name="submitRecord" value="Add a Record"><br>
        </form>
        
        
        <?php
            include 'footer.php';
        ?>

    </body>
</html>