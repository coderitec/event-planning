<?php

include("includes/db.php");

?>

<section>
	
	<form method="post" action="">
		<table width="500" align="center" bgcolor="#800080">
			<thead>
				<tr align="center">
					<th colspan="4"><h2>Log in or Register to Purchase Online</h2></th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td align="right">Email: </td>
					<td><input type="text" name="email" placeholder="example@email.com" required></td>
				</tr>

				<tr>
					<td align="right">Password: </td>
					<td><input type="password" name="pass" placeholder="enter password" required></td>
				</tr>
				<tr align="center">
					<td colspan="3"><a href="checkout.php?forgot_pass">Forgot Password?</a></td>
				</tr>
			</tbody>
			<tfoot>
				<tr align="center">
					<td colspan="4"><input type="submit" name="login" value="Login"></td>
				</tr>
			</tfoot>
			
		</table>

		<h2 style="float: left; padding: 1em;"><a href="customer_register.php" style=" text-decoration: none;">New? Register Here</a></h2>

	</form>
</section>
<?php
if (isset($_POST['login'])) {
	
	$c_email = $_POST['email'];

	$c_pass = $_POST['pass'];

	$sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";

	$run_c = mysqli_query($con, $sel_c);

	$check_customer = mysqli_num_rows($run_c);

	if ($check_customer==0) {
		
		echo "<script>alert('Password or Email is incorrect, Please Try Again')</script>";
		exit();
	}

	$ip = getIp();

	 $sel_cart = "select * from cart where ip_id='$ip'";

     $run_cart = mysqli_query($con, $sel_cart);

     $check_cart = mysqli_num_rows($run_cart);

     if ($check_customer > 0 AND $check_cart==0) {
     	
     	$_SESSION['customer_email'] = $c_email;
            
        echo "<script>alert('You logged in successfully, thanks!')</script>";

        echo "<script>window.open('customer/my_account.php','_self')</script>";
     }
     else{
     	$_SESSION['customer_email'] = $c_email;
            
        echo "<script>alert('You logged in successfully, thanks!')</script>";

        echo "<script>window.open('checkout.php','_self')</script>";
     }

}
?>