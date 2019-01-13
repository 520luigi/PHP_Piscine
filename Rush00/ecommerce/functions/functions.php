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
?>
