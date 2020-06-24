
<html>
<?php
include("includes/db.php");
include("functions/functions.php");
?>
<head>
    <title>
        signup form
    </title>
   <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #fff;

        }

        .wrap {
            max-width: 450px;
            margin: auto;
            padding: 20px;
            background: #031321;
           margin-top:50px;
            border-radius: 10px;
        }

        form {
            margin-top: 10px;

        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            margin-bottom: 10px;
            border: none;
            outline: none;
            border: 1px solid gray;
            font-size: 15px;
            border-radius: 8px;
        }

        h2 {
            margin: 0;
            padding: 0;
            font-size: 2em;
            text-align: center;
            color: #fff;

        }

        input[type=submit] {
            position: relative;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            display: inline-block;
            padding: 15px 30px;
            color: #2196f3;
            text-transform: uppercase;
            font-size: 24px;
            transition: 0.2s;
            border: none;
        }

        input[type=submit]:hover {
            color: #ffffff;
            background: #2196f3;
            box-shadow: 0 0 10px #071825, 0 0 20px #2196f3, 0 0 60px #2196f3;
            transition-delay: 0.2s;
        }

        .overlay {
            height: 100%;
            width: 100%;
            display: none;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.7);
        }

        .closebtn {
            position: absolute;
            top: 20px;
            right: 45px;
            font-size: 60px;
            cursor: pointer;
            color: #fff;
        }

        .closebtn:hover {
            color: #CCC;
        }
    </style>
</head>

<body>
    <div id="myoverlay" class="overlay">
        <span class="closebtn" onclick="closeForm()" title="close overlay">
            &#215
        </span>
        <div class="wrap">
            <h2>SIGN UP HERE</h2>
            <form action="signup.php" method="post" enctype="multipart/form-data">
                <input type="text" placeholder="Enter your First name" name="c_fname" required>
                <input type="text" placeholder="Enter your Last name" name="c_lname" required>
                <input type="email" placeholder="Enter your Email address" name="c_email" required>
                <input type="text" placeholder="Enter your Address" name="c_address" required>
                <input type="password" placeholder="Enter your Password" name="c_pass"required>
               <h4>Your Profile Picture
                </h4>
                <input type="file" name="c_image" required>
                <input type="submit" name="register" value="Join Now" required>
            </form>
        </div>
    </div>
    <?php
echo "<script> document.getElementById('myoverlay').style.display = 'block';</script>";
    ?>
     <!-- <button class="openbtn" onclick="openForm()">Click Here to Sign Up</button> -->
   
    <script type="text/javascript">
        function openForm() {
            document.getElementById("myoverlay").style.display = "block";
        }

        function closeForm() {
            window.open('index.php','_self');
        }
    </script>
<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>

</body>

</html>

<?php

if (isset($_POST['register'])) {

    $c_fname = $_POST['c_fname'];
     $c_lname = $_POST['c_lname'];

    $c_email = $_POST['c_email'];

    $c_pass = $_POST['c_pass'];

    $c_address = $_POST['c_address'];

    $c_image = $_FILES['c_image']['name'];

    $c_image_tmp = $_FILES['c_image']['tmp_name'];

    $c_ip = getRealIpUser();

    $get_ma = "select count(*) as total from customers where customer_email='$c_email'";
    $num = mysqli_query($con, $get_ma);
    $nm = mysqli_fetch_object($num);
    if ($nm->total >= 1) {
        echo "<script>alert('Email Already Exist.')</script>";
    } else {
        move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");

        $insert_customer = "insert into customers (customer_fname,customer_lname,customer_email,customer_pass,customer_address,customer_image,customer_ip,is_host) values ('$c_fname','$c_lname','$c_email',md5('$c_pass'),'$c_address','$c_image','$c_ip','0')";

        $run_customer = mysqli_query($con, $insert_customer);

        $sel_cart = "select * from cart where ip_add='$c_ip'";

        $run_cart = mysqli_query($con, $sel_cart);

        $check_cart = mysqli_num_rows($run_cart);

        if ($check_cart > 0) {

            /// If register have items in cart ///

            $_SESSION['customer_email'] = $c_email;

            echo "<script>alert('You have been Registered Sucessfully')</script>";

            echo "<script>window.open('customer/index.php','_self')</script>";
        } else {

            /// If register without items in cart ///

            $_SESSION['customer_email'] = $c_email;

            echo "<script>alert('You have been Registered Sucessfully')</script>";

            echo "<script>window.open('customer/index.php','_self')</script>";
        }
    }
}

?>