<?php
    if (isset($_GET["msg"]) && $_GET["msg"] == 'failed')
    {
        echo "<strong>Wrong Username or Password</strong><br><br>";
    }
    if (isset($_GET["msg"]) && $_GET["msg"] == 'exit')
    {
        echo "<strong>Successful Logout</strong><br><br>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Mathematics Capstone 2018: Comparing Budgets</title>
        <link href="styles.css"type="text/css" rel="stylesheet" />
    </head>
    <body>
        <h1>Mathematics Capstone 2018: Comparing Budgets</h1>
        <h2>Contributers</h2>
        <ul>
            <a href="../collaborators/dq.php">Diego Quezada</a>
            <a href="../collaborators/jr.php">Jessica Rosa</a>
            <a href="../collaborators/br.php">Ben Rosales</a>
        </ul>
        <h2>Contributers</h2>
        <ul>
            <a href="blank.php">Steven Kim</a>
            <a href="blank.php">Lipika Deka</a>
        </ul>
        
        <form method="POST" action="logInProcess.php">
            
            Username: <input type="text" name="username"/> <br/>
            Password: <input type="password" name="password"/> <br/>
            
            <input type="submit" name="submitForm" value="Login!" />
            
        </form>
    
        
        <footer>
            <br/><br/>
            <div>
                <hr>
                Mathematics Capstone Spring 2018&copy; Quezada <br/>
                <strong>Disclaimer:</strong> The information in this webpage is fictitious. <br/>
                It is used for academic purposes only.
            </div>
            
            <br/>
            <img src="../images/csumb_logo_150_86.jpg" alt"csumbLogo">
        </footer>

    </body>
</html>