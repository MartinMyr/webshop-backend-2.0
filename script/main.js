
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
if(sessionStorage.getItem('newsletter') == 'true'){
  $("#newsletter").hide();
  console.log("asd")
}else{
  $("#newsletter").hide();
  $("#newsletter").slideDown(400);
  console.log("nono");
}

$(".hideNewsletter").click(function(){
  $("#newsletter").slideUp();
  sessionStorage.setItem('newsletter', 'true');
});



//Slide in newsletter ends