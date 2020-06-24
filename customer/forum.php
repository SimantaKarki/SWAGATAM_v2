<?php
$active = 'forum';
include("includes/header.php");

?>
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Forum
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           <div class="box" id="details"><!-- box Begin -->
                       
                       <h4 style="color: black; font-family: fantasy;">Post Your Status:</h4>
                   
                 <form action="" method="post" enctype="multipart/form-data">
                   
                      <textarea rows="4" cols="50" name="status" placeholder="Write status" required="required"></textarea><br>
                       <input class="btn btn-danger" type="submit" name="post" value="POST">
                      
                   </form><hr>
                    <?php
                       $get_status = "select * from forum ";
    
             $run_status = mysqli_query($con,$get_status);
    
            while($row_status=mysqli_fetch_array($run_status)){
              $status_id=$row_status['id'];
                       $cu_name = $row_status['cu_name'];
                        $time=$row_status['status_at'];
                        $c=$row_status['status'];
                        $count=$row_status['count_comment'];
  
                    ?>
                    <dl>
                      <dt><?php echo"$cu_name($time):";?></dt>
                      <dd>&#8702<?php echo"$c";?></dd>
                    </dl>
                       <a href="status_comment.php?status_id= <?php echo "$status_id"; ?>" style="text-decoration: none;"><strong><?php echo "$count "; ?>comment</strong></a>
                       <hr>
                       <?php
                     }

                       ?>
               </div><!-- box Finish -->
      
       </div><!-- container Finish -->
        
   </div><!-- #content Finish -->
   
   <?php 
    
    include("../includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>
<?php 


$customer_session = $_SESSION['customer_email'];

      $get_customer = "select * from customers where customer_email='$customer_session'";

      $run_customer = mysqli_query($con,$get_customer);

      $row_customer = mysqli_fetch_array($run_customer);
      $cu_id=$row_customer['customer_id'];
      $cu_name = $row_customer['customer_fname']." ".$row_customer['customer_lname'];
       
if(isset($_POST['post'])){

$status=$_POST['status'];
$insert_status = "insert into forum (cu_name,status,status_at,c_id) values ('$cu_name','$status',NOW(),'$cu_id')";

 $run_status = mysqli_query($con,$insert_status);
        
        if($run_status){
            
        echo "<script>alert('Posted Successfully')</script>"; 
            
        echo "<script>window.open('forum.php','_self')</script>"; 
            
        }
    

  }

  ?>