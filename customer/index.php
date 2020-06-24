<?php

$active = 'Home';

include("includes/header.php");

?>


<div id="advantages">
    <!-- #advantages Begin -->
    <div class="container">
        <div class="col-md-12">
            <div class="box same-height">
<?php

if (!isset($_SESSION['customer_email'])) {

    echo "Welcome: Guest";
} else {

$customer_session = $_SESSION['customer_email'];

      $get_customer = "select * from customers where customer_email='$customer_session'";

      $run_customer = mysqli_query($con,$get_customer);

      $row_customer = mysqli_fetch_array($run_customer);

      $cu_name = $row_customer['customer_fname'];

    echo "<h4 style='color:black;'>Welcome: " . $cu_name . "</h4><p>We encourage all travelers to visit our help center and read our terms and condition before booking.</p><a href='terms.php'>Terms and Condition</a>";
}

?>
</div>
</div>
</div>
    <div class="container">
        <!-- container Begin -->

        <div class="same-height-row">
            <!-- same-height-row Begin -->

            <?php

            $get_boxes = "select * from boxes_section";
            $run_boxes = mysqli_query($con, $get_boxes);

            while ($run_boxes_section = mysqli_fetch_array($run_boxes)) {

                $box_id = $run_boxes_section['box_id'];
                $box_title = $run_boxes_section['box_title'];
               $box_image = $run_boxes_section['box_image'];
                ?>

                <div class="col-sm-4">
                    <!-- col-sm-4 Begin -->

                    <div class="box same-height">
                        <!-- box same-height Begin -->
                        <div class="img" style="width: 15%; float: left; margin:-10px">
                            <img src="../admin/other_images/<?php echo $box_image; ?>" style="width: 90px; border-radius: 5px;"> 
                        </div>
                        <h4><a href="<?php echo"$box_title"?>.php"><?php echo $box_title; ?></a></h4>

                    </div><!-- box same-height Finish -->
                </div><!-- col-sm-4 Finish -->

            <?php    } ?>

        </div><!-- same-height-row Finish -->

    </div><!-- container Finish -->

</div><!-- #advantages Finish -->

<div id="hot">
    <!-- #hot Begin -->

    <div class="no-box">
        <!-- box Begin -->

        <div class="container">
            <!-- container Begin -->

            <div class="col-md-12">
                <!-- col-md-12 Begin -->

                <h3 style="float: left;">
                    <b>Introducing Swagatam Services</b>
                </h3>

            </div><!-- col-md-12 Finish -->

        </div><!-- container Finish -->

    </div><!-- box Finish -->

</div><!-- #hot Finish -->

<div id="content" class="container">
    <!-- container Begin -->
    <h4 style="color: black; font-family: monospace;"><b>Swagatam Homestay</b><br><h5 style="font-family: sans-serif;">luxurious and thrilling experience.</h5></h4>

    <div class="row justify-content-center">
        <!-- row Begin -->

        <?php

        getservice(7);

        ?>

    </div><!-- row Finish -->
<hr>
</div><!-- container Finish -->

<div id="content" class="container">
    <!-- container Begin -->
    <h4 style="color: black; font-family: monospace;"><b>Swagatam Adventures</b><br><h5 style="font-family: sans-serif;">Most voted destination according to our customer experience.</h5></h4>
   
    <div class="row justify-content-center">
        <!-- row Begin -->

        <?php

        getservice(8);

        ?>

    </div><!-- row Finish -->
<hr>
</div><!-- container Finish -->

<div id="content" class="container">
    <!-- container Begin -->
    <h4 style="color: black; font-family: monospace;"><b>Best Guides</b><br><h5 style="font-family: sans-serif;">Most experience guides.</h5></h4>
   
    <div class="row justify-content-center">
        <!-- row Begin -->

        <?php

        getservice(6);

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