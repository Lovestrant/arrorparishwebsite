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


    <h2 style="color:red;">Delete page. Please be sure of what you want to delete before you do.</h2>
 

<div class="readingsdiv">


<?php
if($_SESSION['phonenumber']){

 

    include('db.php');
    $id=$_GET['u_id'];
    $sql="SELECT * FROM adminposts where id = $id";

    $data= mysqli_query($con,$sql);
    $queryResults= mysqli_num_rows($data);
    

    
    
    if($queryResults >0) {
        while($row = mysqli_fetch_assoc($data)) {
          if($row['imgname']){
                echo "
                <div >
                <div style='color: green;font-weight: bold; text-align: centre;text-decoration: underline;margin-top: 4%;'>
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
                <div style='color: green;font-weight: bold; text-align: centre;text-decoration: underline;margin-top: 4%;'>
                <h2>".$row['posttitle']."</h2>
                </div>
  
                <div  style='height: auto;   width:100%;padding: 0px; margin-top: 1%; font-size: 20px;'>
                <p>".$row['postbody']."</p>
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
<form action="deletepage.php" method="post">
<input type="hidden" name= "hiddenid" value=<?php echo $id; ?>>
<p style="margin:30px; text-align: right;">
<button class="btn btn-danger" name="deletebtn" style="margin:30px; text-align: centre;">Delete the above post</button>


</p>
</form>

    </div>
</div>

</body>
</html>
<?php

if(isset($_POST['deletebtn'])){

include('db.php');
$postid = $_POST['hiddenid'];
$sql1="DELETE FROM adminposts where id = '$postid'";

$data= mysqli_query($con,$sql1);
if($data ==1) {
    echo "<script>alert('Post Deleted successfully.')</script>";
    echo "<script>location.replace('admin.php')</script>";
}


}


?>