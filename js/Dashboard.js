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
    var nd = new Date();
    nd.setDate(d.getDate()-3)    
    console.log( nd.getDate());

    
    while (counter >= 0) {
        console.log(counter);
        console.log('-');

        nd.setDate(d.getDate()-counter);    
    
        document.getElementById(counter).innerHTML = nd.getDate();
        

        counter--;
    }
    var counter = weekday;

    while (counter <= 6) {
        console.log(counter);
        console.log('-');
    
  
        nd.setDate(d.getDate()+counter);    
    
        document.getElementById(counter).innerHTML = nd.getDate();;

        counter++;
    }


    console.log('created Calender')

}

function enableMedAll(){
    console.log('enable ALL');
    var All = document.getElementById("AllMedication");
    var Today = document.getElementById("TodayMedication");
    var Allt = document.getElementById("alltrigger");
    var Todayt = document.getElementById("todaytrigger");
    All.hidden = false;
    Today.hidden = true;
    
    Allt.classList.add('active');
    Allt.classList.remove('border-light')
    Allt.classList.remove('text-light')

    Todayt.classList.remove('active');
    Todayt.classList.add('border-light');
    Todayt.classList.add('text-light');
}

function enableMedToday(){
    console.log('enable today');    
    var All = document.getElementById("AllMedication");
    var Today = document.getElementById("TodayMedication");
    var Allt = document.getElementById("alltrigger");
    var Todayt = document.getElementById("todaytrigger");
    All.hidden = true;
    Today.hidden = false;

    Todayt.classList.add('active');
    Todayt.classList.remove('border-light')
    Todayt.classList.remove('text-light')

    Allt.classList.remove('active');
    Allt.classList.add('border-light');
    Allt.classList.add('text-light');
}

function setQ(input){
    var name = input.getAttribute("name");
    console.log(input.max)
    if(input.value > input.max){
        input.setAttribute('value', input.max);
        input.setCustomValidity('Quantity cannot be larger than storage, Maximum value will be used instead');
        input.reportValidity(false);

    }else if(input.value < input.min){
        input.setAttribute('value', input.min);
        input.setCustomValidity('Negative quantity are not allowed, Minimum value will be used instead');
        input.reportValidity(true);
    }else{
        input.setCustomValidity('');
        input.reportValidity(true);
    }
    var q = input.max - input.value;
    document.getElementById(name).setAttribute('value', q);

    console.log(input.value)

}


$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})


var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')
  
var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})

var toastElList = [].slice.call(document.querySelectorAll('.toast'))
var toastList = toastElList.map(function (toastEl) {
  return new bootstrap.Toast(toastEl)
})


myModal.addEventListener('shown.bs.modal', function () {
    myInput.focus()
})
