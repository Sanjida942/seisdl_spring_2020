<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1st Class</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div>
            <h2>create department</h2>
        </div>

        <div class="row">
            <div class="col-md-8">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="">Department Name</label>
                        <input type="text" class="form-control" name="name" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Department Short code</label>
                        <input type="text" class="form-control" name="short_code" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Department Code</label>
                        <input type="text" class="form-control" name="code" id="">
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit" value="Add Department">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
   include 'connection.php';
   if(isset($_POST['submit'])) {
        // receive data from the input controls
        $name = $_POST['name'];
        $short_code =  $_POST['short_code'];
        $code = $_POST['code'];
        // database query
        $str = "INSERT INTO departments (name, short_code, code)
            VALUES ('".$name."', '".$short_code."', '".$code."')";
        if(mysqli_query($conn, $str)) {
            echo 'Successfully Inserted';
        }

   }

?>