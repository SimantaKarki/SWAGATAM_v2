<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php  

        if(isset($_GET['edit_hosts'])){

            $edit_hosts = $_GET['edit_hosts'];
            $get_hosts = "select * from hosts where host_id='$edit_hosts'";
            $run_hosts = mysqli_query($con,$get_hosts);
            $row_hosts = mysqli_fetch_array($run_hosts);

            $m_id = $row_hosts['host_id'];
            $m_title = $row_hosts['host_title'];
            $m_email=$row_hosts['host_email'];
            $m_contact=$row_hosts['host_contact'];
            $m_top = $row_hosts['host_top'];
            $m_image = $row_hosts['host_image'];

        }

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Update Hosts
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-money fa-fw"></i> Update Host
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group 1 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                        Host Name 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="host_name" type="text" class="form-control" value="<?php echo $m_title; ?>">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 1 finish -->
                    <div class="form-group"><!-- form-group 1 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                        Host Email 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="host_email" type="text" class="form-control" value="<?php echo $m_email; ?>">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 1 finish -->
                    <div class="form-group"><!-- form-group 1 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                        Host Contact 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="host_contact" type="text" class="form-control" value="<?php echo $m_contact; ?>">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 1 finish -->
                    <div class="form-group"><!-- form-group 2 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Choose As Top Host
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="host_top" type="radio" value="yes"

                                <?php 
                                
                                    if($m_top=='no'){}else{echo "checked='checked'";}
                                
                                ?>
                            
                            >
                            <label>Yes</label>
                        
                            <input name="host_top" type="radio" value="no"
                            
                                <?php 
                                
                                    if($m_top=='no'){echo "checked='checked'";}
                                
                                ?>
                            
                            >
                            <label>No</label>
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 2 finish -->
                    <div class="form-group"><!-- form-group 3 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                        Host Image
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="file" name="host_image" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="other_images/<?php echo $m_image; ?>" alt="<?php echo $m_image; ?>">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 3 finish -->
                    <div class="form-group"><!-- form-group 4 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --></label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="submit" name="update" value="Update Host" class="btn btn-primary form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 4 finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php  

    if(isset($_POST['update'])){
        
        $host_name = $_POST['host_name'];
        
        $host_top = $_POST['host_top'];
        $host_email = $_POST['host_email'];

        $host_contact = $_POST['host_contact'];

        if(is_uploaded_file($_FILES['host_image']['tmp_name'])){
        
            $host_image = $_FILES['host_image']['name'];
            
            $temp_name = $_FILES['host_image']['tmp_name'];
                
            move_uploaded_file($temp_name,"host_image/$host_image");
            
            $update_host = "update hosts set host_title='$host_name',host_top='$host_top',host_image='$host_image',host_email='$host_email',host_contact='$host_contact' where host_id='$m_id'" ;
            
            $run_host = mysqli_query($con,$update_host);

            if($run_host){
            
                echo "<script>alert('Host has been updated')</script>";
                
                echo "<script>window.open('index.php?view_hosts','_self')</script>";

            }

        }else{
            
            $update_host = "update hosts set host_title='$host_name',host_top='$host_top' where host_id='$m_id'" ;
            
            $run_host = mysqli_query($con,$update_host);

            if($run_host){
            
                echo "<script>alert('Host has been updated')</script>";
                
                echo "<script>window.open('index.php?view_hosts','_self')</script>";

            }

        }
        
    }

?>

<?php } ?>