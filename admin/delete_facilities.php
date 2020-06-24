<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_facilities'])){
        
        $delete_id = $_GET['delete_facilities'];
        
        $delete_pro = "delete from services where s_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_pro);
        
        if($run_delete){
            
            echo "<script>alert('One of your facilities has been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_facilities','_self')</script>";
            
        }
        
    }

?>

<?php } ?>