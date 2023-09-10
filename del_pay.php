<?php

session_start();
if(!isset($_SESSION['std_id'])){
    echo "<script>window.open('Login.php','_self')</script>";
} else{
    include("mycon.php");

if(isset($_GET['del'])){
    $id =  $_GET['del'];
    $del_query = "delete from payment where pay_id = $id";
    if(mysqli_query($con, $del_query)){
        echo "<script>alert('Payment is deleted.')</script>";
        echo "<script>window.open('admin_edit.php','_self')</script>";

    }

}
}
?>