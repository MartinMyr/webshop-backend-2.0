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
    
    var name = $('#name').val();
    var info = $('#info').val();
    var price = $('#price').val();
    var units = $('#units').val();
    var category = $('#category option:selected').val();
   

    $.post("./admin/products.php",
        {
            name: name,
            info: info,
            price: price,
            category: category,
            units: units
        },
        function(results)
        {
            if(results)
            {
                viewProducts();
            }
        }
    );
}

function setSendStatus(ordID)
{
    var send = $("#order" + ordID).is(":checked");
    if(send === true)
    {
        send = 1;
    }
    else
    {
        send = 0;
    }

    $.post("./admin/orders.php",
    {
        orderID: ordID,
        sendStatus: send
    },
    function(results)
    {
        if(results) viewOrders();
    });
}