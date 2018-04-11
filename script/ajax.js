
function viewOrders(){
    $.ajax({
        url: "./admin/orders.php",
        method: "GET",
    success: function(results){
        $("#content").html(results)
    },
    error: function(err){
        alert("PROBLEM");
    }
    })
}

function viewProducts(){
    $.ajax({
        url: "./admin/products.php",
        method: "GET",
    success: function(results){
        $("#content").html(results)
    },
    error: function(err){
        alert("PROBLEM");
    }
    })
}

function viewSubscribers(){
    $.ajax({
        url: "./admin/subscribers.php",
        method: "GET",
    success: function(results){
        $("#content").html(results)
    },
    error: function(err){
        alert("PROBLEM");
    }
    })
}

function logout(){
    $.ajax({
        url: "./admin/logout.php",
        method: "GET",
    success: function(results){
        $("body").html(results)
    },
    error: function(err){
        alert("PROBLEM");
    }
    })
}