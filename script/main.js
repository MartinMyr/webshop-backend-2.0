window.onscroll = function() {myFunction()};

var menu = document.getElementsByClassName("menu").item(0);
var sticky = menu.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    menu.classList.add("sticky")
  } else {
    menu.classList.remove("sticky");
  }
}


//Slide in newsletter
if(sessionStorage.getItem('newsletter') !== 'true'){
  $("#newsletter").slideDown(400);
}
else
{
  $("#newsletter").remove();
}

$(".hideNewsletter").click(function(){
  $("#newsletter").slideUp(400);
  sessionStorage.setItem('newsletter', 'true');
});
//Slide in newsletter ends

function signUp(){
  $("#loginform").empty();
}