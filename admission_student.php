<?php
# host, username, pwd, db name
session_start();
include("mycon.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admission Student Page</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
    <!--Navigation bar-->
<div class="nav-placeholder">
    
</div>

<script>
$(function(){
  $(".nav-placeholder").load("Navigation_bar.php");
});
</script>
<!--end of Navigation bar-->
    <h1>Admissions page</h1>
    <div class="container">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="modal-header">
                <h4 class="modal-title">Enter student info:</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" name="std_name" value="" class="form-control" placeholder="Enter full name" style="width: 70%;" >
                </div>
                <br>
                <div class="form-group">
                    <input type="number" name="age" value="" class="form-control" placeholder="Age">
                    <input type="text" name="gender" value="" class="form-control" placeholder="Gender">
                    <input type="text" name="pronouns" value="" class="form-control" placeholder="Pronouns">
                </div>
                <br>
                <div class="form-group">
                    <input type="text" name="dob" value="" class="form-control" placeholder="Date of Birth" style="width: 70%;" >
                </div>
                <br>
                <div class="form-group">
                    <input type="text" name="std_address" value="" class="form-control" placeholder="Address" style="width: 70%;" >
                </div>
                <br>
                <div class="form-group">
                    <input type="text" name="father_name" value="" class="form-control" placeholder="Father's name" style="width: 33%;" >
                    <input type="text" name="mother_name" value="" class="form-control" placeholder="Mother's name" style="width: 33%;" >
                </div>
                <br>
                <div class="form-group">
                    <input type="text" name="last_edu" value="" class="form-control" placeholder="Last education" style="width: 70%;" >
                </div>
                <br>
                <div class="form-group">
                    <input type="text" name="course" value="" class="form-control" placeholder="Course">
                    <input type="text" name="center" value="" class="form-control" placeholder="Center">
                    <input type="number" name="centerid" value="" class="form-control" placeholder="Center ID" min="1" max="3" style="width: 25%;">
                </div>
                <br>
                <div class="form-group">
                    <input type="email" name="email" value="" class="form-control" placeholder="Email" style="width: 70%;" >
                </div>
                <br>
                <div class="form-group">
                    <input type="password" name="pwd" value="" class="form-control" placeholder="Password" style="width: 70%;" >
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" name="register" class="btn btn-success" value="Register">
                <input type="reset" class="btn btn-default" data-dismiss="modal" value="Cancel">
            </div>
        </form>
    <?php
    if(isset($_POST['register'])){
        $std_name = $_POST['std_name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $pronouns = $_POST['pronouns'];
        $dob = $_POST['dob'];
        $std_address = $_POST['std_address'];
        $father_name = $_POST['father_name'];
        $mother_name = $_POST['mother_name'];
        $last_edu = $_POST['last_edu'];
        $course = $_POST['course'];
        $center = $_POST['center'];
        $centerid = $_POST['centerid'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];


        $query = "INSERT INTO student_info (std_name, age, gender, pronouns, dob, std_address, father_name, mother_name, last_edu, course, center, centerid, email, pwd) values ('$std_name', '$age', '$gender', '$pronounsd', '$dob', '$std_address', '$father_name', '$mother_name','$last_edu','$course','$center', '$centerid', '$email', '$pwd')";
        if(mysqli_query($con, $query)){
            echo "<script>window.open('index.php', '_self')</script>";
        }
        else{
            die("Connection failed" . mysqli_connect_error());
        }
        
    }
    ?>
</div>
</body>
</html>