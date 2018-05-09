<?php

    include 'dbConnection.php';
    
    $conn = getDatabaseConnection("mathCapstone");
    
    function report()
    {
        global $conn;
    
        if (isset($_GET['report'])) 
        {
            
	        if(isset($_GET['r']))
            {
                if($_GET['r'] == "AVG")
                {
                    $sql = "SELECT AVG(";
                }
                else  if($_GET['r'] == "MAX")
                {
                    $sql = "SELECT MAX(";
                }
                else
                {
                    $sql = "SELECT MIN(";
                }
            }
            if(isset($_GET['q']))
            {
                if($_GET['q'] == "'student'")
                {
                    $sql .= "student";
                }
                else if($_GET['q'] == "'inmate'")
                {
                    $sql .= "inmate";
                }
                else if($_GET['q'] == "budgetTotalE")
                {
                    $sql .= "budget_educ_ca_fed";
                }
                else
                {
                    $sql .= "budget_cor_ca_fed";
                }
            }
            $sql .= ") FROM projectData";
        } 
       
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetch(); 
        print_r($records);
        echo $records;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Reports</title>
        <?php
            include 'scripts.php';
            include 'style.php';
        ?>
    </head>
    
    <body>
        <?php
            include 'header.php';
        ?>
        <!--LOGIN-->
        <br><br><br><br>
        <h2>Reports</h2>
        <br>
        
        <div class='container report'>
            <form>
                
            
            Select a report
	        	<br>
	     
	        	<input type="radio" name="r" value="AVG"/>Average<br />
             	<input type="radio" name="r" value="MAX"/>Maximum<br />
             	<input type="radio" name="r" value="MIN"/>Minimum
				<br><BR>
				    
				<input type="radio" name="q" value="student"/>Student Count<br />
             	<input type="radio" name="q" value="inmate"/>Inmate Count<br />
             	<input type="radio" name="q" value="budgetTotalE"/>Total Education Budget CA & Federal<br />
             	<input type="radio" name="q" value="budgetTotalC"/>Total Corrections Budget CA & Federal
				<br><br>
				    
				<input type="submit" value="report" name="report" />
			</form>
			
			
			
			
			<?php
			 //   $reports = report();
			 //   echo $reports;
			?>
        
        <br><br><br><br><br><br>
        <?php
            include 'footer.php';
        ?>
    </body>
</html>