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
                   $query = "select * from payment where pay_id = '$id' ";
                   $obj = mysqli_query($con, $query);
                   while($row = mysqli_fetch_array($obj)){
                    $card_name =  $row['card_name'];
                    $payment_type = $row['payment_type'];
                    $card_number =  $row['card_number'];
                    $is_processed =  $row['is-processed'];
                ?>
 <form method="post" action="" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h1 class="modal-title">User Update</h1>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Card Name</label>
                            <input type="text" name="card_name" value="<?php echo $card_name; ?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Payment type</label>
                            <input type="text" name="payment_type" value="<?php echo $payment_type; ?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Card Number</label>
                            <input type="text" name="card_number" value="<?php echo $card_number; ?>" class="form-control" >
                        </div>
                        <input class="form-check-input" type="radio" name="is_processed" value="True" id="True" >
                        <label class="form-check-label" for="True">
                            Payment has been processed
                        </label>
                        <input class="form-check-input" type="radio" name="is_processed" value="False" id="False" >
                        <label class="form-check-label" for="False" checked>
                            Payment needs to be processed
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
    $card_name =  $_POST['card_name'];
    $payment_type = $_POST['payment_type'];
    $card_number =  $_POST['card_number'];
    $is_processed =  $_POST['is_processed'];
    $update_user = "update payment set card_name='$card_name', payment_type='$payment_type', card_number='$card_number', is_processed='$is_processed' where pay_id ='$id'";
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