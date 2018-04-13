<?php
    include 'include/header.php';
   include 'functions/functions.php';
?>
   

    

<div id="cartDiv">
<?php	
print_r($_SESSION['cart']);
echo $sumArray;

foreach ($sumArray as $key => $value){
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