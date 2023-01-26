var registerform = document.getElementById("registerform");

function RegisterValidate() {
  const fetchr = new FormData(registerform);

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("validate").innerHTML = this.responseText;
    }
  };


  xhttp.open("POST", "includes/registervalidate.php");

  xhttp.send(fetchr);
}