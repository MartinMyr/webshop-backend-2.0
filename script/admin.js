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

$("#createProduct").on("submit", function(e) {
    e.preventDefault();
    createProduct();
});

function createProduct() {
    var pic = $('#pic').val();
    var name = $('#name').val();
    var info = $('#info').val();
    var price = $('#price').val();
    var caty = $('#category option:selected').val();
    
    //$.post("./admin/products.php", {addID: prodID}, function(results){
      //  if(results) viewProducts();
    //});
}