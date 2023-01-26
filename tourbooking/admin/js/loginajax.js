var adminloginform = document.getElementById("adminloginform");
const submit = document.getElementById("albtn");

function loginValidate() {
  const fetchl = new FormData(adminloginform);

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    try {
      if (this.readyState == 4 && this.status == 200) {
        responseObject = document.getElementById("loginbtn").innerHTML = this.responseText;
      }
    }catch (e){
      console.error('Could not Found!')
    }
  };


  xhttp.open("POST", "includes/loginvalidate.php");

  xhttp.send(fetchl);
}