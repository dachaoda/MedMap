createCalender();
createMedItem();
createMedItem();
createMedItem();
createMedItem();
createMedItem();
createMedItem();

function createCalender() {
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var weekdays = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];
    var d = new Date();
    var date = d.getDate();
    var weekday = d.getDay();
    var month = months[d.getMonth()];
    var year = d.getFullYear();

    document.getElementById("year").innerHTML = month + '<br> <span>' + year + '</span>';

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

}

function createMedItem() {
    //random medication name for testing
    med = 'testmed' + Math.floor(Math.random()* 50);

    var a = document.createElement("div");
    a.id = med;
    a.classList.add("meditem");

    var b = document.createElement("li");
    b.innerHTML = med;

    var c = document.createElement("div");
    c.classList.add("button");

    var e = document.createElement("input");
    e.setAttribute("name", med);
    //random quantity for testing
    e.setAttribute("value", Math.floor(Math.random()* 50));
    e.setAttribute("min", "0");
    e.setAttribute("maxlength", "3");
    e.setAttribute("type", "number");
    e.setAttribute("readonly", true);
    e.classList.add("quantity");

    var g = document.createElement("button");
    g.innerHTML = "Add to Cart"
    g.setAttribute("onclick", "createCartItem(this)");
    g.setAttribute("name", med);


    c.appendChild(e);
    c.appendChild(g);
    a.appendChild(b);
    a.appendChild(c);

    document.getElementById("medlist").appendChild(a);
    console.log("created item");

}

function createCartItem(input) {
    
    var med = input.getAttribute("name") +'cart';
    var name = input.getAttribute("name");

    var a = document.createElement("div");
    a.id = med;
    a.classList.add("meditem");

    var b = document.createElement("li");
    b.innerHTML = input.getAttribute("name");

    var c = document.createElement("div");
    c.classList.add("button");

    var d = document.createElement("button");
    d.setAttribute("name", med);
    d.setAttribute("onclick", "add(this)");
    d.innerHTML = '+';

    var e = document.createElement("input");
    e.setAttribute("name", med);
    e.setAttribute("value", "0");
    e.setAttribute("min", "0");
    e.setAttribute("maxlength", 3);
    e.setAttribute("type", "number");
    e.classList.add("quantity");

    console.log(e)

    var f = document.createElement("button");
    f.setAttribute("name", med);
    f.setAttribute("onclick", "minus(this)");
    f.innerHTML = '-';

    var g = document.createElement("button");
    g.innerHTML = "remove"
    g.setAttribute("onclick", "removeitem(this)");
    g.setAttribute("name", med);


    c.appendChild(d);
    c.appendChild(e);
    c.appendChild(f);
    c.appendChild(g);
    a.appendChild(b);
    a.appendChild(c);

    document.getElementById("cart").appendChild(a);
    console.log("added item to cart");

}

function removeitem(input) {
    var cartitem = input.getAttribute("name");
    console.log("cartitem");
    document.getElementById(cartitem).remove();

}

function clearAll(){
    document.getElementById("cart").innerHTML ='';
}

function add(input) {
    var med = input.getAttribute("name");
    var mvalue = document.getElementById(med).getElementsByClassName("quantity")[0];
    var quan = mvalue.value;
    console.log(quan);
    console.log(mvalue);
    if (quan++ >= 10) {
        mvalue.setCustomValidity('Amount too large! Could cause safty concerns.');
        mvalue.reportValidity(false);
        console.log(failed)
    }else{
        mvalue.setAttribute("value", quan);
    }
}

function minus(input) {
    var med = input.getAttribute("name");
    var mvalue = document.getElementById(med).getElementsByClassName("quantity")[0];
    var quan = mvalue.value;
    console.log(quan);
    console.log(mvalue);
    if (quan-- < 1) {
        mvalue.setCustomValidity('Negative quantity are not allowed');
        mvalue.reportValidity(false);
        console.log(failed)
    }else{
        mvalue.setAttribute("value", quan);
    }
}

function addtoCart(input) {
    var med = input.getAttribute("name");

}



$(document).ready(function () {


});