<?php
    //connection with inputs at default port on mamp is 8889, username, password
    $con = mysqli_connect("127.0.0.1:8889", "root", "root", "ecommerce") or die("Connection Failed");

    //function getIp from php source online...
    function getIp() {
    	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
    		$ip = getenv("HTTP_CLIENT_IP");
    	else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
    		$ip = getenv("HTTP_X_FORWARDED_FOR");
    	else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
    		$ip = getenv("REMOTE_ADDR");
    	else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
    		$ip = $_SERVER['REMOTE_ADDR'];
    	else
    		$ip = "unknown";

    	return($ip);
    }
    //create the shopping cart
    function cart() {
        if(isset($_GET['add_cart'])){
            global $con;
            $ip = getIp();
            $pro_id = $_GET['add_cart'];
            //check if the product is added more than once.
            $check_product = "select * from s_cart where ip_add='$ip' AND p_id='$pro_id'";
            $run_check = mysqli_query($con, $check_product);
            if (mysqli_num_rows($run_check)>0)
            {
                echo "";
            }
            else {
                $insert_product ="insert into s_cart (p_id,ip_add) values ('$pro_id','$ip')";
                $run_product = mysqli_query($con, $insert_product);

                echo "<script>window.open('index.php','_self')</script>";
            }
        }
    }

    //getting total shopping cart items
    function total_items() {
        if(isset($_GET['add_cart'])) {
            global $con;
            $ip = getIp();
            $get_items = "select * from s_cart where ip_add='$ip'";
            $run_items = mysqli_query($con, $get_items);
            $count_items = mysqli_num_rows($run_items);
        } else {
            global $con;
            $ip = getIp();
            $get_items = "select * from s_cart where ip_add='$ip'";
            $run_items = mysqli_query($con, $get_items);
            $count_items = mysqli_num_rows($run_items);
        }
        echo $count_items;
    }

    //getting total price of items in the cart
    function total_price() {
        $total = 0;

        global $con;
        $ip = getIp();
        $sel_price = "select * from s_cart where ip_add='$ip'";
        $run_price = mysqli_query($con, $sel_price);
        while ($p_price = mysqli_fetch_array($run_price)) {
            $pro_id = $p_price['p_id'];
            //relating two tables to reference price value to product id.
            $pro_price = "select * from products where product_id='$pro_id'";

            $run_pro_price = mysqli_query($con, $pro_price);
            while ($f_price = mysqli_fetch_array($run_pro_price)) {
                //array of prices to product id
                $product_price = array($f_price['product_price']);
                $values = array_sum($product_price);
                $total += $values;
            }
        }
        echo "$". $total;
    }

    //getting the categories
    function getCats()
    {
        global $con;
        $get_cats = "select * from categories";
        $run_cats = mysqli_query($con, $get_cats);
        while ($row_cats=mysqli_fetch_array($run_cats))
        {
            $cat_id = $row_cats['cat_id'];
            $cat_title = $row_cats['cat_item'];

            echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
        }
    }

    function getProducts()
    {
        if (!isset($_GET['cat'])) {

        global $con;
        $get_product = "select * from products order by RAND() LIMIT 0,6";
        $run_product = mysqli_query($con, $get_product);
        while($row_product=mysqli_fetch_array($run_product))
        {
            $product_id = $row_product['product_id'];
            $product_cat = $row_product['product_cat'];
            $product_title = $row_product['product_title'];
            $product_price = $row_product['product_price'];
            $product_image = $row_product['product_image'];

            echo "
                <div id='single_product'>
                    <h3>$product_title</h3>
                    <img src='admin/product_images/$product_image' width=180px, height=180px />
                    <p><b> Price: $ $product_price</b></p>
                    <a href='details.php?pro_id=$product_id'style='float:left'>Details</a>
                    <a href='index.php?add_cart=$product_id'><button style='float:right'>Add to Cart</button></a>
                </div>
            ";
        }
    }
    }

    function getCatProducts()
    {
        //detect clicks on the categories
        if (isset($_GET['cat'])) {
            $cat_id=$_GET['cat'];

        global $con;
        $get_cat_pro = "select * from products where product_cat='$cat_id'";
        $run_cat_pro = mysqli_query($con, $get_cat_pro);
        $count_cats = mysqli_num_rows($run_cat_pro);

        if($count_cats==0)
        {
            echo "<h2>There are no plushies in this category!</h2>";
        }
        while($row_cat_product=mysqli_fetch_array($run_cat_pro))
        {
            $product_id = $row_cat_product['product_id'];
            $product_cat = $row_cat_product['product_cat'];
            $product_title = $row_cat_product['product_title'];
            $product_price = $row_cat_product['product_price'];
            $product_image = $row_cat_product['product_image'];

            echo "
                <div id='single_product'>
                    <h3>$product_title</h3>
                    <img src='admin/product_images/$product_image' width=180px, height=180px />
                    <p><b>Price: $ $product_price</b></p>
                    <a href='details.php?pro_id=$product_id'style='float:left'>Details</a>
                    <a href='index.php?add_cart=$product_id'><button style='float:right'>Add to Cart</button></a>
                </div>
            ";
        }
    }
    }
?>
