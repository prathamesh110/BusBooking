var userloginform = document.getElementById("userloginform");
const submit = document.getElementById("ualbtn");

function loginValidate() {
  const fetchl = new FormData(userloginform);

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    try {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("loginbtn").innerHTML = this.responseText;
      }
    }catch (e){
      console.error('Could not Found!')
    }
  };


  xhttp.open("POST", "includes/userloginval.php");

  xhttp.send(fetchl);
}