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

<div style="text-align: centre;">
<form action="prayersadminsearch.php" method="post">
<input style="width: 60%; height: 40px; margin-top: 10px; margin-bottom: 10px;" type="text" placeholder="Search..." name="searchinput" >
<button name="searchbtn">Search</button>
</form>
</div>

</div>
</div>
<div class="container">


    <h2>CATHOLIC PRAYERS:</h2>
 

<div class="Prayersdiv">


<?php

if($_SESSION['phonenumber']){

    include('db.php');
    $sql="SELECT * FROM adminposts where category='prayer' ORDER BY ID DESC";

    $data= mysqli_query($con,$sql);
    $queryResults= mysqli_num_rows($data);
    

    
    
    if($queryResults >0) {
        while($row = mysqli_fetch_assoc($data)) {
          if($row['imgname']){
                echo "
                <div >
                <div style='text-transform: uppercase;color: green;font-weight: bold; text-align: centre;text-decoration: underline;margin-top: 4%;'>
                <h2>".$row['posttitle']."</h2>
                </div>
  
                <div  style='height: auto;   width:100%;padding: 0px; margin-top: 1%;font-size: 20px;'>
                <p>".$row['postbody']."</p>
                </div>
                 <div  style='height: 100%; width:100%;padding: 0px; border-radius: 0px; margin-top: 0%;'>
                <img src='Files/".$row['imgname']."' style = 'width: 100%; height:auto;'>

               
            </div>
                
                


              " ;
              echo"
              <div style='text-align: right;margin-top: 10px;'>
              <a  href='deletepage.php?u_id=".$row['id']."'>
                   
         
              <button class='btn btn-danger'>Delete</button>
              </div>
      
              ";
            }
             else{
                echo "
                
                <div >
                <div style='text-transform: uppercase;color: green;font-weight: bold; text-align: centre;text-decoration: underline;margin-top: 4%;'>
                <h2>".$row['posttitle']."</h2>
                </div>
  
                <div  style='height: auto;   width:100%;padding: 0px; margin-top: 1%; font-size: 20px;'>
                <p>".$row['postbody']."</p>
                </div>
              
                ";
    
                echo"
                <div style='text-align: right;margin-top: 10px;'>
                <a  href='deletepage.php?u_id=".$row['id']."'>
                     
           
                <button class='btn btn-danger'>Delete</button>
                </div>
        
                ";
            }

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