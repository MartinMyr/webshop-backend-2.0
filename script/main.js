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
  $("#loginText").remove();
  $("#loginform").empty();
  $("#loginform").append(`
      <h2>Please fill out the form</h2>
      <div class="userField">
          <img class="loginIcon" src="img/userlogin.png">
          <input type="text" name="signUpName" placeholder="Name" required>
      </div>
      <div class="userField">
          <img class="loginIcon" src="img/userlogin.png">
          <input type="text" name="signUpUsername" placeholder="Username" required>
      </div>

      <div class="passwordField">
          <img class="loginIcon" src="img/bowserpassword.png">
          <input type="password" name="signUpPassword" placeholder="Password" required>
      </div>

      <div class="passwordField">
          <img class="loginIcon" src="img/userlogin.png">
          <input type="email" name="signUpEmail" placeholder="Email" required>
      </div>

      <button id="login" type="submit">Skapa konto</button>
      
      `
  );
}






