<?php
	include 'include/header.php';
	include 'functions/functions.php';

	if(isset($_POST['delProdID'])) {
		unset($_SESSION['cartByproduct'][$_POST['delProdID']]);
	} 
?>
   
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
		printCart();
	?>   
	<td colspan="100">
		<a href="clear.php"><button>rensa kundvagn</button></a>
	</td>
</table>


<div id="cartShipping">
	SHIPPING
	<hr>
	Choose your shipper:
	<form action="cart.php" method="POST">
		<?php 
			shipping();
		?>
	<input type="submit">
	</form>
	<hr>
</div>


<?php
    include 'include/footer.php';
?>