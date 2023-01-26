var registerform = document.getElementById("uregisterform");

function URegisterValidate() {
  const fetchur = new FormData(registerform);

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("validate").innerHTML = this.responseText;
    }
  };


  xhttp.open("POST", "includes/userregistervalidate.php");

  xhttp.send(fetchur);
}