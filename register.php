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
<h1>ST BENEDICT ARROR CATHOLIC PARISH</h1>
<h3>Prayer and Work</h3>
</div>
<div class="container">
    <h2>Register as a new church member.</h2>

<form class="form-control"  action="register.php" method="post">
<input class="form-control"  name="firstname" type="text" placeholder="Enter your first name." required></input> <br> <br>
<input class="form-control"  name="lastname" type="text" placeholder="Enter your last name." required></input> <br> <br>
<input class="form-control" name="phonenumber" type="number" placeholder="Enter your phone number. Start with 0..." required></input> <br> <br>
<input class="form-control" name="phonenumberconfirm" type="number" placeholder="Confirm phone number. Start with 0..." required></input> <br> <br>
<input class="form-control"  name="securitycode" type="text" placeholder="Enter your security code. Useful in case you forget password" required></input> <br> <br>
<input class="form-control"  name="securitycodeconfirm" type="text" placeholder="Confirm your security code. Useful in case you forget password" required></input> <br> <br>

<input class="form-control"  name="password" type="password" placeholder="Enter password." required></input> <br> <br>
<input class="form-control"  name="passwordconfirm" type="password" placeholder="Confirm password." required></input> <br> <br>

<button class="btn btn-primary" type="submit" name="reg">Register</button>


</form>
    </div>
</div>

</body>
</html>

<?php

include('db.php');


if(isset($_POST['reg'])){

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phonenumber = $_POST['phonenumber'];
    $phonenumberconfirm = $_POST['phonenumberconfirm'];
    $password = $_POST['password'];
    $passwordconfirm = $_POST['passwordconfirm'];
    $securitycode = $_POST['securitycode'];
    $securitycodeconfirm = $_POST['securitycodeconfirm'];

    if($password != $passwordconfirm || $phonenumber != $phonenumberconfirm || $securitycode != $securitycodeconfirm){
        echo"<script>alert('Password,securitycode or phone number with their confirmations does not match. Please try again.')</script>";
    }elseif($password === $passwordconfirm && $phonenumber === $phonenumberconfirm && $securitycode === $securitycodeconfirm){

        $sql1="SELECT * FROM authenticationdb where phonenumber = '$phonenumber' Limit 1";
    
		$result= mysqli_query($con,$sql1);
		$queryResults= mysqli_num_rows($result);
		
		
        if($queryResults) {
            echo"<script>alert('A user with same phone number already exist. Try again with a different number.')</script>"; 
        }else{
          // $password = md5($password);//encryption of password
            $sql = "INSERT INTO authenticationdb (firstname, lastname, phonenumber, password, securitycode) VALUES ('$firstname', '$lastname','$phonenumber','$password', '$securitycode')";
		$res = mysqli_query($con,$sql);
		
	
		if($res ==1){

        //set session variables
        $_SESSION['firstname'] = "$firstname";
        $_SESSION['lastname'] = "$lastname";
        $_SESSION['phonenumber'] = "$phonenumber";


			echo "<script>alert('Registration successful. You are now logged in.')</script>";
            echo "<script>location.replace('main.php')</script>";
		}

        }
    }

}


?>