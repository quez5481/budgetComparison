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
        
        <link href="styles.css" type="text/css" rel="stylesheet">
        
        <!-- For mobile -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        
        <?php
            include 'style.php';
        ?>
    </head>
    
    <body>
        <?php
            include 'header.php';
        ?>
        <!--LOGIN-->
        <br><br><br><br>
        <h2>Admin Login</h2>
        <br>
        <div class='container login'>
            <form method="POST" action="logInProcess.php">
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Username">
                </div>
                <br>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <br>
                <button type="submit" name="submitForm" value="Login!" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <br><br><br><br><br><br>
        <?php
            include 'footer.php';
        ?>
    </body>
</html>