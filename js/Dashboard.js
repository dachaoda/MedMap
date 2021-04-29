createCalender();

function createCalender() {
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var weekdays = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];
    var d = new Date();
    var date = d.getDate();
    var weekday = d.getDay();
    var month = months[d.getMonth()];
    var year = d.getFullYear();

    document.getElementById("year").innerHTML = year;
    document.getElementById("month").innerHTML = month;

    var counter = weekday;
    var counts = date;
    
    while (counter >= 0) {
        document.getElementById(counter).innerHTML = counts;
        counts--;
        counter--;
    }
    counter = weekday;
    counts = date;
    while (counter <= 6) {
        document.getElementById(counter).innerHTML = counts;
        counts++;
        counter++;
    }


    console.log('created Calender')

}




$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})


var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')
  
myModal.addEventListener('shown.bs.modal', function () {
    myInput.focus()
})