<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arror Catholic Parish</title>

    <!--javascript-->
    <script src="web.js"></script>

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
   <div id="div1">
<a href="contacts.php" style="color: blue;font-size: 20px; margin-right:20px;">Our contacts</a>
<a href="history.php" style="color: blue;font-size: 20px;margin-right:20px;">Church History</a>
<a href="asserts.php" style="color: blue;font-size: 20px;margin-right:20px;">Asserts</a>

   <p class="reglogpara">

<a href="register.php"><button class="btn btn-primary" style="color:yellow;">Register</button></a>

<a href="login.php"><button class="btn btn-success"  style="color:red;margin-left:20%;">Login</button></a>

</p>

<div class="container">
<h2 style="text-align: centre; color:red; margin-left: 10%;">Join our Sunday Mass:9AM-11AM</h2>
<h4>Our Prayers</h4>
<p>Access the common catholic prayers from our website and more updated by our parish priest. </p>
<a href="prayers.php"><button style="color: indigo;">Access prayers without login</button></a>


<br>

<h4>Our Readings</h4>
<p>Access the weekly reading from our website and more updated by our parish priest. </p>
<a href="readings.php"><button style="color: indigo;">Access readings without login</button></a>
<br>

<h4>Our Parish Chatroom</h4>
<p>Share to everyone through our parish chatroom. Lets join hands in praising the lord.</p>

<br>
<h4>Parish Noticeboard</h4>
<p>Get Updated on what is going on in the parish.</p>

<br>


<h4>Connect with our Parish Priest</h4>
<p>Get to contact our priest without visiting physically. Ask him for prayer from anywhere.</p>

   </div>




</div>
<div class="container-fluid" style="background-color: white; margin-top: 5%;">
<p style="color: green;">Click the link below to see more on our church Assets.</p>

<a href="asserts.php">


<?php



    include('db.php');
    $sql="SELECT * FROM adminposts where category='asserts' ORDER BY ID DESC LIMIT 1";

    $data= mysqli_query($con,$sql);
    $queryResults= mysqli_num_rows($data);
    

    
    
    if($queryResults >0) {
        while($row = mysqli_fetch_assoc($data)) {
          if($row['imgname']){
                echo "
                <div >
                <div style='text-transform: uppercase;color: blue;font-weight: bold; text-align: centre;text-decoration: underline;margin-top: 4%;'>
                <h2>".$row['posttitle']."</h2>
                </div>
  
                <div  style='height: auto;   width:100%;padding: 0px; margin-top: 1%;font-size: 20px;'>
                <p>".$row['postbody']."</p>
                </div>
                 <div  style='height: 100%; width:100%;padding: 0px; border-radius: 0px; margin-top: 0%;'>
                <img src='Files/".$row['imgname']."' style = 'width: 100%; height:auto;'>

               
            </div>
                
                


              " ;

            }
             else{
                echo "
                
                <div >
                <div style='text-transform: uppercase;color: blue;font-weight: bold; text-align: centre;text-decoration: underline;margin-top: 4%;'>
                <h2>".$row['posttitle']."</h2>
                </div>
  
                <div  style='height: auto;   width:100%;padding: 0px; margin-top: 1%; font-size: 20px;'>
                <p>".$row['postbody']."</p>
                </div>
              
                ";
    

            }

        }
    }



	
		?>



</a>
<br><br>
<p style="color: green;">Click the link below to see more on our church History.</p>
<a href="history.php">


<?php



    include('db.php');
    $sql="SELECT * FROM adminposts where category='history' ORDER BY ID DESC LIMIT 1";

    $data= mysqli_query($con,$sql);
    $queryResults= mysqli_num_rows($data);
    

    
    
    if($queryResults >0) {
        while($row = mysqli_fetch_assoc($data)) {
          if($row['imgname']){
                echo "
                <div >
                <div style='text-transform: uppercase;color: blue;font-weight: bold; text-align: centre;text-decoration: underline;margin-top: 4%;'>
                <h2>".$row['posttitle']."</h2>
                </div>
  
                <div  style='height: auto;   width:100%;padding: 0px; margin-top: 1%;font-size: 20px;'>
                <p>".$row['postbody']."</p>
                </div>
                 <div  style='height: 100%; width:100%;padding: 0px; border-radius: 0px; margin-top: 0%;'>
                <img src='Files/".$row['imgname']."' style = 'width: 100%; height:auto;'>

               
            </div>
                
                


              " ;

            }
             else{
                echo "
                
                <div >
                <div style='text-transform: uppercase;color: blue;font-weight: bold; text-align: centre;text-decoration: underline;margin-top: 4%;'>
                <h2>".$row['posttitle']."</h2>
                </div>
  
                <div  style='height: auto;   width:100%;padding: 0px; margin-top: 1%; font-size: 20px;'>
                <p>".$row['postbody']."</p>
                </div>
              
                ";
    

            }

        }
    }



	
		?>



</a>

</div>
</body>
</html>