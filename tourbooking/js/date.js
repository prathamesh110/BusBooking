$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    $('#date').attr('min', maxDate);
});


/*---------------------------------------------exchange-------------------------------------------------------------------------------------*/

function exchange(){
    var temp;
    var x=document.getElementById('source').value;
    var y=document.getElementById('dest').value;
    temp=x;
    x=y;
    y=temp;
    document.getElementById('source').value = x;
    document.getElementById('dest').value= y;

}
/*-----------------------------------------------------------------------------------------------*/
