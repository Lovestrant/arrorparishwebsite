<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arror Catholic Parish</title>

     <!--bootstrap links-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


<!--Css link-->
   <link rel="stylesheet" type="text/css" href="main.css">
<!-- google icons link-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<style>
    body{
        background-color: white;
    }
</style>
</head>

</head>

<body>
<div class="container-fluid">

<h1>ARROR CATHOLIC PARISH</h1>

<h3>Let Your Light Shine</h3>


<div style="text-align: right;background-color: transparent;">
<form action="logout.php">
<button class="btnsearch" style="background-color: transparent;"><i class="material-icons">logout</i>Log Out</button>
</form>
</div>
</div>


 

</div>
<div>



<h2>Welcome member.</h2> <br>
<a href="prayers.php"><button class="btn btn-success">Prayers</button></a> <br><br>
    <p> 
    <label>There are:</label>

<label style='font-size: 20px; color: red;'>
<?php
include('db.php');
$sql2="SELECT * FROM adminposts where category='prayer'";
        
$result= mysqli_query($con,$sql2);
$queryResults= mysqli_num_rows($result);


if($queryResults) {
echo"$queryResults";
}


?>
</label>
<label>Prayers Posted in total.</label>
    </p>


<p>
<a href="readings.php"><button class="btn btn-primary">Readings</button></a> <br><br>
<label>There are:</label>

<label style='font-size: 20px; color: red;'>
<?php
include('db.php');
$sql2="SELECT * FROM adminposts where category='reading'";
        
$result= mysqli_query($con,$sql2);
$queryResults= mysqli_num_rows($result);


if($queryResults) {
echo"$queryResults";
}


?>
</label>
<label>Readings Posted in total.</label>


</p>

<p>
<a href="parishnoticeboard.php"><button class="btn btn-info">Parish Noticeboard</button></a> <br><br>
<label>There are:</label>

<label style='font-size: 20px; color: red;'>
<?php
include('db.php');
$sql2="SELECT * FROM adminposts where category='noticeboard'";
        
$result= mysqli_query($con,$sql2);
$queryResults= mysqli_num_rows($result);


if($queryResults) {
echo"$queryResults";
}


?>
</label>
<label>Posts on the noticeboad in total.</label>


</p>

<p>
<a href="chatroom.php"><button class="btn btn-dark">Parish Chatroom</button></a> <br><br>
<label>There are:</label>

<label style='font-size: 20px; color: red;'>
<?php
include('db.php');
$sql2="SELECT * FROM parishchat";
        
$result= mysqli_query($con,$sql2);
$queryResults= mysqli_num_rows($result);


if($queryResults) {
echo"$queryResults";
}


?>
</label>
<label>Chats from church members in total.</label>


</p>

<h4>Click the button below to contact Parish priest.</h4>

</div>


<?php

if($_SESSION['phonenumber']){

echo '
<div class="container">
  
   
  <a href="chatpage.php"><button class="btn btn-warning">Contact Parish Priest</button></a> <br><br>
 
</div>
';

}else{
    echo "<script>alert('You are not logged in.')</script>";
    echo "<script>location.replace('index.php')</script>";
 }
?>
</body>
</html>