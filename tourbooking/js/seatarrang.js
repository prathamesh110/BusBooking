


/*function seatarr(b){
	const seatno = b.value;
    var seatfid = b.id;
    const idsplit = seatfid.split('-');
    const seatid = idsplit[1];
    if (seatfid) {

    	
    }
}*/
var seatarr = [];
function seatp(p){
    const pid = p.id;
    var pvalue = p.value;
    if (seatarr.length < 6) {
        if(p.className === 'seatn-disable') {
            p.className = 'seatn-active';
            seatarr.push(pvalue);
            const seatarray = new FormData();
            seatarray.append("seatarr", seatarr);
            var dbpoint1 = new XMLHttpRequest();
            dbpoint1.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("dbpoints").innerHTML = this.responseText;
                }
            };
            dbpoint1.open("POST", "includes/dbpoints.php");
            dbpoint1.send(seatarray);

            var dbfare1 = new XMLHttpRequest();
            dbfare1.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("db-fare").innerHTML = this.responseText;
                }
            };
            dbfare1.open("POST", "includes/fareb.php");
            dbfare1.send(seatarray);
        }
        else{
            if(p.className === 'seatn-active') {
                p.className = 'seatn-disable';
                const seatr = seatarr.indexOf(pvalue);
                if (seatr > -1) {
                    seatarr.splice(seatr, 1);
                    if (seatarr.length < 1) {
                        var seatL1 = new XMLHttpRequest();
                        seatL1.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("dbpoints").innerHTML = this.responseText;
                            }
                        };
                        seatL1.open("POST", "includes/seatlegend.php");
                        seatL1.send();
                    }
                    else{
                        const seatarray = new FormData();
                        seatarray.append("seatarr", seatarr);
                        var dbpoint1 = new XMLHttpRequest();
                        dbpoint1.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("dbpoints").innerHTML = this.responseText;
                            }
                        };
                        dbpoint1.open("POST", "includes/dbpoints.php");
                        dbpoint1.send(seatarray);

                        var dbfar1 = new XMLHttpRequest();
                        dbfar1.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("db-fare").innerHTML = this.responseText;
                            }
                        };
                        dbfar1.open("POST", "includes/fareb.php");
                        dbfar1.send(seatarray);
                    }
                }  
            }
        }
    }
    else{
        if (seatarr.indexOf(pvalue) !== -1) {
            const seatr = seatarr.indexOf(pvalue);
            p.className = 'seatn-disable';
            seatarr.splice(seatr, 1);
            
            const seatarray = new FormData();
            seatarray.append("seatarr", seatarr);
            var dbfar1 = new XMLHttpRequest();
            dbfar1.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("db-fare").innerHTML = this.responseText;
                }
            };
            dbfar1.open("POST", "includes/fareb.php");
            dbfar1.send(seatarray);
        }
        else{
            window.alert("The maximum number of seats that can be selected is 6");
        }
        
    }
         
}

/*---------------------------------------------------------sleeper---------------------------------------------------*/

var seatarrsl = [];
function seatsl(x){
    const xid = x.id;
    var xvalue = x.value;
    if (seatarrsl.length < 6) {
        if(x.className === 'seatsl-disable') {
            seatarrsl.push(xvalue);
            x.className = 'seatsl-active';
            const seatarray = new FormData();
            seatarray.append("seatarr", seatarrsl);
            var dbpoint2 = new XMLHttpRequest();
            dbpoint2.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("dbpoints").innerHTML = this.responseText;
                }
            };
            dbpoint2.open("POST", "includes/dbpoints.php");
            dbpoint2.send(seatarray);

            var dbfare2 = new XMLHttpRequest();
            dbfare2.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("db-fare").innerHTML = this.responseText;
                }
            };
            dbfare2.open("POST", "includes/fareb.php");
            dbfare2.send(seatarray);


        }
        else{
            if(x.className === 'seatsl-active') {
                x.className = 'seatsl-disable';
                const seatsl = seatarrsl.indexOf(xvalue);
                if (seatsl > -1) {
                    seatarrsl.splice(seatsl, 1);
                    if (seatarrsl.length < 1) {
                        var seatL2 = new XMLHttpRequest();
                        seatL2.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("dbpoints").innerHTML = this.responseText;
                            }
                        };
                        seatL2.open("POST", "includes/seatlegend.php");
                        seatL2.send();
                    }
                    else{
                        const seatarray = new FormData();
                        seatarray.append("seatarr", seatarrsl);
                        var dbpoint2 = new XMLHttpRequest();
                        dbpoint2.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("dbpoints").innerHTML = this.responseText;
                            }
                        };
                        dbpoint2.open("POST", "includes/dbpoints.php");
                        dbpoint2.send(seatarray);


                        var dbfar2 = new XMLHttpRequest();
                        dbfar2.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("db-fare").innerHTML = this.responseText;
                            }
                        };
                        dbfar2.open("POST", "includes/fareb.php");
                        dbfar2.send(seatarray);
                    }
                }  
            }
        }
    }
    else{
        if (seatarrsl.indexOf(xvalue) !== -1) {
            const seatsl = seatarrsl.indexOf(xvalue);
            seatarrsl.splice(seatsl, 1);
            x.className = 'seatsl-disable';

            const seatarray = new FormData();
            seatarray.append("seatarr", seatarrsl);
            var dbfar2 = new XMLHttpRequest();
            dbfar2.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("db-fare").innerHTML = this.responseText;
                }
            };
            dbfar2.open("POST", "includes/fareb.php");
            dbfar2.send(seatarray);
        }
        else{
            window.alert("The maximum number of seats that can be selected is 6");
        }
        
    }
         
}