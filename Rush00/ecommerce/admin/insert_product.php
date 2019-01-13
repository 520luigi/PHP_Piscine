<!DOCTYPE html>
<?php
include("includes/db.php");
?>
<html>
    <head>
        <title>Insert Plushies</title>
    </head>

    <body bgcolor ="skyblue">
        <form action="insert_product.php" method="post" enctype="multipart/form-data">
            <table align="center" width="688" border="2" bgcolor="pink">
                <tr align="center">
                    <td colspan="8"><h2>Insert New Plushies Here!</h2></td>
                </tr>

                <tr>
                    <td align="right">Product Title:</td>
                    <td><input type="text" name="product_title" size = "60" required/></td>
                </tr>
                <tr>
                    <td align="right">Product Category:</td>
                    <td>
                        <select name="product_cat" required>
                            <option>Select a Category</option>
                            <?php
                                $get_cats = "select * from categories";
                                $run_cats = mysqli_query($con, $get_cats);
                                while ($row_cats=mysqli_fetch_array($run_cats))
                                {
                                    $cat_id = $row_cats['cat_id'];
                                    $cat_title = $row_cats['cat_item'];

                                    echo "<option value='$cat_id'>$cat_title</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right">Product Image:</td>
                    <td><input type="file" name="product_image" value=""/></td>
                </tr>
                <tr>
                    <td align="right">Product Price:</td>
                    <td><input type="text" name="product_price" required/></td>
                </tr>
                <tr>
                    <td align="right">Product Description:</td>
                    <td><textarea name="product_desc" col="20" rows="12"></textarea></td>
                </tr>
                <tr>
                    <td align="right">Product Keywords:</td>
                    <td><input type="text" name="product_keywords" size="60" required/></td>
                </tr>
                <tr align="center">
                    <td colspan="8"><input type="submit" name="OK" value="Add Plushies" /></td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php
    //if add plushies is clicked, run the code inside
    if(isset($_POST['OK']))
    {
        //get text data from fields
        $product_title = $_POST['product_title'];
        $product_cat = $_POST['product_cat'];
        $product_price = $_POST['product_price'];
        $product_desc = $_POST['product_desc'];
        $product_keywords = $_POST['product_keywords'];

        //get image from field
        $product_image = $_FILES['product_image']['name'];
        $product_image_tmp = $_FILES['product_image']['tmp_name'];

        move_uploaded_file($product_image_tmp, "product_images/$product_image");
        $insert_product = "insert into products (product_title,product_cat,product_image,product_price,product_desc,product_keywords) values ('$product_title','$product_cat','$product_image','$product_price','$product_desc','$product_keywords')";

        $insert_pro = mysqli_query($con, $insert_product);

        if ($insert_pro){
            echo "<script>alert('Plushies have been inserted!')</script>";
            echo "<script>window.open('insert_product.php','_self')</script>";
        }
    }
?>
