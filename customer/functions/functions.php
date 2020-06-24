<?php 

$db = mysqli_connect("localhost","root","","swagatam_db");

/// begin getRealIpUser functions ///

 if (!isset($_SESSION['customer_email'])) {

                    } else {

                       

$customer_session = $_SESSION['customer_email'];

      $get_customer = "select * from customers where customer_email='$customer_session'";

      $run_customer = mysqli_query($db,$get_customer);

      $row_customer = mysqli_fetch_array($run_customer);

      $cu_id = $row_customer['customer_id'];
          }

function getRealIpUser(){
    
    switch(true){
            
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            
            default : return $_SERVER['REMOTE_ADDR'];
            
    }
    
}

/// finish getRealIpUser functions ///

/// begin add_cart functions ///

function add_cart(){
    
    global $db;
    global $cu_id ;
    if (!isset($_SESSION['customer_email'])) {

    echo "<script>window.open('checkout.php','_self')</script>";
} else {

   

    if(isset($_GET['add_cart'])){
        
        $ip_add = getRealIpUser();
        
        $p_id = $_GET['add_cart'];
        
        $check_in = $_POST['check_in'];
        
        $check_out = $_POST['check_out'];
        
        $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
        
        $run_check = mysqli_query($db,$check_product);
        
        if(mysqli_num_rows($run_check)>0){
            
            echo "<script>alert('This product has already added in cart')</script>";
            echo "<script>window.open('details.php?s_id=$p_id','_self')</script>";
            
        }else{

            $get_price ="select * from services where s_id='$p_id'";

            $run_price = mysqli_query($db,$get_price);

            $row_price = mysqli_fetch_array($run_price);

            $pro_price = $row_price['s_price'];
            
            $query = "insert into cart (p_id,ip_add,check_in,check_out,p_price,c_id) values ('$p_id','$ip_add','$check_in','$check_out','$product_price','$cu_id')";
            
            $run_query = mysqli_query($db,$query);
             echo "<script>alert('This service is  added in booking cart')</script>";
            echo "<script>window.open('details.php?s_id=$p_id','_self')</script>";
            
        }
    }
        
    }
    
}

/// finish add_cart functions ///

/// begin getPro functions ///

function getservice($choice){
    
    global $db;
    global $cu_id;
    
    $get_service = "select * from services where s_cat_id='$choice'  order by review DESC LIMIT 0,8";
    
    $run_service = mysqli_query($db,$get_service);
    
    while($row_service=mysqli_fetch_array($run_service)){
        
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

/// begin getPCats functions ///

function getwish(){
    
    global $db;
    global $cu_id;
    $get_wish = "select * from wishlist where cu_id=$cu_id";
    $run_wish = mysqli_query($db,$get_wish);
    while($row_wish=mysqli_fetch_array($run_wish)){
    $ss_id=$row_wish['s_id'];

    $get_service = "select * from services where s_id='$ss_id'";
    
    $run_service = mysqli_query($db,$get_service);
    
    $row_service=mysqli_fetch_array($run_service);
        
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
                <center>$s_price /night</center>
                </div>

            </div>
        
        </div>
        ";
        
    }
    
}

/// finish getPro functions ///

/// begin getPCats functions ///


function getPCats(){
    
    global $db;
    
    $get_p_cats = "select * from categories";
    
    $run_p_cats = mysqli_query($db,$get_p_cats);
    
    while($row_p_cats=mysqli_fetch_array($run_p_cats)){
        
        $p_cat_id = $row_p_cats['cat_id'];
        
        $p_cat_title = $row_p_cats['cat_title'];
        
        echo "
        
            <li>
            
                <a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a>
            
            </li>
        
        ";
        
    }
    
}
    
/// finish getPCats functions ///

/// begin getCats functions ///

function getCats(){
    
    global $db;
    
    $get_cats = "select * from categories";
    
    $run_cats = mysqli_query($db,$get_cats);
    
    while($row_cats=mysqli_fetch_array($run_cats)){
        
        $cat_id = $row_cats['cat_id'];
        
        $cat_title = $row_cats['cat_title'];
        
        echo "
        
            <li>
            
                <a href='shop.php?cat=$cat_id'> $cat_title </a>
            
            </li>
        
        ";
        
    }
    
}
    
/// finish getCats functions ///

/// finish getRealIpUser functions ///

function items(){
    
    global $db;
   global $cu_id; 
    
    $get_items = "select * from cart where c_id='$cu_id'";
    
    $run_items = mysqli_query($db,$get_items);
    
    $count_items = mysqli_num_rows($run_items);
    
    echo $count_items;
    
}

/// finish getRealIpUser functions ///

/// begin total_price functions ///

function total_price(){
    
    global $db;
    
    global $cu_id;
    $total = 0;
    
    $select_cart = "select * from cart where c_id='$cu_id'";
    
    $run_cart = mysqli_query($db,$select_cart);
    
    while($record=mysqli_fetch_array($run_cart)){
        
        $pro_id = $record['p_id'];
        
        $pro_qty = $record['qty'];
            
        $sub_total = $record['p_price']*$pro_qty;
            
        $total += $sub_total;
        
    }
    
    echo "$" . $total;
    
}

/// finish total_price functions ///

/// Begin getProducts(); functions ///

function getProducts($c){

    global $db;
    global $cu_id;
    $aWhere = array();

    /// Begin for Manufacturer ///
    
    if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

        foreach($_REQUEST['man'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'host_id='.(int)$sVal;

            }

        }

    }

    /// Finish for Manufacturer ///  

    /// Begin for Product Categories /// 

    if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

        foreach($_REQUEST['cat'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 's_cat_id='.(int)$sVal;

            }

        }

    }    

    /// Finish for Product Categories /// 

    /// Begin for Categories /// 

    if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

        foreach($_REQUEST['cat'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'cat_id='.(int)$sVal;

            }

        }

    }    

    /// Finish for Categories /// 

    $per_page=8;

    if(isset($_GET['page'])){

        $page = $_GET['page'];

    }else{
        $page=1;
    }

    $start_from = ($page-1) * $per_page;
    $sLimit = " order by 1 DESC LIMIT $start_from,$per_page";
    $sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'').$sLimit;
    $get_products = "select * from services where s_cat_id='$c' ".$sWhere;
    $run_products = mysqli_query($db,$get_products);
    while($row_service=mysqli_fetch_array($run_products)){
        
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

/// finish getProducts(); functions ///

/// begin getPaginator(); functions ///

function getPaginator($c,$name1){

    global $db;

    $per_page=8;
    $aWhere = array();
    $aPath = '';

    /// Begin for Manufacturer ///
    
    if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

        foreach($_REQUEST['man'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'host_id='.(int)$sVal;
                $aPath .= 'man[]='.(int)$sVal.'&';

            }

        }

    }

    /// Finish for Manufacturer ///  

    /// Begin for Product Categories /// 

    if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

        foreach($_REQUEST['cat'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 's_cat_id='.(int)$sVal;
                $aPath .= 'scat[]='.(int)$sVal.'&';

            }

        }

    }    

    /// Finish for Product Categories /// 

    /// Begin for Categories /// 

    if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

        foreach($_REQUEST['cat'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'cat_id='.(int)$sVal;
                $aPath .= 'cat[]='.(int)$sVal.'&';

            }

        }

    }    

    /// Finish for Categories ///   
    
    $sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'');
    $query = "select * from services where s_cat_id='$c'".$sWhere;
    $result = mysqli_query($db,$query);
    $total_records = mysqli_num_rows($result);
    $total_pages = ceil($total_records / $per_page);

    echo "<li> <a href='$name1.php?page=1";
    if(!empty($aPath)){

        echo "&".$aPath;

    }

    echo "'>".'First Page'."</a></li>";

    for($i=1; $i<=$total_pages; $i++){

        echo "<li> <a href='name1.php?page=".$i.(!empty($aPath)?'&'.$aPath:'')."'>".$i."</a></li>";

    };

    echo "<li> <a href='$name1.php?page=$total_pages";

    if(!empty($aPath)){

        echo "&".$aPath;

    }

    echo "'>".'Last Page'."</a></li>";

}

/// finish getPaginator(); functions ///

?>