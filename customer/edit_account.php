<?php 

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$customer_fname = $row_customer['customer_fname'];
$customer_lname = $row_customer['customer_lname'];

$customer_email = $row_customer['customer_email'];

$customer_address = $row_customer['customer_address'];

$customer_image = $row_customer['customer_image'];

?>

<h1 align="center"> Edit Your Account </h1>

<form action="" method="post" enctype="multipart/form-data"><!-- form Begin -->
    
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Customer First Name: </label>
        
        <input type="text" name="c_fname" class="form-control" value="<?php echo $customer_fname; ?>" required>
        
    </div><!-- form-group Finish -->
     <div class="form-group"><!-- form-group Begin -->
        
        <label> Customer Last Name: </label>
        
        <input type="text" name="c_lname" class="form-control" value="<?php echo $customer_lname; ?>" required>
        
    </div><!-- form-group Finish -->
    
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Costumer Email: </label>
        
        <input type="text" name="c_email" class="form-control" value="<?php echo $customer_email; ?>" required>
        
    </div><!-- form-group Finish -->
    
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Costumer Address: </label>
        
        <input type="text" name="c_address" class="form-control" value="<?php echo $customer_address; ?>" required>
        
    </div><!-- form-group Finish -->
    
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Costumer Image: </label>
        
        <input type="file" name="c_image" class="form-control form-height-custom">
        
        <img class="img-responsive" style="width: 15%;" src="customer_images/<?php echo $customer_image; ?>" alt="Costumer Image" >
        
    </div><!-- form-group Finish -->
    
    <div class="text-center"><!-- text-center Begin -->
        
        <button name="update" class="btn btn-danger"><!-- btn btn-primary Begin -->
            
            <i class="fa fa-user-md"></i> Update Now
            
        </button><!-- btn btn-primary inish -->
        
    </div><!-- text-center Finish -->
    
</form><!-- form Finish -->

<?php 

if(isset($_POST['update'])){
    
    $update_id = $customer_id;
    
    $c_fname = $_POST['c_fname'];
     $c_lname = $_POST['c_lname'];
    
    $c_email = $_POST['c_email'];
    
    $c_address = $_POST['c_address'];
    
    $c_image = $_FILES['c_image']['name'];
    
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    
    move_uploaded_file ($c_image_tmp,"customer_images/$c_image");
    
    $update_customer = "update customers set customer_fname='$c_fname',customer_lname='$c_lname',customer_email='$c_email',customer_address='$c_address',customer_image='$c_image' where customer_id='$update_id' ";
    
    $run_customer = mysqli_query($con,$update_customer);
    
    if($run_customer){
        
        echo "<script>alert('Your account has been edited, to complete the process, please Relogin')</script>";
        
        echo "<script>window.open('logout.php','_self')</script>";
        
    }
    
}

?>