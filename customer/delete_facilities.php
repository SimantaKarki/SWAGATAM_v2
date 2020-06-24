
<?php 
include("includes/db.php");
    if(isset($_GET['delete_facilities'])){
        
        $delete_id = $_GET['delete_facilities'];
        
        $delete_pro = "delete from services where s_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_pro);
        
        if($run_delete){
            
            echo "<script>alert('One of your facilities has been Deleted')</script>";
            
            echo "<script>window.open('my_account.php?my_service','_self')</script>";
            
        }
        
    }

?>
