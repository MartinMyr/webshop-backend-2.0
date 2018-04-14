<?php
	include 'include/header.php';
	include 'functions/functions.php';

	if(isset($_POST['delProdID'])) {
		unset($_SESSION['cartByproduct'][$_POST['delProdID']]);
	} 
?>
<div id="cartProducts">
	<h1> Your Cart</h1>
	<table id='cartTable'>
		<tr>
			<th width="20px;">ID</th>
			<th>Name</th>
			<th>Image</th>
			<th>Price</th>
			<th>Quantity</th>
			<th width="20px;">Remove</th>
		</tr>
		<?php
		$total = printCart();
		?>   
		<td colspan="3"></td>
		<td>
			<?php
				echo $total[0]." kr";
			?>
		</td>
		<td>
			<?php
				echo $total[1];
			?>
		</td>
		<td><a href="clear.php"><button>rensa kundvagn</button></a></td>
	</table>
</div>

<div id="cartShipping">
	<h2>SHIPPING</h2>
	<table id='cartTable' style="width:350px; margin: auto;">
		<tr>
			<th colspan="2">Choose your shipper:<th>
		</tr>
		<tr>
			<?php 
				shipping();
				?>
			<td>
				<form action="cart.php" method="POST">
				<input type="submit" value="choose">
				</form>
			</td>
		</tr>
	</table>
</div>

<div id="cartAmounts">
	<table id='cartTable' style="width:450px; margin: auto;">
		<tr>
			<th>Total amount of cart</th>
			<th>Cost of shipping</th>
			<th>Total</th>
		</tr>
		<tr>
			<td> <?php echo $total[0]; ?> kr</td>
			<td>
				<?php
					if ($total[0] <= 1000) {
						echo $_POST["shipping"] ."kr";
					} 
					else{ 
						echo "Free!";
					}
				?> 
			</td>
			<td> 
				<?php 
					if ($total[0] <= 1000) {
						echo $total[0] + $_POST["shipping"];
					} else{ echo $total[0];
					}
				?>
			</td> 
		</tr>
		<tr>
			<td colspan="3">
				<form action="checkout.php" method="POST">
					<input type="hidden">
					<input type="submit" value="checkout">
				</form>
			</td>
		</tr>
	</table>
	
</div>

<?php
    include 'include/footer.php';
?>