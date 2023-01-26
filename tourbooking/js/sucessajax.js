function sucesst(usid){
	useid = usid.id;
    console.log(useid);
	const fuserid = useid.split("-");
	console.log(fuserid[1]);
	if (fuserid[1] > 0) {
		window.location.assign("includes/sucess.php");
	}
	else{
		window.alert("Please Login");
	}
}