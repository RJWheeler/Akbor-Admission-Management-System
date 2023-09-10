<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['std_id'])){
    echo "<script>window.open('Login.php','_self')</script>";
} else{
    # host, username, pwd, db name
    $id = $_SESSION['std_id'];
    session_start();
    include("mycon.php")
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Status Check Page</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
    <!--Navigation bar-->
<div id="nav-placeholder">

</div>

<script>
$(function(){
  $("#nav-placeholder").load("Navigation_bar.php");
});
</script>
<!--end of Navigation bar-->
    <h1>Status Check</h1>
    <?php
    $logged_user = $_SESSION['std_id'];
    $user = "select * from student_info where std_id= $logged_user";
    $obj = mysqli_query($con, $user);
    $row = mysqli_fetch_array($obj);

    if($row['is_accepted']=='True') { 
        echo"<h2 style='color: white; background-color: green;'>Status: Accepted</h2>";
    }
    else{
        echo"<h2 style='color: white; background-color: red;'>Status: Not Accepted</h2>";
    }
    ?>
    <div class="container-fluid">
    <div class="row">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800">User Records</h1>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead style="font-size: 30px; color:black; text-decoration:underline;">
                            <tr>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Pronouns</th>
                                <th>Date of birth</th>
                                <th>Address</th>
                                <th>Course</th>
                                <th>Center Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Accepted</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                            <?php 
                                $all_users = "SELECT * from student_info where std_id='$id'";
                                $objects = mysqli_query($con,$all_users );
                                while($row = mysqli_fetch_array($objects)){
                            ?>
                                <td><?php echo $row['std_id'];?></td>
                                <td><?php echo $row['std_name'];?></td>
                                <td><?php echo $row['age'];?></td>
                                <td><?php echo $row['gender'];?></td>
                                <td><?php echo $row['pronouns'];?></td>
                                <td><?php echo $row['dob'];?></td>
                                <td><?php echo $row['std_address'];?></td>
                                <td><?php echo $row['course'];?></td>
                                <td><?php echo $row['center'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['pwd'];?></td>
                                <td><?php echo $row['is_accepted'];?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <img src="dragons.jpg">         
    </div>
</body>
</html>
<?php } ?>