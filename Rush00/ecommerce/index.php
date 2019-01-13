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
                        <input type="text" name="user_query" placeholder="Search a Product"/>
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

                <div id="content_area">This is content area</div>
            </div>
            <div id="footer">
                <h2 style="text-align:center; padding-top:30px;">&#169; 2019 by szheng & jahong </h2>
            </div>
        </div>
    </body>
</html>
