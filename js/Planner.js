

function eventcheckRepeat(checkbox) {
    console.log('hi');

    console.log(checkbox.checked);
    var EndDate = document.getElementById('eventEndDateBox');
    var WeekDay = document.getElementById('checkWeekdayBox');

    if (checkbox.checked) {
        EndDate.classList.add('invisible')
        WeekDay.classList.add('invisible')
    }else if (!checkbox.checked) {
        EndDate.classList.remove('invisible')
        WeekDay.classList.remove('invisible')

    }
    console.log(EndDate);
    console.log(WeekDay);
}

