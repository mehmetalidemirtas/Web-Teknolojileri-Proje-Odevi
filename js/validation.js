function validation() {
  var firstName = document.getElementById("firstName").value;
  var lastName = document.getElementById("lastName").value;
  var email = document.getElementById("email").value;
  var message = document.getElementById("message").value;
  var error_message = document.getElementById("error_message");
  if (firstName == "") {
    alert("Lütfen adınızı giriniz");
    return false;
  }
  if (lastName == "") {
    alert("Lütfen soyisminizi giriniz");
    return false;
  }
  if (email == "") {
    alert("Lütfen email adresinizi giriniz");
    return false;
  }
  if (message == "") {
    alert("Lütfen mesajınızı yazınız");
    return false;
  }

}

function isEmail(email) {
  let regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
  return regex.test(String(email).toLowerCase());
}