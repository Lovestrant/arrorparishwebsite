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


<h3>Total registered users in the system:
<label style="color: red;">
<?php

include('db.php');

    include('db.php');
    $sql2="SELECT * FROM authenticationdb";
        
    $result= mysqli_query($con,$sql2);
    $queryResults= mysqli_num_rows($result);
    
    
    if($queryResults) {
    echo"$queryResults";
    }
  

?>

</label>
</h3>

<h3>Total registered admin users:
<label style="color: red;">
<?php

include('db.php');

    include('db.php');
    $sql2="SELECT * FROM adminlogintable";
        
    $result= mysqli_query($con,$sql2);
    $queryResults= mysqli_num_rows($result);
    
    
    if($queryResults) {
    echo"$queryResults";
    }
  

?>

</label>
</h3>



    <h2>Register Admin.</h2>

<form class="form-control"  action="developer.php" method="post">
<input class="form-control"  name="firstname" type="text" placeholder="Enter your first name." required></input> <br> <br>
<input class="form-control"  name="lastname" type="text" placeholder="Enter your last name." required></input> <br> <br>
<input class="form-control" name="phonenumber" type="number" placeholder="Enter your phone number. Start with 07..." required></input> <br> <br>
<input class="form-control" name="phonenumberconfirm" type="number" placeholder="Confirm phone number. Start with 07..." required></input> <br> <br>
<input class="form-control"  name="password" type="password" placeholder="Enter password." required></input> <br> <br>
<input class="form-control"  name="passwordconfirm" type="password" placeholder="Confirm password." required></input> <br> <br>

<button class="btn btn-primary" type="submit" name="submit">Submit</button>


</form>


<h2>Update Admin details below.</h2>
 

 <form class="form-control"  action="developer.php" method="post">
     <input class="form-control"  name="firstname" type="text" placeholder="Enter your first name." required><br> <br>
     <input class="form-control"  name="phonenumber" type="number" placeholder="Enter your phone number." required><br> <br>
     <input class="form-control" name="password" type="password" placeholder="Enter new password." required><br> <br>
     <input class="form-control" name="passwordconfirm" type="password" placeholder="Confirm password." required> <br> <br>
 
     <button class="btn btn-primary" type="submit" name="reset">Reset</button>
 
 </form>
 
    </div>
</div>

</body>
</html>

<?php


if(isset($_POST['submit'])){

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phonenumber = $_POST['phonenumber'];
    $phonenumberconfirm = $_POST['phonenumberconfirm'];
    $password = $_POST['password'];
    $passwordconfirm = $_POST['passwordconfirm'];

    if($password != $passwordconfirm || $phonenumber != $phonenumberconfirm){
        echo"<script>alert('Password or phone number with their confirmations does not match. Please try again.')</script>";
    }elseif($password === $passwordconfirm && $phonenumber === $phonenumberconfirm){

        $sql1="SELECT * FROM adminlogintable where phonenumber = '$phonenumber' Limit 1";
    
		$result= mysqli_query($con,$sql1);
		$queryResults= mysqli_num_rows($result);
		
		
        if($queryResults) {
            echo"<script>alert('A user with same phone number already exist. Try again with a different number.')</script>"; 
        }else{
            //$password = md5($password_1);//encryption of password
            $sql = "INSERT INTO adminlogintable (firstname, lastname, phonenumber, password) VALUES ('$firstname', '$lastname','$phonenumber','$password')";
		$res = mysqli_query($con,$sql);
		
	
		if($res ==1){
			echo "<script>alert('Registration successful.')</script>";
            echo "<script>location.replace('developer.php')</script>";
		}

        }
    }

}


?>





<?php

include('db.php');

if(isset($_POST['reset'])){

    
    $firstname= $_POST['firstname'];
    $phonenumber= $_POST['phonenumber'];
    $password= $_POST['password'];
    $passwordconfirm= $_POST['passwordconfirm'];

    if(!($password == $passwordconfirm)){
        echo "<script>alert('Password doesn't match with its confirmation. Try again.')</script>";
    
    }else{
      
        $sql1 = "SELECT * from authenticationdb where firstname = '$firstname' and phonenumber = '$phonenumber' Limit 1";
    	$result= mysqli_query($con,$sql1);
		$queryResults= mysqli_num_rows($result);
		
		
        if($queryResults) {
            //$password = md5($password_1);//encryption of password
            $sql = "UPDATE authenticationdb set password = '$password' where phonenumber= '$phonenumber'";
		$res = mysqli_query($con,$sql);
		
	
		if($res ==1){
			echo "<script>alert('Update successful.')</script>";
            echo "<script>location.replace('developer.php')</script>";
		}
     }else{
            echo"<script>alert('No user with those details in the system. Please try again. Ensure you fill your details correctly.')</script>"; 
           

        }
    }
  
}



?>