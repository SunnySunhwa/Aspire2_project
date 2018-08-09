function validation() {
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
  var submit = document.getElementById('submitButton');
  var nameIsValid = inputName.checkValidity();
  var addressIsValid = inputAddress.checkValidity();
  var emailIsValid = inputEmail.checkValidity();
  var cardNoIsValid = inputCardNo.checkValidity();
  var checkIsValid = invalidCheck.checkValidity();
  var radiosIsValid = radiosCheck();


  if (nameIsValid == false || addressIsValid == false || emailIsValid == false || cardNoIsValid == false || checkIsValid == false || radiosIsValid == false) {
    console.log("fail to get validation");
    var conditionCheck = document.getElementById('invalidCheck').nextElementSibling.nextElementSibling;
    conditionCheck.style.display = 'block';
    var formControl = document.getElementsByClassName('form-control')

    for (var i = 0; i < formControl.length; i++) {
      formControl[i].classList.add("validError")
    }
  } else {
    showMsg();
  }

}





function showMsg() {
  var forMsg = document.getElementById('forMsg');
  var userName = document.getElementById('inputName').value;
  var userEmail = document.getElementById('inputEmail').value;
  var userAddress = document.getElementById('inputAddress').value;
  var cardType = '';

  // To show encrypted card number.
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

  forMsg.innerHTML = 'Hi <b>[' + userName + ']</b> <br />Thanks for purchasing our product using your <b>[' + cardType + ']</b><br /> credit card no. <b>[' + creditNo + ']</b> <br /> We will email you r receipt on <b>[' + userEmail + ']</b> <br /> and send the product to <b>[' + userAddress + ']</b>';

  forMsg.style.paddingBottom = "3rem";
  forMsg.style.margin = 'auto';

}

// add event listener to table
document.getElementById('submitButton').addEventListener("click", validation);