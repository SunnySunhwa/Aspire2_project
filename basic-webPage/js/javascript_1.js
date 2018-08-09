
var firstName = document.getElementById('first-name');
var lastName = document.getElementById('last-name');
var email = document.getElementById('email');
var phone = document.getElementById('phone');
var msg = document.getElementById('message');
var formControl = document.getElementsByClassName('form-control');
var warning = document.getElementsByClassName('help-block')
// document.getElementById('image1').className="new-css-1, new-css-2";

function validationCheck() {
  if (!firstName.value || !lastName.value || !email.value || !phone.value || !msg.value){
    for (var i= 0; i < warning.length; i++){
      warning[i].innerHTML = 'All field must be filled in';
    }
  } else{
      alert('Your message has been sent!');
      reload();
  }
}

function allReset() {
  firstName.value = '';
  lastName.value  = '';
  email.value  = '';
  phone.value = '';
  msg.value = '';
}
function reload(){
  document.location.reload(true);
}

// add event listener to table
var submit = document.getElementById('submitButton');
var reset = document.getElementById('resetButton');

submit.addEventListener("click", validationCheck);
reset.addEventListener("click", allReset);