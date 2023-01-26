function Tsucesst(usid){
	useid = usid.id;
    console.log(useid);
	const fuserid = useid.split("-");
	console.log(fuserid[1]);
	console.log(fuserid[0]);
	const tourdata = new FormData();
    tourdata.append("btnid", fuserid[0]);
	if (fuserid[1] > 0) {
		//window.location.assign("includes/Toursucess.php");
		var tbook = new XMLHttpRequest();
		tbook.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200){
				document.getElementById('sucess-fetch').innerHTML = this.responseText
                                                            
            }
        };
		tbook.open("POST", "includes/Toursucess.php");
        tbook.send(tourdata);
		
	}
	else{
		window.alert("Please Login");
	}
}