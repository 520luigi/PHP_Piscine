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
                        <h2>Contact Us</h2>
                        <p>Address: 1234 Pokemon Way, Kanto Region, Japan, 424242</p>
                        <p>Email: PokemonMaster@pokemon.com
                    </div>
                </div>
            </div>
            <div id="footer">
                <h2 style="text-align:center; padding-top:30px;">&#169; 2019 by szheng & jahong </h2>
            </div>
        </div>
    </body>
</html>
