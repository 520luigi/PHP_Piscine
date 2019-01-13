<!DOCTYPE>
<?php
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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">All Plushies</a></li>
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">Sign Up</a></li>
                    <li><a href="#">Shopping Cart</a></li>
                    <li><a href="#">Contact Us</a></li>
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
                    <div id="sidebar_title">Generations</div>
                    <ul id="cats">
                        <!-- dynamically changing sidebar without change html -->
                        <?php getCats();?>
                    </ul>
                </div>

                <div id="content_area">
                    <div id="shopping_cart">
                        <span style='float:right; font-size:20px; padding:5px; line-height:40px;'>
                            Welcome Guess! <b style="color:yellow">Shopping Cart</b> Total Items: Total Price: <a href="cart.php" style="color:yellow"> Go to Cart</a>

                        </span>
                    </div>
                        <?php
                        if (isset($_GET['pro_id'])){
                        $product_id = $_GET['pro_id'];
                        $get_product = "select * from products where product_id='$product_id'";
                        $run_product = mysqli_query($con, $get_product);
                        while($row_product=mysqli_fetch_array($run_product))
                        {
                            $product_id = $row_product['product_id'];
                            $product_title = $row_product['product_title'];
                            $product_price = $row_product['product_price'];
                            $product_image = $row_product['product_image'];
                            $product_desc = $row_product['product_desc'];

                            echo "
                                <div id='single_product'>
                                    <h3>$product_title</h3>
                                    <img src='admin/product_images/$product_image' width='400' height='300'/>
                                    <p><b> $ $product_price</b></p>
                                    <p>$product_desc</p>
                                    <a href='index.php' style='float:left'>Go Back</a>
                                    <a href='index.php?pro_id=$product_id'><button style='float:right'>Add to Cart</button></a>
                                </div>
                            ";
                        }}
                        ?>
                </div>
            </div>
            <div id="footer">
                <h2 style="text-align:center; padding-top:30px;">&#169; 2019 by szheng & jahong </h2>
            </div>
        </div>
    </body>
</html>
