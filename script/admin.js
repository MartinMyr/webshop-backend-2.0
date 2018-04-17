function changeCategory(prodID) {
    var category = $('#category'+prodID+' option:selected').val();
    if(category == '') return;

   $.post("./admin/products.php", {productId: prodID, category: category}, function(results){
        if(results) viewProducts();
    });
}

function changeAmount(prodID) {
    var amount = $('#amount'+prodID).val();
    if(amount == '') return;

   $.post("./admin/products.php", {prodID: prodID, amount: amount}, function(results){
        if(results) viewProducts();
    });
}


function Delete(prodID) {
    $.post("./admin/products.php", {deleteID: prodID}, function(results){
        if(results) viewProducts();
    });
}


function createProduct() {
    $('#pic'+prodID+' ').val();
    $('#name'+prodID+' ').val();
    $('#info'+prodID+' ').val();
    $('#price'+prodID+' ').val();
    $('#category'+prodID+' ').val();
    
    

    //$.post("./admin/products.php", {addID: prodID}, function(results){
      //  if(results) viewProducts();
    //});
}