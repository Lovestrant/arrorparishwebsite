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
   <link rel="stylesheet" type="text/css" href="chatroom.css">
<!-- google icons link-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



</head>

<body>
<div class="container-fluid">
<h1>ST BENEDICT ARROR CATHOLIC PARISH</h1>
<h3>Prayer and Work</h3>


<div style="text-align: right;background-color: transparent;">
<form action="logout.php">
<button class="btnsearch" style="background-color: transparent;"><i class="material-icons">logout</i>Log Out</button>
</form>
</div>

</div>
</div>
<div class="container">


    <h2 style="color: red;">Newest messages.(From new to old in descending order.)</h2>
 

<div class="readingsdiv">


<?php

 

if($_SESSION['phonenumber']){
    include('db.php');
    $sql="SELECT * FROM messages ORDER BY ID DESC Limit 30";

    $data= mysqli_query($con,$sql);
    $queryResults= mysqli_num_rows($data);
    

    
    
    if($queryResults >0) {
        while($row = mysqli_fetch_assoc($data)) {
            echo "
                
                
            <div style='height: auto; width:50%; margin: 20px; padding: 10px;background-color: lightgreen; 
             border-radius: 10px; border-radius: 10px; '>
             <p style='color: blue; margin:0;'>".$row['firstname']."-".$row['lastname']."</p>
             <p style='color: orange;'>".$row['phonenumber']."<br></p>
             ".$row['textmessage']."</div>
          
        
            ";
               

            

        }
    }


}else{
    echo "<script>alert('You are not logged in.')</script>";
    echo "<script>location.replace('index.php')</script>";
 }	
		?>


</div>

    </div>
</div>

</body>
</html>