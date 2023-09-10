<?php
session_start();
if(!isset($_SESSION['std_id'])){
    echo "<script>window.open('Login.php','_self')</script>";
} else{
    include("mycon.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Edit User by Admin</title>
    <link rel="stylesheet" href="style.css">
    <!-- Custom fonts for this template -->
    <link href="fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <style>
         .register{
            margin: auto;
            width: 50%;
            margin-top: 20px;
        }
    </style>
</head>

<body id="page-top">
            <!--Navigation bar-->
<div id="nav-placeholder">

</div>

<script>
$(function(){
  $("#nav-placeholder").load("Navigation_bar.php");
});
</script>
<!--end of Navigation bar-->
                <!-- Begin Page Content -->
                <div class="container-fluid">
        <div class="row register">
            <div class="col-12">
                <?php
                if(isset($_GET['edit'])){
                   $id =  $_GET['edit'];
                   $query = "select * from student_info where std_id = '$id' ";
                   $obj = mysqli_query($con, $query);
                   while($row = mysqli_fetch_array($obj)){
                    $std_id  = $row['std_id'];
                    $std_name =  $row['std_name'];
                    $age =  $row['age'];
                    $gender =  $row['gender'];
                    $pronouns =  $row['pronouns'];
                    $dob =  $row['dob'];
                    $std_address =  $row['std_address'];
                    $father_name =  $row['father_name'];
                    $mother_name =  $row['mother_name'];
                    $last_edu =  $row['last_edu'];
                    $course =  $row['course'];
                    $center =  $row['center'];
                    $centerid =  $row['centerid'];
                    $email =  $row['email'];
                    $pwd =  $row['pwd'];
                    $is_admin =  $row['is_admin'];
                    $is_accepted =  $row['is_accepted'];                
                
                ?>
 <form method="post" action="" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h1 class="modal-title">User Update</h1>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="std_name" value="<?php echo $std_name; ?>" class="form-control" >
                        </div> 
                        <div class="form-group">
                            <label>Age</label>
                            <input type="number" name="age" value="<?php echo $age; ?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <input type="text" name="gender" value="<?php echo $gender; ?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Pronouns</label>
                            <input type="text" name="pronouns" value="<?php echo $pronouns; ?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>DOB</label>
                            <input type="date" name="dob" value="<?php echo $dob; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Father's name</label>
                            <input type="text" name="father_name" value="<?php echo $father_name; ?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Mother's name</label>
                            <input type="text" name="mother_name" value="<?php echo $mother_name; ?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Last Education</label>
                            <input type="text" name="last_edu" value="<?php echo $last_edu; ?>" class="form-control" >
                        </div>
                        <label>Course</label>
                        <div class="form-group">
                        <input type="text" name="course" value="<?php echo $course; ?>" class="form-control" >
                        </div>
                        <label>Center Name</label>
                        <div class="form-group">
                        <input type="text" name="center" value="<?php echo $center; ?>" class="form-control" >
                        </div>
                        <label>Center Id</label>
                        <div class="form-group">
                        <input type="text" name="centerid" value="<?php echo $centerid; ?>" class="form-control" >
                        </div>
                        <label>Email</label>
                        <div class="form-group">
                        <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" >
                        </div>
                        <label>Password</label>
                        <div class="form-group">
                        <input type="password" name="pwd" value="<?php echo $pwd; ?>" class="form-control" >
                        </div>
                        <input class="form-check-input" type="radio" name="is_admin" value="True" id="True" >
                        <label class="form-check-label" for="True">
                            Admin
                        </label>
                        <input class="form-check-input" type="radio" name="is_admin" value="False" id="False" >
                        <label class="form-check-label" for="False" checked>
                            Not an Admin
                        </label><br>
                        <input class="form-check-input" type="radio" name="is_accepted" value="True" id="True" >
                        <label class="form-check-label" for="True">
                            ACCEPTED
                        </label>
                        <input class="form-check-input" type="radio" name="is_accepted" value="False" id="False" >
                        <label class="form-check-label" for="False" checked>
                            NOT ACCEPTED
                        </label>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" name="update" class="btn btn-success" value="Update">
                    </div>
                </form>  
                 <?php  }} ?>
            </div>
<?php 
if(isset($_POST['update'])){
    $std_name =  $_POST['std_name'];
    $age =  $_POST['age'];
    $gender =  $_POST['gender'];
    $pronouns = $_POST['pronouns'];
	$dob =  $_POST['dob'];
    $std_address =  $_POST['std_address'];
    $father_name =  $_POST['father_name'];
    $mother_name =  $_POST['mother_name'];
    $last_edu =  $_POST['last_edu'];
    $course =  $_POST['course'];
    $center =  $_POST['center'];
    $centerid =  $_POST['centerid'];
    $email =  $_POST['email'];
    $pwd =  $_POST['pwd'];
    $is_admin =  $_POST['is_admin'];
    $is_accepted =  $_POST['is_accepted'];
    $update_user = "update student_info set std_name='$std_name', age='$age', gender='$gender', pronouns='$pronouns',dob='$dob',std_address='$std_address',father_name='$father_name',mother_name='$mother_name',last_edu ='$last_edu',course ='$course',center ='$center',centerid ='$centerid',email ='$email',pwd ='$pwd', is_admin ='$is_admin', is_accepted ='$is_accepted' where std_id ='$id'";
    if (mysqli_query($con, $update_user)){
        
        echo "<script>window.open('admin_edit.php', '_self')</script>";
        exit();
    }
}
  
  
  ?>  


        </div>
</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
</body>

</html>
<?php }?>