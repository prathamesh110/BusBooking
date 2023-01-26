var bkform = document.getElementById("frmsearch");

function loadDoc() {
  const fetchv = new FormData(bkform);

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("bus-res").innerHTML = this.responseText;
    }
  };


  xhttp.open("POST", "includes/bus_res1.php");

  xhttp.send(fetchv);
}