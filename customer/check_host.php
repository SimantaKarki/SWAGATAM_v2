<?php

$active = 'host';

include("includes/header.php");
$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$host = $row_customer['is_host'];

if ($host==0) {
	include("hostform.php");
}
elseif($host==1){

include("add_services.php");
}

?>