<!DOCTYPE>
<?php
session_start();
include ("functions/functions.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pokemon Plushies!</title>

        <link rel="stylesheet" href="styles/style.css" media="all">
    </head>
    <body>
        <div class="main_container">
            <div class="header_container">
                <img id="banner" src = "images/pokemonbanner.jpg" />
            </div>

            <div class="menubar">
                <ul id="menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="all_products.php">All Plushies</a></li>
                    <li><a href="customer_login.php">Login</a></li>
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="contact_us.php">Contact Us</a></li>
                </ul>

                <div id="form">
                    <form method="get" action="results.php" enctype="multipart/form-data">
                        <input type="text" name="user_query" placeholder="Search by Poke-Types!"/>
                        <input type="submit" name="search" value="Search" />
                    </form>
                </div>
            </div>
            <div class="content_wrapper">
                <div id="sidebar">
                    <div id="sidebar_title">Categories</div>
                    <ul id="cats">
                        <!-- dynamically changing sidebar without change html -->
                        <?php getCats();?>
                    </ul>
                </div>

                <div id="content_area">
                    <?php cart(); ?>
                    <div id="shopping_cart">
                        <span style='float:right; font-size:20px; padding:5px; line-height:40px;'>
                            Welcome Guess! <b style="color:yellow">Shopping Cart</b> Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?>  <a href="cart.php" style="color:yellow"> Go to Cart</a>

                        </span>
                    </div>
                    <div id="products_box">
                        <form action="" method="post" enctype="multipart/form-data">
                            <table align="center", width="700", bgcolor="pink">
                                <tr align="center">
                                    <th>Remove</th>
                                    <th>Product(s)</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                </tr>

                                <?php
                                $total = 0;
                                global $con;
                                $ip = getIp();
                                $sel_price = "select * from s_cart where ip_add='$ip'";
                                $run_price = mysqli_query($con, $sel_price);
                                while ($p_price = mysqli_fetch_array($run_price)) {
                                    $pro_id = $p_price['p_id'];
                                    $pro_price = "select * from products where product_id='$pro_id'";
                                    $run_pro_price = mysqli_query($con, $pro_price);
                                    while ($f_price = mysqli_fetch_array($run_pro_price)) {
                                        $product_price = array($f_price['product_price']);
                                        $product_title = $f_price['product_title'];
                                        $product_image = $f_price['product_image'];
                                        $single_price = $f_price['product_price'];
                                        $values = array_sum($product_price);
                                        $total += $values;
                                ?>
                                <tr align="center">
                                    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
                                    <td><?php echo $product_title; ?><br>
                                        <img src = "admin/product_images/<?php echo $product_image;?>" width="60" height="60"/>
                                    </td>
                                    <td><input type="text" size="5" name="qty" value="<?php echo $_SESSION['qty'];?>"/></td>
                                    <?php
                                    if(isset($_POST['update_cart'])) {
                                        $qty = $_POST['qty'];
                                        $update_qty = "update s_cart set qty='$qty'";
                                        $run_qty=mysqli_query($con, $update_qty);
                                        $_SESSION['qty']=$qty;
                                        $total=$total*$qty;
                                    }
                                    ?>
                                    <td><?php echo "$".$single_price; ?></td>
                                </tr>
                            <?php }} ?>
                            <tr align="right">
                                <td colspan='5'><b>Sub Total:</b></td>
                                <td><?php echo "$".$total;?></td>
                            </tr>
                            <tr>
                                <td colspan='2'><input type="submit" name="update_cart" value="Update Cart"/></td>
                                <td><input type ="submit" name="continue" value="Continue Shopping"/></td>
                                <td><button><a href="checkout.php" style="text-decoration:none; color:black;" >Checkout</a></button></td>
                            </tr>
                            </table>
                        </form>

                        <?php
                            global $con;
                            $ip = getIp();
                            //loop to update cart removed items
                            if (isset($_POST['update_cart'])) {
                                foreach($_POST['remove'] as $remove_id){
                                    $delete_product = "delete from s_cart where p_id='$remove_id' AND ip_add='$ip'";
                                    $run_delete = mysqli_query($con, $delete_product);

                                    if($run_delete) {
                                        echo "<script>window.open('cart.php','_self')</script>";
                                    }
                                }
                            }
                            if (isset($_POST['continue'])) {
                                echo "<script>window.open('index.php','_self')</script>";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div id="footer">
                <h2 style="text-align:center; padding-top:30px;">&#169; 2019 by szheng & jahong </h2>
            </div>
        </div>
    </body>
</html>
