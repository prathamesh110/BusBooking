function change(){
	const seatarray = new FormData();
    seatarray.append("seatarr", seatarr);
	var changeclick = new XMLHttpRequest();
	changeclick.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("dbpoints").innerHTML = this.responseText;
                }
        };
    changeclick.open("POST", "includes/dbvalidate.php");
    changeclick.send(seatarray);
} 