<?php
session_start();
include("mycon.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login Page</title>
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
    <div class="container">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="modal-header">
                <h4 class="modal-title">Customer Login</h4>
            </div>
            <div class="modal-body">
                
                <div class="form-group">
                    <input type="email" name="email" value="" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" name="pwd" value="" class="form-control" placeholder="Password">
                </div>
               
            <div class="modal-footer">
                <input type="submit" name="login" class="btn btn-success" value="Login">
            </div>
        </form>
        <p>Don't have account, then create your account at first.</p>
        <a href="admission_student.php" role="button" class="btn btn-primary">Register</a>
<?php
if(isset($_POST['login'])){
   $email =  $_POST['email'];
   $pwd =  $_POST['pwd'];
   $query = "select * from student_info where email = '$email' and pwd='$pwd'";
   $user_obj = mysqli_query($con, $query);
   $row = mysqli_fetch_array($user_obj);
   $id = $row['std_id'];
   $num_of_row = mysqli_num_rows($user_obj);
   
   if($num_of_row == 1){
    $_SESSION['std_id'] = $id;
    $_SESSION['is_admin'] = $admin;
    echo "<script>window.open('index.php','_self');</script>";
    }
else {
    echo "<script>alert('Your email or passowrd is incorrect, try again...');</script>";
}
}
    
    
    ?>
</div>
</body>
</html>