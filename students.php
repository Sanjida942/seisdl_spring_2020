<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1st Class</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .modal {
            color: #000;
        }
    </style>
</head>
<?php include 'connection.php'; ?>
<body>
    <div class="container">
        <div>
            <h2>List all Student</h2>
           <a class="btn btn-primary" href="student.php">ADD STUDENT</a>
        </div>

        <div class="row">
            <div class="col-md-12">
                
                <table class="table table-dark table-striped">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>DOB</th>
                        <th>Roll</th>
                        <th>Department</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                    <?php 
                        $str = "SELECT students.*, departments.short_code as dname from students INNER JOIN departments 
                                ON students.department_id=departments.id";
                        $results = mysqli_query($conn, $str);
                        while($row = mysqli_fetch_array($results)) {  ?>
                            <tr>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['dob'] ?></td>
                                <td><?php echo $row['roll'] ?></td>
                                <td><?php echo $row['dname'] ?></td>
                                <td>
                                    <a class="btn btn-primary" href="edit-student.php?id=<?php echo $row['id'] ?>">Edit</a>
                                    <a class="btn btn-danger" data-toggle="modal" data-target="#mm<?php echo $row['id'] ?>">Delete</a>
                                    <div class="modal" id="mm<?php echo $row['id'] ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Delete Confirmation !!!</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                               Are you sure you want to delete <b><?php echo $row['name'] ?> </b> ? 
                                                </div>
                                                
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                <a href="delete-student.php?studentid=<?php echo $row['id'] ?>" class="btn btn-success">Yes</a>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>  
                            <?php }
                    ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
