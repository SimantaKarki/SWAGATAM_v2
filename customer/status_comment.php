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
        <a href="forum.php"> Forum</a>
       </li>
     </ul><!-- breadcrumb Finish -->

   </div><!-- col-md-12 Finish -->
   <div class="box" id="details"><!-- box Begin -->
    <h4 style="color: black; font-family: fantasy;">Status:</h4>


    <?php

    if(isset($_GET['status_id'])){

      $id = $_GET['status_id'];
    }

      $get_status = "select * from forum where id='$id'";

      $run_status = mysqli_query($con,$get_status);
      $row_status=mysqli_fetch_array($run_status);
      $status_id=$row_status['id'];
      $cu_name = $row_status['cu_name'];
      $time=$row_status['status_at'];
      $c=$row_status['status'];

      ?>
      <dl>
        <dt><?php echo"$cu_name($time):";?></dt>
        <dd>&#8702<?php echo"$c";?></dd>
      </dl>
      <hr>
     
    <h4 style="color: black; font-family: fantasy;">Comment on status:</h4>

    <form action="" method="post" enctype="multipart/form-data">

      <textarea rows="4" cols="40" name="comment" placeholder="comment here" required="required"></textarea><br>
      <input class="btn btn-danger" type="submit" name="review" value="COMMENT">

    </form><hr>
    <?php
    $get_service = "select * from status_comment where status_id=$status_id";
    
    $run_service = mysqli_query($con,$get_service);
    
    while($row_service=mysqli_fetch_array($run_service)){
     $cu_name = $row_service['cu_name'];
     $time=$row_service['comment_at'];
     $c=$row_service['comment'];

     ?>
     <dl>
      <dt><?php echo"$cu_name($time):";?></dt>
      <dd>&#8702<?php echo"$c";?></dd>
    </dl>

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
       $get_re = "select * from forum where id='$status_id'";

      $run_r = mysqli_query($con,$get_re);

      $row_r = mysqli_fetch_array($run_r);

      $count_r = $row_r['count_comment'];
if(isset($_POST['review'])){

$comment=$_POST['comment'];
$insert_review = "insert into status_comment (cu_name,comment,comment_at,status_id) values ('$cu_name','$comment',NOW(),'$status_id')";

 $run_review = mysqli_query($con,$insert_review);
        
        if($run_review){
          $count_r=$count_r+1;
          $update_product = "update forum  set count_comment='$count_r' where id='$status_id'";
        
        $run_product = mysqli_query($con,$update_product);
            
        echo "<script>alert('Commented Successfully')</script>"; 
            
        echo "<script>window.open('status_comment.php?status_id=$status_id','_self')</script>"; 
            
        }
    

  }

  ?>