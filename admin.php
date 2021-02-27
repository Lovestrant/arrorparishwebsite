<?php
session_start();

?>

<?php
if($_SESSION['phonenumber']){

        include('db.php');



        if (isset($_POST['postbtn'])) {
        if(!empty($_POST['category']) && !empty($_POST['posttitle']) && !empty($_POST['postbody']) && !empty($_FILES['file']['name'])){
            $imgname = $_FILES['file']['name'];
            $tmp = $_FILES['file']['tmp_name'];

            $category = $_POST['category'];
            $posttitle = $_POST['posttitle'];
            $postbody = $_POST['postbody'];
        
            
            
            move_uploaded_file($tmp,"Files/".$imgname);
        
            
            $sql = "INSERT INTO adminposts(category, posttitle, postbody, imgname) VALUES ('$category', '$posttitle','$postbody','$imgname')";
            $res = mysqli_query($con,$sql);
            

            if($res ==1){
                echo "<script>alert('Posting success')</script>";
            }

        }elseif(!empty($_POST['category']) && !empty($_POST['posttitle']) && empty($_POST['postbody']) && !empty($_FILES['file']['name'])){

            $imgname = $_FILES['file']['name'];
            $tmp = $_FILES['file']['tmp_name'];
            
            
            $category = $_POST['category'];
            $posttitle = $_POST['posttitle'];

            move_uploaded_file($tmp,"Files/".$imgname);

            $sql = "INSERT INTO adminposts(category, posttitle, imgname) VALUES ('$category', '$posttitle','$imgname')";
            $res = mysqli_query($con,$sql);
            

            if($res ==1){
                echo "<script>alert('Posting success')</script>";
            }
        }elseif(!empty($_POST['category'])   && !empty($_POST['posttitle']) && !empty($_POST['postbody']) && empty($_FILES['file']['name'])){


            $postbody = $_POST['postbody'];
            $category = $_POST['category'];
            $posttitle = $_POST['posttitle'];



            $sql = "INSERT INTO adminposts(category, posttitle, postbody) VALUES ('$category', '$posttitle','$postbody')";
            $res = mysqli_query($con,$sql);
            

            if($res ==1){
                echo "<script>alert('Posting success')</script>";
            }
        }elseif(empty($_POST['category']) || empty($_POST['posttitle'])){
            echo "<script>alert('Error: Please make sure you categorize and added a title to your post.')</script>";
            echo "<script>location.replace('admin.php');</script>";
        }
        else{
            echo "<script>alert('No content to post.')</script>";
        }

        }

}else{
    echo "<script>alert('You are not logged in.')</script>";
    echo "<script>location.replace('index.php')</script>";
 }
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
   <link rel="stylesheet" type="text/css" href="admin.css">
<!-- google icons link-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<!--Jquery links-->
<script
		src="https://code.jquery.com/jquery-3.5.1.min.js"
		integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
		crossorigin="anonymous"></script>
	<script src="js/emojionearea.min.js"></script>

    <!--Emojis links-->
    <script src="js/emojionearea.min.js"></script>
	<script src="js/emojionearea.js"></script>
    <link rel="stylesheet" type="text/css" href="css/emojionearea.min.css">

</head>

<script>
	
    $(document).ready(function () {
        $('#postinput').emojioneArea({
            pickerPosition: "bottom"
            
        
        })
    })
    
</script>

</head>

<body>
<div class="container-fluid">
<h1>ARROR CATHOLIC PARISH</h1>
<h3>Let Your Light Shine</h3>


<div style="background-color: transparent;width: 100%;">



<a href="prayersadmin.php"><button class="btn btn-primary" style="margin-left:0%;">Prayers</button></a>
<a href="readingsadmin.php"><button class="btn btn-secondary"  style="margin-left:5%;">Readings</button></a>
<a href="parishnoticeadminboard.php"><button class="btn btn-info"  style="margin-left:5%;">Noticeboard</button></a>
<a href="chatroom.php"><button class="btn btn-danger"  style="margin-left:5%;">Chatroom</button></a>
<a href="messages.php"><button class="btn btn-warning"  style="margin-left:5%;">Messages</button></a>




</div>
</div>
</div>
<div class="container">




    <h2>Create your Post here.</h2>
    <form class="form-control" action="admin.php" enctype="multipart/form-data" method="post">

        <p>Categorize your post below (This is required)</p>
       
        <input class="form-check-input" type="radio" name="category" value="prayer" >prayer
        <input class="form-check-input" type="radio" name="category" value="reading" >reading
        <input class="form-check-input" type="radio" name="category" value="noticeboard">noticeboard

        
            <br><br>

        <input class="form-control" type="text" name="posttitle" placeholder="Enter the post title.">

        <br><br>

        <textarea id="postinput" class="form-control" type="text" name="postbody" placeholder="Enter the post body."></textarea>
            <br>
            <label>Attach image:</label> <input name="file" type="file" id="file" accept="image/*">
            <br><br>
        <button class="btn btn-success" name="postbtn" type="submit">Post</button>

    </form>
 


    </div>
</div>

</body>
</html>
