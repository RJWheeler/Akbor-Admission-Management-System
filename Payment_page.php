<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['std_id'])){
    echo "<script>window.open('Login.php','_self')</script>";
} else{
    # host, username, pwd, db name
    include("mycon.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bcfd89e2cd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Payment Page</title>
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
    <h1>Payment</h1>
    <div class="container">
        <img src="dragons.jpg">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" name="card_name" value="" class="form-control" placeholder="Enter full name" style="width: 70%;" >
                </div>
                <br>
                <div class="form-group">
                    <input type="text" name="payment_type" value="" class="form-control" placeholder="Payment type" style="width: 70%;" >
                </div>
                <br>
                <div class="form-group">
                    <input type="text" name="card_number" value="" class="form-control" placeholder="Card Number" style="width: 70%;" >
                </div>
                <br>
                <div class="modal-footer">
                <input type="submit" name="submit_pyt" class="btn btn-success" value="Submit Payment">
                </div>
                <h3>Instructions</h3>
                <p>Worem ipsum dolor sit amet, consector adipiscing elit. <br> 
                Nunc vulputate libero et velit interdum, ac aliquet odio <br> 
                mattis. Class aptent taciti sociosqu ad litora torquent per<br> 
                conubia nostra inceptos himenaeos.
                </p>
                <p><i class="fa-solid fa-phone-volume"></i> +88-102-231</p>
            </div>
        </form>   
        <?php
if(isset($_POST['submit_pyt'])){ 
   $std_id =  $_SESSION['std_id'];
   $card_name =  $_POST['card_name'];
   $payment_type =  $_POST['payment_type'];
   $card_number = $_POST['card_number'];
   $query = "INSERT INTO payment (std_pay_id, card_name, payment_type, card_number) values ('$std_id', '$card_name','$payment_type', '$card_number')";
   if(mysqli_query($con, $query)){
    echo "<script>alert('Payment Successful');</script>";
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
<?php } ?>