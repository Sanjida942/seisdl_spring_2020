<?php 
    include 'connection.php';
    $student_id = $_REQUEST['studentid']; //receive studentid from query parameter
    $str = "DELETE FROM students where id=$student_id";
    if(mysqli_query($conn, $str)) {
        header('Location: students.php');
    }

?>