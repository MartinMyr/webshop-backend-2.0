<?php
    include 'include/header.php';
   include 'functions/functions.php';
?>
   

    

<div id="cartDiv">
<?php	
print_r($_SESSION['CART']);
echo $_SESSION['CART'][10];

foreach ($_SESSION['CART'][i] as $key => $value){
	echo"
		<div id='cartIdDiv'>
		</div>
		<div id='cartNameDiv'>
			".$key."
		</div>
			<div id='cartAmountDiv'>
			".$value."
			</div>
		</div>
	";
}





?>





<?php
    include 'include/footer.php';
?>