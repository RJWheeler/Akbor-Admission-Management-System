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
 <div id="nav-placeholder">

</div>

<script>
$(function(){
  $("#nav-placeholder").load("Navigation_bar.php");
});
</script>
<!--end of Navigation bar-->
<h1>Welcome</h1>
</body>
</hmtl>