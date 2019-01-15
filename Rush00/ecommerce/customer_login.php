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
                        <?php
                        include("includes/db.php");
                        ?>
                        <div>
                        	<form method="post" action="">
                        		<table width="500" align="center" bgcolor="pink">
                        			<tr align="center">
                        				<td colspan="3"><h2>Login or Register to Buy!</h2></td>
                        			</tr>
                        			<tr>
                        				<td align="right"><b>Email:</b></td>
                        				<td><input type="text" name="email" placeholder="enter email" required/></td>
                        			</tr>
                        			<tr>
                        				<td align="right"><b>Password:</b></td>
                        				<td><input type="password" name="pass" placeholder="enter password" required/></td>
                        			</tr>
                        			<tr align="center">
                        				<td colspan="3"><a href="checkout.php?forgot_pass">Forgot Password?</a></td>
                        			</tr>
                        			<tr align="center">
                        				<td colspan="3"><input type="submit" name="login" value="Login" /></td>
                        			</tr>
                        		</table>
                        			<h2 style="float:right; padding-right:20px;"><a href="customer_register.php" style="text-decoration:none;">New? Register Here</a></h2>
                        	</form>

                        	<?php
                        	if(isset($_POST['login'])){

                        		$c_email = $_POST['email'];
                        		$c_pass = $_POST['pass'];
                        		$sel_c = "select * from customer where customer_pass='$c_pass' AND customer_email='$c_email'";
                        		$run_c = mysqli_query($con, $sel_c);
                        		$check_customer = mysqli_num_rows($run_c);
                        		if($check_customer==0){
                        		echo "<script>alert('Password or email is incorrect, plz try again!')</script>";
                        		exit();
                        		}
                        		$ip = getIp();
                        		$sel_cart = "select * from s_cart where ip_add='$ip'";
                        		$run_cart = mysqli_query($con, $sel_cart);
                        		$check_cart = mysqli_num_rows($run_cart);
                        		if($check_customer>0 AND $check_cart==0){
                        		$_SESSION['customer_email']=$c_email;
                        		echo "<script>alert('You logged in successfully, Thanks!')</script>";
                        		echo "<script>window.open('customer/my_account.php','_self')</script>";
                        		}
                        		else {
                        		$_SESSION['customer_email']=$c_email;
                        		echo "<script>alert('You logged in successfully, Thanks!')</script>";
                        		echo "<script>window.open('checkout.php','_self')</script>";
                        		}
                        	}
                        	?>
                        </div>
                    </div>
                </div>
            </div>
            <div id="footer">
                <h2 style="text-align:center; padding-top:30px;">&#169; 2019 by szheng & jahong </h2>
            </div>
        </div>
    </body>
</html>
