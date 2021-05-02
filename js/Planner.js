

function eventcheckRepeat(checkbox) {
    console.log('CheckBox Function');

    console.log(checkbox.checked);
    var EndDate = document.getElementById('eventEndDateBox');
    var WeekDay = document.getElementById('checkWeekdayBox');
    var EndDateinput = document.getElementById('eventEndDate');

    if (checkbox.checked) {
        EndDate.classList.add('invisible')
        WeekDay.classList.add('invisible')

        EndDate.disabled = true;
        WeekDay.disabled = true;
        EndDateinput.required = false;
    }else if (!checkbox.checked) {
        EndDate.classList.remove('invisible')
        WeekDay.classList.remove('invisible')

        EndDate.disabled = false;
        WeekDay.disabled = false;
        EndDateinput.required = true;

    }
    console.log(EndDate);
    console.log(WeekDay);
}

function validate() {
    console.log('input validate');
    if(checkWeekdays()){

        return true;
    }
    return false;

}

function checkWeekdays(){
    var repeat = document.getElementById("checkRepeat");
    var Mon = document.getElementById("checkMon").checked;
    var Tue = document.getElementById("checkTue").checked;
    var Wed = document.getElementById("checkWed").checked;
    var Thu = document.getElementById("checkThu").checked;
    var Fri = document.getElementById("checkFri").checked;
    var Sat = document.getElementById("checkSat").checked;
    var Sun = document.getElementById("checkSun").checked;

    var weekday = document.getElementById("checkMon");

    if(!(repeat.checked)){
        if(Mon || Tue || Wed || Thu || Fri || Sat || Sun){
            weekday.setCustomValidity('');
            weekday.reportValidity(true);
            return true;  

        }else{
            weekday.setCustomValidity('Must Select At Least One Day for Reoccurrence');
            weekday.reportValidity(false);
            return false;
        }

    }
    return true;  
}

function setMinDate(input){
    document.getElementById("eventEndDate").min = input.value;
}


var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})

var toastElList = [].slice.call(document.querySelectorAll('.toast'))
var toastList = toastElList.map(function (toastEl) {
  return new bootstrap.Toast(toastEl)
})


