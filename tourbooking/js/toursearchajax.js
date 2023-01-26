var tbkform = document.getElementById("frmsearch");

function loadDoc() {
  const fetchv = new FormData(tbkform);

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("bus-res").innerHTML = this.responseText;
    }
  };


  xhttp.open("POST", "includes/tour_res1.php");

  xhttp.send(fetchv);
}