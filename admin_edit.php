<?php
session_start();
include("mycon.php");
if(!isset($_SESSION['std_id'])){
    echo "<script>window.open('Login.php','_self')</script>";
} 
else{
    $logged_user = $_SESSION['std_id'];
    $user = "select * from student_info where std_id= $logged_user";
    $obj = mysqli_query($con, $user);
    $row = mysqli_fetch_array($obj);

    if($row['is_admin']=='False') { 
        echo"<script>window.open('Status_Check_page.php','_self')</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style.css">
    <title>Admin Edit Student Page</title>
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
                        <thead>
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
                                <th>Is an Admin</th>
                                <th>Accepted</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                            <?php 
                                $all_users = "select * from student_info";
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
                                <td><?php echo $row['is_admin'];?></td>
                                <td><?php echo $row['is_accepted'];?></td>
                                <td>
                                <button style="width:35px; height: 20px;"><a href="edit_user_by_admin.php?edit=<?php echo $row['std_id'];?>" class="edit" title="Edit" data-toggle="tooltip">Edit</a></button>
                                <button style="width:50px; height: 20px;"><a href="del_user.php?del=<?php echo $row['std_id'];?>" class="delete" title="Delete" data-toggle="tooltip">Delete</a></button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800">Payment Records</h1>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Payment ID</th>
                                <th>Student ID</th>
                                <th>Card Name</th>
                                <th>Payment Type</th>
                                <th>Card Number</th>
                                <th>Processed</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                            <?php 
                                $all_users2 = "select * from payment";
                                $objects2 = mysqli_query($con,$all_users2 );
                                while($row = mysqli_fetch_array($objects2)){
                            ?>
                                <td><?php echo $row['pay_id'];?></td>
                                <td><?php echo $row['std_pay_id'];?></td>
                                <td><?php echo $row['card_name'];?></td>
                                <td><?php echo $row['payment_type'];?></td>
                                <td><?php echo $row['card_number'];?></td>
                                <td><?php echo $row['is_processed'];?></td>
                                <td>
                                <button style="width:35px; height: 20px;"><a href="edit_pay_by_admin.php?edit=<?php echo $row['pay_id'];?>" class="edit" title="Edit" data-toggle="tooltip">Edit</a></button>
                                <button style="width:50px; height: 20px;"><a href="del_pay.php?del=<?php echo $row['pay_id'];?>" class="delete" title="Delete" data-toggle="tooltip">Delete</a></button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>    
<!-- /.container-fluid -->
</div>
           <!-- End of Main Content -->
</body>
</html>
<?php } ?>