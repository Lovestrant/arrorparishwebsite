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
   <link rel="stylesheet" type="text/css" href="index.css">
<!-- google icons link-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

</head>

<body>
<div class="container-fluid">
<h1>ARROR CATHOLIC PARISH</h1>
<h3>Let Your Light Shine</h3>
</div>
<div class="container">
    <h2>Login as Church Admin.</h2>
   

<form class="form-control" action="adminlogin.php" method="post">

<input class="form-control" name="phonenumber" type="number" placeholder="Enter admin phone number." required></input> <br> <br>

<input class="form-control" name="password" type="password" placeholder="Enter Church Admin Password." required></input> <br> <br>


<button class="btn btn-primary" type="submit" name="submit">Login</button>

</form>

    </div>
</div>

</body>
</html>


<?php
include('db.php');

if(isset($_POST['submit'])){
    
    $phonenumber = $_POST['phonenumber'];
    $password = $_POST['password'];

    $sql1="SELECT * FROM adminlogintable where phonenumber = '$phonenumber' and password= '$password' Limit 1";
    
    $result= mysqli_query($con,$sql1);
    $queryResults= mysqli_num_rows($result);
    
    
    if($queryResults) {
        while($row = mysqli_fetch_assoc($result)) {

            //set session variables
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['phonenumber'] = "$phonenumber";
        
    

        //taking user to main page
        echo "<script>alert('Login successful.')</script>";
        echo "<script>location.replace('admin.php')</script>";
        }

    }else{
        echo "<script>alert('No such user in our system. Fill your details correctly.')</script>";
        echo "<script>location.replace('adminlogin.php')</script>";
    }
        
}






?>