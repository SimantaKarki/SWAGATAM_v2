<html>
<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<head>
    <title>
        login form
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
            <h2>LOGIN IN HERE</h2>
            <form action="login.php" method="post" enctype="multipart/form-data">
                <input type="email" placeholder="Enter your Email" name="c_email" required>
                <input type="password" placeholder="Enter your Password" name="c_pass"required>
                <input type="submit" name="login" value="LOGIN" required>
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

if(isset($_POST['login'])){
    
       $customer_email = mysqli_real_escape_string($con,$_POST['c_email']);
        
        $customer_pass = md5(mysqli_real_escape_string($con,$_POST['c_pass']));
    
    $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $get_ip = getRealIpUser();
    
    $check_customer = mysqli_num_rows($run_customer);
    
    $select_cart = "select * from cart where ip_add='$get_ip'";
    
    $run_cart = mysqli_query($con,$select_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_customer==0){
        
        echo "<script>alert('Your email or password is wrong')</script>";
        
        exit();
        
    }
    
    if($check_customer==1){
        
        $_SESSION['customer_email']=$customer_email;
        
       echo "<script>alert('You are Logged in')</script>"; 
        
       echo "<script>window.open('customer/index.php','_self')</script>";
        
    }
    
}
?>