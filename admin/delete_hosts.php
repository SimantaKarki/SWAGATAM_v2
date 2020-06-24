<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_hosts'])){
        
        $delete_id = $_GET['delete_hosts'];
        
        $delete_host = "delete from hosts where host_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_host);
        
        if($run_delete){
            
            echo "<script>alert('One of your host has been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_hosts','_self')</script>";
            
        }
        
    }

?>

<?php } ?>