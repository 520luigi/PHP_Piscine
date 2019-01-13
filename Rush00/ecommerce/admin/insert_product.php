<!DOCTYPE html>
<html>
    <head>
        <title>Insert Plushies</title>
    </head>

    <body bgcolor ="skyblue">
        <form action="insert_product.php" method="post" enctype="multipart/fort-data">
            <table align="center" width="888" border="2" bgcolor="pink">
                <tr align="center">
                    <td colspan="8"><h2>Insert New Post Here</h2></td>
                </tr>

                <tr>
                    <td align="right">Product Title:</td>
                    <td><input type="text" name="product_title" /></td>
                </tr>
                <tr>
                    <td align="right">Product Category:</td>
                    <td>
                        <select name="product_cat">
                            <option>Select a Category</option>
                            <?php
                                $get_cats = "select * from categories";
                                $run_cats = mysqli_query($con, $get_cats);
                                while ($row_cats=mysqli_fetch_array($run_cats))
                                {
                                    $cat_id = $row_cats['cat_id'];
                                    $cat_title = $row_cats['cat_item'];

                                    echo "<option>$cat_title</option>";
                                }
                            ?>
                    </td>
                </tr>
                <tr>
                    <td align="right">Product Image:</td>
                    <td><input type="text" name="product_image" /></td>
                </tr>
                <tr>
                    <td align="right">Product Price:</td>
                    <td><input type="text" name="product_price" /></td>
                </tr>
                <tr>
                    <td align="right">Product Description:</td>
                    <td><input type="text" name="product_desc" /></td>
                </tr>
                <tr>
                    <td align="right">Product Keywords:</td>
                    <td><input type="text" name="product_keywords" /></td>
                </tr>
                <tr align="center">
                    <td colspan="8"><input type="submit" name="insert_product" value="Insert Now" /></td>
                </tr>
            </table>
    </body>
</html>
