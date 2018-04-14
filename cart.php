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

</table>
<div id="cartShipping">
	SHIPPING
	<hr>
	<table>
		<tr>
			<th></th>
			<th></th>
			<th></th>
		</tr>
	</table>
</div>

<a href="clear.php">rensa kundvagn</a>

<?php
    include 'include/footer.php';
?>