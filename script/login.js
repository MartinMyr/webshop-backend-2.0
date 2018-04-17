if(sessionStorage.getItem("userLoggedIn") == "true"){
  $("#loginDiv").hide();
  var member = "<a href='member.php'>Medlem</a>";
  var logout = "<div id ='logoutDiv' class='linkDiv'><a onclick='logOutUser()' href='#'>Logout</a></div>";
  $("#member").append(member);
  $(".menu").append(logout);

}else{
    $("#loginDiv").show();
    $("#logoutDiv").remove();
}


function logOutUser(){
    $.ajax({
        url: "./functions/logout.php",
        method: "GET",
    success: function(results){
        $("#content").html(results)
        sessionStorage.removeItem('userLoggedIn');
        location.reload();
        $("#loginDiv").show();
        $("#member").empty();
    },
    error: function(err){
        alert("PROBLEM");
    }
    })
}