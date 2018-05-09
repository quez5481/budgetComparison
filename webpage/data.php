<?php

    include 'dbConnection.php';
    
    $conn = getDatabaseConnection("mathCapstone");
    
    function allData()
    {
        global $conn;
        
        $sql = "SELECT * FROM projectData WHERE 1";
        
        if (isset($_GET['searchForm'])) 
        {
	        $namedParameters = array();
	     
	        if (!empty($_GET['yearFrom'])) //checks whether user has typed a year from
	        { 
	             $sql .=  " AND id >= :yearFrom";
	             $namedParameters[":yearFrom"] =  ($_GET['yearFrom'] - 2006);
	        }  
	        if (!empty($_GET['yearTo'])) //checks whether user has typed a year to
	        { 
	             $sql .=  " AND id <= :yearTo";
	             $namedParameters[":yearTo"] =  ($_GET['yearTo'] - 2007);
	        } 
	        if (!empty($_GET['studentFrom'])) //checks whether user has typed a student from
	        { 
	             $sql .=  " AND student >= :studentFrom";
	             $namedParameters[":studentFrom"] =  $_GET['studentFrom'];
	        }  
	        if (!empty($_GET['studentTo'])) //checks whether user has typed a student to
	        { 
	             $sql .=  " AND student <= :studentTo";
	             $namedParameters[":studentTo"] =  $_GET['studentTo'];
	        } 
	        if (!empty($_GET['inmateFrom'])) //checks whether user has typed a inmate from
	        { 
	             $sql .=  " AND inmate >= :inmateFrom";
	             $namedParameters[":inmateFrom"] =  $_GET['inmateFrom'];
	        }  
	        if (!empty($_GET['inmateTo'])) //checks whether user has typed a inmate to
	        { 
	             $sql .=  " AND inmate <= :inmateTo";
	             $namedParameters[":inmateTo"] =  $_GET['inmateTo'];
	        }  
	        if(isset($_GET['orderBy']))
            {
                if($_GET['orderBy'] == "student")
                {
                    $sql .= " ORDER BY student";
                }
                else 
                {
                    $sql .= " ORDER BY inmate";
                }
            }
        } 
       
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        // print_r($records);
        return $records;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Data</title>
        <?php
            include 'scripts.php';
            include 'style.php';
        ?>
    </head>
    <body>
        <?php
            include 'header.php';
        ?>
        
        <h1>Data</h1>
        <p>All budgets are in thousands(US dollars).</p>
        <p>Feel free to search by Year, Student Count, and Inmate Count.</p>
        <br>
        
        
        <div class='container userForm'>
	        <form>
	        	Filter by Year
	        	<div class="form-row">
				    <div class="col">
				        <input type="text" name="yearFrom" class="form-control" placeholder="Start Year">
				    </div>
				    <div class="col">
				        <input type="text" name="yearTo" class="form-control" placeholder="End Year">
				    </div>
				</div>
				<br>
				Filter by Student count
				<div class="form-row">
				    <div class="col">
				        <input type="text" name="studentFrom" class="form-control" placeholder="Minimum Student Count">
				    </div>
				    <div class="col">
				        <input type="text" name="studentTo" class="form-control" placeholder="Maximum Student Count">
				    </div>
				</div>
				<br>
				Filter by Inmate count
				<div class="form-row">
				    <div class="col">
				        <input type="text" name="inmateFrom" class="form-control" placeholder="Minimum Inmate Count">
				    </div>
				    <div class="col">
				        <input type="text" name="inmateTo" class="form-control" placeholder="Maximum Inmate Count">
				    </div>
				</div>
				<br>
	        	Order by:
	        	<br>
	     
	        	<input type="radio" name="orderBy" value="student"/> Student Count<br />
             	<input type="radio" name="orderBy" value="inmate"/> Inmate Count
				<br><BR>
				<input type="submit" value="Search" name="searchForm" />
	        </form>
        </div>
        <br>
        
        
        
        
        
        
		    <?php
		    	include 'table.php';
		        $data = allData();
		        for($i=0; $i<sizeof($data); $i++)
		        {
		        	echo "<tr>";
		            echo "<td>"  .  $data[$i]['year']  .  "</td>";
		            echo "<td>"  .  $data[$i]['student']  .  "</td>";
		            echo "<td>"  .  $data[$i]['inmate']  .  "</td>";
		            echo "<td>"  .  $data[$i]['budget_educ_ca']  .  "</td>";
		            echo "<td>"  .  $data[$i]['budget_educ_ca_fed']  .  "</td>";
		            echo "<td>"  .  $data[$i]['budget_education_total']  .  "</td>";
		            echo "<td>"  .  $data[$i]['budget_per_student']  .  "</td>";
		            echo "<td>"  .  $data[$i]['budget_cor_ca']  .  "</td>";
		            echo "<td>"  .  $data[$i]['budget_cor_ca_fed']  .  "</td>";
		            echo "<td>"  .  $data[$i]['budget_cor_total']  .  "</td>";
		            echo "<td>"  .  $data[$i]['budget_per_inmate']  .  "</td>";
		            echo "<td>"  .  $data[$i]['state_budget_student_ca']  .  "</td>";
		            echo "<td>"  .  $data[$i]['fed_budget_student']  .  "</td>";
		            echo "<td>"  .  $data[$i]['state_budget_inmates']  .  "</td>";
		            echo "<td>"  .  $data[$i]['fed_budget_inmate']  .  "</td>";
		            echo "</tr>";
		        }
		    ?>    
		    </tbody>
	    </table>    
        
        <?php
            include 'footer.php';
        ?>
    </body>
</html>