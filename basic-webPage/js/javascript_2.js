// To add class or remove class depends on validation check.
var showErrMsg = document.getElementById('invalidCheck').nextElementSibling.nextElementSibling;
var formControl = document.getElementsByClassName('form-control')

function errCss() {
  showErrMsg.style.display = 'block';
  for (var i = 0; i < formControl.length; i++) {
    formControl[i].classList.add("validError")
  }
}

function removeErrCss() {
  showErrMsg.style.display = 'none';
  for (var i = 0; i < formControl.length; i++) {
    formControl[i].classList.remove("validError")
  }
}

// To check whether one of the card type is checked or not
function radiosCheck() {
  var radios = document.getElementsByName('inlineRadioOptions');
  var res;
  for (var i = 0; i < radios.length; i++) {
    if (radios[i].checked == true) {
      res = true;
    }
    return res;
  }
}

// To check all blank and check box is filled in 
function validation() {
  var submit = document.getElementById('submitButton');
  var nameIsValid = inputName.checkValidity();
  var addressIsValid = inputAddress.checkValidity();
  var emailIsValid = inputEmail.checkValidity();
  var cardNoIsValid = inputCardNo.checkValidity();
  var checkIsValid = invalidCheck.checkValidity();
  var radiosIsValid = radiosCheck();

  /* If only one field no match to condition for validation,
    it calls errCss function to add "ValidErr" class */
  if (nameIsValid == false || addressIsValid == false || emailIsValid == false || cardNoIsValid == false || checkIsValid == false || radiosIsValid == false) {
    errCss();

    /* If all field is satisfied with condition, 
    it'll remove the "ValidErr" class and show the confirm message. */
  } else {
    removeErrCss();
    showMsg();
  }
}

// To show the message when success to validation test
function showMsg() {
  var forMsg = document.getElementById('forMsg');
  var userName = document.getElementById('inputName').value;
  var userEmail = document.getElementById('inputEmail').value;
  var userAddress = document.getElementById('inputAddress').value;
  var cardType = '';

  // To make encrypted card number.
  var res = '';
  var creditNo = document.getElementById('inputCardNo').value.slice(0, 4);
  var encrypted = document.getElementById('inputCardNo').value.slice(5).split('');

  function creditNoEncrypted() {
    for (var i = 0; i <= encrypted.length; i++) {
      res += '*';
    }
    return creditNo = creditNo + res
  };

  // To get the name of card type with 'checked'
  function getCardType() {
    // get list of radio buttons with specified name
    var radios = document.getElementsByName('inlineRadioOptions');
    // loop through list of radio buttons
    for (var i = 0; i < radios.length; i++) {
      if (radios[i].checked == true) {
        cardType = radios[i].parentElement.textContent;
      }
    }
  }

  creditNoEncrypted();
  getCardType();

  // To show confirm message
  forMsg.innerHTML = 'Hi <b>[' + userName + ']</b> <br />Thanks for purchasing our product using your <b>[' + cardType + ']</b><br /> credit card no. <b>[' + creditNo + ']</b> <br /> We will email your receipt on <b>[' + userEmail + ']</b> <br /> and send the product to <b>[' + userAddress + ']</b>';

  // when message is being shown, it'll have padding 
  forMsg.style.paddingBottom = "3rem";
}

// Add event listener, It calls validation function when submit button is pressed.
document.getElementById('submitButton').addEventListener("click", validation);