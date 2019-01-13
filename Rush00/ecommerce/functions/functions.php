<?php
    //connection with inputs at default port on mamp is 8889, username, password
    $con = mysqli_connect("127.0.0.1:8889", "root", "root", "ecommerce") or die("Connection Failed");
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

            echo "<li><a href='#'>$cat_title</a></li>";
        }
    }

    function getProducts()
    {
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
                    <p><b> $ $product_price</b></p>
                    <a href='details.php?pro_id=$product_id'style='float:left'>Details</a>
                    <a href='index.php?pro_id=$product_id'><button style='float:right'>Add to Cart</button></a>
                </div>
            ";
        }
    }
?>
