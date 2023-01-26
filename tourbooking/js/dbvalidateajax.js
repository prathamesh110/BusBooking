

function dp(bd){
	var bdid = bd.id;
	console.log(bdid);
	var boardclick = document.getElementById("board-btn");
	var dropclick = document.getElementById("drop-btn");
	const idsplit = bdid.split('-');
        const Pbdid = idsplit[1];
	const boardid = new FormData();
        boardid.append("boardid", Pbdid);
	if (boardclick.className === "board-btn") {
		boardclick.className = "board-btnn";
		dropclick.className = "drop-btnn";
		var bclick = new XMLHttpRequest();
                bclick.onreadystatechange = function() {
                	if (this.readyState == 4 && this.status == 200) {
                		document.getElementById("db-content").innerHTML = this.responseText;
                        }
                };
                bclick.open("POST", "includes/bdvalidate.php");
                bclick.send(boardid);
	}
	
}


function bp(dg){
	var dgid = dg.id;
	console.log(dgid);
	const idsplit = dgid.split('-');
        const Pdgid = idsplit[1];
	const dropid = new FormData();
        dropid.append("dropid", Pdgid);
	var proceed = new XMLHttpRequest();
        proceed.onreadystatechange = function() {
        	if (this.readyState == 4 && this.status == 200) {
        		document.getElementById("db-main").innerHTML = this.responseText;
                }
        };
        proceed.open("POST", "includes/proceed.php");
        proceed.send(dropid);
}

/*
function change(){
	const seatarray = new FormData();
        seatarray.append("seatarr", seatarr);
	var changeclick = new XMLHttpRequest();
	changeclick.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("db-content").innerHTML = this.responseText;
                }
        };
    changeclick.open("POST", "includes/dbvalidate.php");
    changeclick.send(seatarray);
} */