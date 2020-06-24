
<?php

$active = 'Home';
include("includes/header.php");

?>




<div id="advantages">
    <!-- #advantages Begin -->

    <div class="container">
        <!-- container Begin -->

<div id="hot">
    <!-- #hot Begin -->

    <div class="box">
        <!-- box Begin -->

        <div class="container">
            <!-- container Begin -->

            <div class="col-md-12">
                <!-- col-md-12 Begin -->

                <h2>
                    Your search
                </h2>

            </div><!-- col-md-12 Finish -->

        </div><!-- container Finish -->

    </div><!-- box Finish -->

</div><!-- #hot Finish -->

<div id="content" class="container">
    <!-- container Begin -->

    <div class="row justify-content-center">
        <!-- row Begin -->

        <?php

       if(isset($_GET['search'])){
    $se = $_GET['user_query'];
    $s=substr($se,0,4);
$i=0;
$search="select * from services where LOCATE('$s',address )";

$run=mysqli_query($con,$search);
 while($row_service=mysqli_fetch_array($run)){

    $i++;
        $s_id = $row_service['s_id'];
        
        $s_title = $row_service['s_title'];
        
        $s_price = $row_service['s_price'];
        
        $s_img1 = $row_service['s_img1'];
        $nm=$row_service['review'];
        $host_name = $row_service['host_name'];
        $desc=$row_service['s_desc'];
        $address=$row_service['address'];

        $get_host = "select * from hosts where host_title='$host_name'";

        $run_host = mysqli_query($db,$get_host);

        $row_host = mysqli_fetch_array($run_host);

        $host_title = $row_host['host_title'];

       $get_fav = "select * from wishlist where s_id='$s_id' and cu_id='$cu_id'";

        $run_fav = mysqli_query($db,$get_fav);
        $fav=0;
        if($run_fav){
        $row_fav = mysqli_fetch_array($run_fav);

        if($row_fav>0){

        $fav = $row_fav['is_fav'];
    }
    else{
        $fav=0;
    }
}

   
        
        // <p class='btn btn-primary'> $manufacturer_title </p>

        echo "
        
         <div class='col-md-3 col-sm-5'>
        
            <div class='product'>";
            if($fav==1){
          echo " <a href='check_wish.php?s_id=$s_id'>
                <button class='btn btn-outline-danger' style='position:absolute; z-index:9;margin:3px 75px;border-radius:50%;'><i class='fa fa-heart' id = 'heart$s_id' style='font-size:13px;color:red; '></i></button></a>";
            }
            else{
            echo " <a href='check_wish.php?s_id=$s_id'>
                <button class='btn btn-outline-danger' style='position:absolute; z-index:9;margin:3px 75px;border-radius:50%;'><i class='fa fa-heart' id = 'heart$s_id' style='font-size:13px; '></i></button></a>";
            }
            echo "
                <a href='details.php?s_id=$s_id'>
                    <img class='img-responsive' src='../admin/product_images/$s_img1' style='height:504px; width:480px; border-radius:10px'>

                
                </a>
                
                <div class='text'>

                <center>
                                 
                </center>
                
                    <h5>
            
                        <a href='details.php?s_id=$s_id'>

                              $address 
                        </a>
                        <a  href='details.php?s_id=$s_id' style = 'float :right; color:red'>
                           <i >$nm</i> review
                            </a>
                    
                    </h5>
                    <p class='button'>
                    
                        <a class='#' href='details.php?s_id=$s_id'>

                            $desc
                    </a>
                         
                    </p>
                <center><strong>$$s_price</strong> / night</center>
                </div>

            </div>
        
        </div>
        ";
        
    }

}
if($i==0){

     echo "<script>alert('No Services Found.')</script>";
}

        ?>

    </div><!-- row Finish -->

</div><!-- container Finish -->

<?php

include("includes/footer.php");

?>

<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>


</body>

</html>