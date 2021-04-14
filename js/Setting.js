intialSettings("testfname", "testlname", "test@email.com");


function checkPassword(){
    var pw = document.getElementById("password");
    var cpw = document.getElementById("cpassword");

    if (pw.value != cpw.value) {
        cpw.setCustomValidity('Password does not match');
        cpw.reportValidity(false);
    }else{
        cpw.setCustomValidity('');
        cpw.reportValidity(true);
    }
    
}

function submitChange(input){
    //send info to sever
    var v = document.getElementById(input).value;
    console.log(v);
}

function intialSettings(fname, lname, email){
    //required server data
    document.getElementById("fname").setAttribute("placeholder", fname);
    document.getElementById("lname").setAttribute("placeholder", lname);
    document.getElementById("email").setAttribute("placeholder", email);
}