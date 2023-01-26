var parentf = document.getElementById('res-search-bg');


function seats(a) {
  var viewid = a.id;
  console.log(seatarrsl);
  var mp = document.getElementById(viewid).previousSibling.parentElement.parentElement.parentElement;
  var closeview = mp.nextElementSibling;
  const seatdata = new FormData();
  seatdata.append("btnid", viewid);
  if (typeof closeview === 'undefined' || closeview === null) {
    var seat = new XMLHttpRequest();
    seat.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        mp.insertAdjacentHTML("afterend" , this.responseText);
      }
    };
    seat.open("POST", "includes/seat_res.php");
    seat.send(seatdata);
  }
  else{
    if (closeview.className === 'seats-book-active') {
      closeview.className = 'seats-book-disable';
      seatarrsl.length = 0;
      seatarr.length = 0;
      closeview.remove();
    }
  }
}

