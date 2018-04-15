<?php
	include 'include/header.php';
	include 'functions/functions.php';

	if(isset($_POST['delProdID'])) {
		unset($_SESSION['cartByproduct'][$_POST['delProdID']]);
	} 
	if(isset($_POST['changeAmount'])) {
		$_SESSION['cartByproduct'][$_POST['delProdID']] = $_POST['changeAmount']; 
	} 
?>
<div id="cartProducts">
	<table id='cartTable'>
		<tr>
			<th width="20px;">ID</th>
			<th>Namn</th>
			<th>Bild på din vara</th>
			<th>Pris</th>
			<th width="10px;">Antal</th>
			<th width="35px;"></th>
		</tr>
		<?php
		$total = printCart();
		?>   
		<td colspan="3"><strong>TOTALT</strong></td>
		<td>
			<?php
				if(isset($total[0])){
					echo"<strong>". $total[0]." kr</strong>";
				}
				else{
					echo "<strong>0 kr</strong>";
				}
			?>
		</td>
		<td>
			<?php
			if(isset($total[1])){
				echo "<strong>" .$total[1]. "</strong>";
			}
			else{
				echo "<strong>0</strong>";
			}
				
			?>
		</td>
		<td><a href="clear.php"><button>Töm kundvagnen</button></a></td>
	</table>
</div>

<div id="cartShipping">
	<h2>Välj ditt fraktbolag</h2>
	<table id='cartTable' style="width:400px; margin: auto;">
		<!-- <tr>
			<th colspan="2">Välj ditt fraktsätt:<th>
		</tr> -->
		<tr>
			<form action="cart.php" method="POST">
				<?php 
					shipping();
				?>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="Välj" class="cartSubmit">
			</form>
			</td>
		</tr>
	</table>
</div>

<div id="cartAmounts">
	<table id='cartTable' style="width:450px; margin: auto;">
		<tr>
			<th>Totalt värde på din varukorg</th>
			<th>Fraktkostnad</th>
			<th>Totalt</th>
		</tr>
		<tr>
			<td> 
				<?php if(isset($total[0])){
					echo $total[0]." kr"; 
				}
				else{
					echo "0 kr";
				}
				?> 
			</td>
			<td>
				<?php
					if(isset($_POST["shipping"])){
						if ($total[0] <= 1000) {
							echo $_POST["shipping"] ."kr";
						} 
						else{ 
							echo "Free!";
						}
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
					<input type="submit" name="checkOut" value="Slutför din beställning" class="cartSubmit">
				</form>
			</td>
		</tr>
	</table>
	
</div>

<?php
    include 'include/footer.php';
?>