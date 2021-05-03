setDate();
function setDate(){
    console.log('set date');
    var weekdays = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
    var d = new Date();
    console.log(d);
    var date = d.getFullYear() + '-' + (d.getMonth()+1) + '-' + d.getDate();
    console.log(date);
    var weekday = weekdays[d.getDay()];
    console.log(weekday);

    document.getElementById("1").setAttribute("value", date);
    document.getElementById("2").setAttribute("value", weekday);
    document.getElementById("date").submit();
}
