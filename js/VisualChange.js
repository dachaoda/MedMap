function ToggledropdownVisual(){

    var icon = document.getElementById("dropdownicon");

    if (icon.className == "btn-lg fas fa-angle-double-up fa-2x"){
        icon.className = "btn-lg fas fa-angle-double-down fa-2x";
        
    }else{
        icon.className = "btn-lg fas fa-angle-double-up fa-2x";

    }
}