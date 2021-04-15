
function ValidateRegister(){
    var form = document.getElementById("RegisterForm");
    form.submit();
    console.log("Login input validated")
    
    //wait for server response
    console.log("User Registered Successfully");

    window.location.href  = "Login.html";

}

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