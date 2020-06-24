<?php 


$active='booking';

include("includes/header.php");


?>

<?php 

if(isset($_GET['s_id'])){
    
    $s_id = $_GET['s_id'];
    
    $get_product = "select * from services where s_id='$s_id'";
    
    $run_product = mysqli_query($con,$get_product);
    
    $row_products = mysqli_fetch_array($run_product);
    
    $p_cat_id = $row_products['s_cat_id'];
    
    $pro_title = $row_products['s_title'];
    
    $pro_price = $row_products['s_price'];
    
    $pro_desc = $row_products['s_desc'];
    
    $pro_img1 = $row_products['s_img1'];
    
    $pro_img2 = $row_products['s_img2'];
    
    $pro_img3 = $row_products['s_img3'];

   
    
    $get_p_cat = "select * from categories where cat_id='$p_cat_id'";
    
    $run_p_cat = mysqli_query($con,$get_p_cat);
    
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    
    $cat_title = $row_p_cat['cat_title'];
    
}

?>
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Explore
                   </li>
                   
                   <li>
                       <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $cat_title; ?></a>
                   </li>
                   <li> <?php echo $pro_title; ?> </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-12"><!-- col-md-12 Begin -->
               <div id="productMain" class="row"><!-- row Begin -->
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div id="mainImage"><!-- #mainImage Begin -->
                           <div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- carousel slide Begin -->
                               <ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                                   <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
                                   <li data-target="#myCarousel" data-slide-to="1"></li>
                                   <li data-target="#myCarousel" data-slide-to="2"></li>
                               </ol><!-- carousel-indicators Finish -->
                               
                               <div class="carousel-inner">
                                   <div class="item active">
                                       <center><img class="img-responsive" src="../admin/product_images/<?php echo $pro_img1; ?>" alt="Product 3-a" style='height:600px; width:600px;'></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="../admin/product_images/<?php echo $pro_img2; ?>" alt="Product 3-b" style='height:600px; width:600px;'></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="../admin/product_images/<?php echo $pro_img3; ?>" alt="Product 3-c" style='height:600px; width:600px;'></center>
                                   </div>
                               </div>
                               
                               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->
                                   <span class="glyphicon glyphicon-chevron-left"></span>
                                   <span class="sr-only">Previous</span>
                               </a><!-- left carousel-control Finish -->
                               
                               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- right carousel-control Begin -->
                                   <span class="glyphicon glyphicon-chevron-right"></span>
                                   <span class="sr-only">Next</span>
                               </a><!-- right carousel-control Finish -->
                               
                           </div><!-- carousel slide Finish -->
                       </div><!-- mainImage Finish -->

                           

                   </div><!-- col-sm-6 Finish -->
                   
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div class="box"><!-- box Begin -->
                           <h1 class="text-center" style="margin: 5px 0px;"> <?php echo "$pro_title"; ?> </h1>
                           
                           <?php add_cart(); ?>
                           
                           <form method="post" action="details.php?add_cart=<?php echo $s_id; ?>" class="form-horizontal" enctype="multipart/form-data" ><!-- form-horizontal Begin -->
                               <div class="form-group"><!-- form-group Begin -->
                                   <label for="" class="col-md-5 control-label">Booking Dates:</label>
                                   
                                   <div class="col-md-7"><!-- col-md-7 Begin -->
                                           <input type="Date"  name="check-in" placeholder="Check-in" style="box-shadow: 5px 5px #88888888;border-radius: 5px; margin-left: -15px;" required="required">&#8702
                                           <input type="Date" name="check-out" placeholder="Check-out" style="box-shadow: 5px 5px #88888888;border-radius: 5px;position: absolute; margin:0px 5px; " required="required">
                                   
                                    </div><!-- col-md-7 Finish -->
                                   
                               </div><!-- form-group Finish -->
                               
                               <!-- <div class="form-group"><!- form-group Begin -->
                                 <!-- /  <label class="col-md-5 control-label">No of Guests:</label> -->
                                   
                                   <!-- <div class="col-md-7">col-md-7 Begin -->
                                       
                                     <!-- <input type="number" name="noofguest" style="border-radius: 5px;box-shadow: 5px 5px #88888888;" required="required"> -->
                                       
                                   <!-- </div>col-md-7 Finish -->
                               <!-- </div>form-group Finish -->
                              
                               <?php 

              

                                        echo "

                                            <p class='price'>

                                            PRICE: $$pro_price&nbsp / night

                                            </p>

                                        ";

                                    


                               ?>
                               
                               <p class="text-center buttons"><input class="btn btn-danger i fa fa-shopping-cart" type="submit" name="reserve" value="Add to Booking Cart"></p>
                               
                           </form><!-- form-horizontal Finish -->
                           
                       </div><!-- box Finish -->
                        
                   </div><!-- col-sm-6 Finish -->

                    <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div class="box"><!-- box Begin -->
                           <label class="col-md-5 control-label">Availability Calendar:</label>
                           <script type="text/javascript" src="https://www.availabilitycalendar.com/embed-js/XCx5AlWan6bdxWh4QE9B/en-0-0-1-1-0-0-0-0-0-0-0-1-0/"></script>
                       </div><!-- box Finish -->
                        
                   </div>
                   
                   
               </div><!-- row Finish -->
               
               <div class="box" id="details"><!-- box Begin -->
                       
                       <h4 style="color: black; font-family: fantasy;">Comments and Review:</h4>
                   
                 <form action="details.php?s_id=<?php echo"$s_id"?>" method="post" enctype="multipart/form-data">
                   
                      <textarea rows="4" cols="50" name="comment" placeholder="comment here" required="required"></textarea><br>
                       <input class="btn btn-danger" type="submit" name="review" value="COMMENT">
                      
                   </form><hr>
                    <?php
                       $get_service = "select * from review where s_id=$s_id";
    
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

               <div class="box" id="details"><!-- box Begin -->
                       
                       <h4 style="color: black; font-family: fantasy;">Where will you be?</h4>
                   
                       <div id="map"></div>
<!-- Replace the value of the key parameter with your own API key. -->
  

                   
               </div><!-- box Finish -->
               
               <div id="row same-heigh-row"><!-- #row same-heigh-row Begin -->
                   <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Begin -->
                       <div class="box same-height headline"><!-- box same-height headline Begin -->
                           <h3 class="text-center">Similar Services You may like.</h3>
                       </div><!-- box same-height headline Finish -->
                   </div><!-- col-md-3 col-sm-6 Finish -->
                   
                   <?php 
                   
                     $get_service = "select * from services  order by 1 DESC LIMIT 0,3";
    
    $run_service = mysqli_query($db,$get_service);
    
    while($row_service=mysqli_fetch_array($run_service)){
        
        $s_id = $row_service['s_id'];
        
        $s_title = $row_service['s_title'];
        
        $s_price = $row_service['s_price'];
        
        $s_img1 = $row_service['s_img1'];

        $host_name = $row_service['host_name'];
        $desc=$row_service['s_desc'];
        $address=$row_service['address'];

        $get_host = "select * from hosts where host_title='$host_name'";

        $run_host = mysqli_query($db,$get_host);

        $row_host = mysqli_fetch_array($run_host);

        $host_title = $row_host['host_title'];

        $get_fav = "select * from wishlist where s_id='$s_id'";

        $run_fav = mysqli_query($db,$get_fav);

        $row_fav = mysqli_fetch_array($run_fav);
        if($row_fav>0){

        $fav = $row_fav['is_fav'];
    }
    else{
        $fav=0;
    }
                             
                                // <p class='btn btn-primary'> $manufacturer_title </p>
                    echo "
                    
        
         <div class='col-md-3 col-sm-5'>
        
            <div class='product'>";
            if($fav==1){
          echo " <a href='check_wish.php?s_id=$s_id'>
                <button class='btn btn-outline-danger' style='position:absolute; z-index:9;margin:3px 205px;border-radius:50%;'><i class='fa fa-heart' id = 'heart$s_id' style='font-size:13px;color:red; '></i></button></a>";
            }
            else{
            echo " <a href='check_wish.php?s_id=$s_id'>
                <button class='btn btn-outline-danger' style='position:absolute; z-index:9;margin:3px 205px;border-radius:50%;'><i class='fa fa-heart' id = 'heart$s_id' style='font-size:13px; '></i></button></a>";
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
                        <a href='details.php?s_id=$s_id' style = 'float :right; color:red'>
                            <i class='fa fa-star'></i> review
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
                   
                   ?>
                   
               </div><!-- #row same-heigh-row Finish -->
               
           </div><!-- col-md-12 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    <script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkUOdZ5y7hMm0yrcCQoCvLwzdM6M8s5qk&callback=initMap">
</script>
    <script type="text/javascript">
      function initMap() {
  // The location of Uluru
  var uluru = {lat: 28.3949, lng: 84.1240};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
    </script>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>
<?php 

 $s_id = $_GET['s_id'];
$customer_session = $_SESSION['customer_email'];

      $get_customer = "select * from customers where customer_email='$customer_session'";

      $run_customer = mysqli_query($con,$get_customer);

      $row_customer = mysqli_fetch_array($run_customer);
      $cu_id=$row_customer['customer_id'];
      $cu_name = $row_customer['customer_fname']." ".$row_customer['customer_lname'];
       $get_re = "select * from services where s_id='$s_id'";

      $run_r = mysqli_query($con,$get_re);

      $row_r = mysqli_fetch_array($run_r);

      $count_r = $row_r['review'];
if(isset($_POST['review'])){

$comment=$_POST['comment'];
$insert_review = "insert into review (cu_name,comment,comment_at,s_id) values ('$cu_name','$comment',NOW(),'$s_id')";

 $run_review = mysqli_query($con,$insert_review);
        
        if($run_review){
          $count_r=$count_r+1;
          $update_product = "update services  set review='$count_r' where  s_id='$s_id'";
        
        $run_product = mysqli_query($con,$update_product);
            
        echo "<script>alert('Commented Successfully')</script>"; 
            
        echo "<script>window.open('details.php?s_id=$s_id','_self')</script>"; 
            
        }
    

  }

  ?>