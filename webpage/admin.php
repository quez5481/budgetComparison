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
    if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') 
    {
        echo "<strong>Item failed to add to the database.</strong><br><br>";
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
        
        // print_r($records);
        
        return $records;
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
        
        <?php
            include 'scripts.php';
            include 'style.php';
        ?>
        
        <script>
            // function confirmDelete() 
            // {
            //     return confirm("Are you sure you want to delete it?");
            // }
        </script>
    </head>
    <body>
        <?php
            include 'header.php';
        ?>


        
        <h1> Admin Main Page </h1>
        
        <h3> Welcome <?=$_SESSION['adminName']?>! </h3>
        
        <h5> You can update or delete a record by clicking on the years in the Year column.</h5>

        <br />
        
        <a id="admin" href="reports.php">View Reports</a>
        <br>
        <a id="admin" href="add.php">Add a Record</a>
        
        
    
        
        <!--<form action="addProduct.php">-->
        <!--    <input type="submit" name="addproduct" value="Add Product"/>-->
        <!--</form>-->
        
        
        
        <form action="logout.php">
            <input id="logout" type="submit" value="Logout"/>
        </form>
        
        <br /><br />
        
        
        <script>
    
            $(document).ready(function()
            {  
                $(".selected").click(function()
                {
                    //alert(  );
                    $('#infoModal').modal("show");
                    $('#info').html("<img src='../images/loading.gif' width='30'>")
                    
                    $.ajax({
    
                        type: "GET",
                        url: "api.php",
                        dataType: "json",
                        data: { "id": $(this).attr("id")},
                        success: function(data,status) 
                        {
                            //alert(data.breed);
                            //log.console(data.pictureURL);
                            $("#modalLabel").html("<h2>" + data.year +"</h2>");
                            $('#info').html("");
                            $('#info').append("<h3>Student Count: " + data.student + "</h3><br>");
                            $('#info').append("<h3>Inmate Count: " + data.inmate + "</h3><br>");
                            $('#info').append("<h3>Education Budget CA: " + data.budget_educ_ca + "</h3><br>");
                            $('#info').append("<h3>Education Budget CA & Fed: " + data.budget_educ_ca_fed + "</h3><br>");
                            $('#info').append("<h3>Corrections Budget CA: " + data.budget_cor_ca + "</h3><br>");
                            $('#info').append("<h3>Corrections Budget CA & Fed: " + data.budget_educ_ca_fed + "</h3><br>");
                            $('#info').append("<a class='btn btn-primary' href='update.php?id=" + data.id + "' role='button'>Update Record</a>       ");
                            $('#info').append("<a class='btn btn-danger' href='delete.php?id=" + data.id + "' role='button'>Delete Record</a>");
                        },
                        complete: function(data,status) 
                        { 
                          //optional, used for debugging purposes
                          //alert(status);
                        }
                    });//ajax
                }); 
            }); //document ready
            
    
        </script>
        
        
        <?php
		    	include 'table.php';
		        $data = allData();
		        for($i=0; $i<sizeof($data); $i++)
		        {
		        	echo "<tr>";
		            echo "<td><a href='#' class='selected' id='" . ($i + 1) . "'>"  .  $data[$i]['year']  .  "</a1></td>";
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
        
      
        
        <!-- Modal -->
        <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                  
                    <div id="info">
                    
                    
                    
                    </div>
                    
                    
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
            include 'footer.php';
        ?>
    </body>
</html>