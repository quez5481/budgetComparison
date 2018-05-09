<?php
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Subscribe</title>
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
        <h2>Admin Login</h2>
        <br>
        <div class='container login'>
            <form method="POST" action="subscribeProcess.php">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                </div>
                <br>
    
                <br>
                <button type="submit" name="submitEmail" value="Email" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <br><br><br><br><br><br>
        <?php
            include 'footer.php';
        ?>
    </body>
</html>