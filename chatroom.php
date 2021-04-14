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



<!--Jquery links-->
<script
		src="https://code.jquery.com/jquery-3.5.1.min.js"
		integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
		crossorigin="anonymous"></script>
	<script src="js/emojionearea.min.js"></script>


 
    <script>
			//Jquery code to load 30 posts at a time

        $(document).ready(function(){
            var flag = 0;
            $.ajax({
                type: "GET",
                url: "loadchatroomposts.php",
                data: {
                    'offset': 0,
                    'limit': 30
                },
                success: function(data){
                    $('.chatareadiv').append(data);
                    flag +=30;
                }
            });

            $(window).scroll(function(){
                if ($(window).scrollTop() >= $(document).height() - $(window).height()) {
                        $.ajax({
                        type: "GET",
                        url: "loadchatroomposts.php",
                        data: {
                            'offset': flag,
                            'limit': 30
                        },
                        success: function(data){
                            $('.chatareadiv').append(data);
                            flag +=30;
                        }
                    });
                }
                
            });
            
        });

       
            
       
</script>




    <!--Emojis links-->
    <script src="js/emojionearea.min.js"></script>
	<script src="js/emojionearea.js"></script>
    <link rel="stylesheet" type="text/css" href="css/emojionearea.min.css">

</head>

<script>
	
    $(document).ready(function () {
        $('#chatinput').emojioneArea({
            pickerPosition: "bottom"
            
        
        })
    })
    
</script>








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


    <h2>Parish Chatroom.</h2>
 
    <form  action="chatroom.php" method="post">
    <p class="postparagraph">
    <textarea id="chatinput" class="form-control"  name="chatinput" type="text" placeholder="Chat now..."></textarea>

    <p><button class="btn btn-success" type="submit" name="submitchat">Chat</button></p>

    </p>

</form>


<div class="chatareadiv">


</div>



    </div>
</div>

</body>
</html>

<?php
if($_SESSION['phonenumber']){

        include('db.php');


        if(isset($_POST['submitchat'])){

            $chattext = $_POST['chatinput'];
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $phonenumber = $_SESSION['phonenumber'];

            if(!empty($chattext)){

                $sql = "INSERT INTO parishchat(firstname, lastname, phonenumber, chattext) VALUES ('$firstname', '$lastname','$phonenumber','$chattext')";
                $res = mysqli_query($con,$sql);
                
            
                if($res ==1){
                // echo "<script>alert('Chat success')</script>";
                    echo "<script>location.replace('chatroom.php')</script>";
                }
            

            }else{
                echo "<script>alert('Type something to share.')</script>";
                echo "<script>location.replace('chatroom.php')</script>";
            }
        }


}else{
    echo "<script>alert('You are not logged in.')</script>";
    echo "<script>location.replace('index.php')</script>";
 }

?>