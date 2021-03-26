<?php
session_start();

?>


<?php
if(isset($_GET['offset']) && isset($_GET['limit'])){
    $limit = $_GET['limit'];
    $offset = $_GET['offset'];

  
    include('db.php');
    $sql="SELECT * FROM parishchat ORDER BY ID DESC LIMIT {$limit} OFFSET {$offset}";

    $data= mysqli_query($con,$sql);
    $queryResults= mysqli_num_rows($data);
    
    
    
    
    if($queryResults >0) {
        while($row = mysqli_fetch_assoc($data)) {
           

if($row['phonenumber']== $_SESSION['phonenumber']){
    echo "
                
                
    <div style='height: auto; width:50%; margin: 20px; padding: 10px;background-color: lightblue; margin-left:50%;
     border-radius: 10px; border-radius: 10px; '>
     <p style='color: blue; margin:0;'>".$row['firstname']."-".$row['lastname']."</p>
     <p style='color: orange;'>".$row['phonenumber']."<br></p>
     ".$row['chattext']."</div>
  

    ";

}else{
    echo "
                
                
    <div style='height: auto; width:50%; margin: 20px; padding: 10px;background-color: lightgreen; 
     border-radius: 10px; border-radius: 10px; '>
     <p style='color: blue; margin:0;'>".$row['firstname']."-".$row['lastname']."</p>
     <p style='color: orange;'>".$row['phonenumber']."<br></p>
     ".$row['chattext']."</div>
  

    ";

}
         
       
               

            }

        }
    }



?>