<?php
$active = 'host';
include("includes/db.php");
session_start();
$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$cu_id = $row_customer['customer_id'];
$s_id=$_GET['s_id'];
$get_fav = "select * from wishlist where s_id='$s_id' and cu_id='$cu_id'";

        $run_fav = mysqli_query($con,$get_fav);

        $row_fav = mysqli_fetch_array($run_fav);
        if($row_fav>0){

        $fav = $row_fav['is_fav'];

   if($fav==1){
   		$update_wish = "delete from wishlist where s_id='$s_id'";
   		$run_wish = mysqli_query($con,$update_wish);
if($run_wish){
        
        echo "<script>alert('Removed from Wishlist')</script>";
        
        echo "<script>window.open('index.php','_self')</script>";
        
    }

   }  

  }
  else{
$insert_wish = "insert into wishlist (is_fav,cu_id,s_id) values ('1','$cu_id','$s_id')";
    
    $run_wish = mysqli_query($con,$insert_wish);
    
    if($run_wish){
        
        echo "<script>alert('Added to wishlist sucessfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
        
    }

  }

?>