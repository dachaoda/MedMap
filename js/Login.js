
function ValidateLogin(){
    var form = document.getElementById("LoginForm");
    form.submit();
    console.log("Login input validated")
    
    //wait for server response
    console.log("UserLogin Validated")

    window.location.href  = "dashboard.html";

}

function TogglePasswordVisual(){

    var pwicon = document.getElementById("passwordVisual");
    var pw = document.getElementById("password")

    if (pwicon.className == "fas fa-eye-slash"){
        pwicon.className = "fas fa-eye";
        pw.type = "text"
        
    }else{
        pwicon.className = "fas fa-eye-slash";
        pw.type = "password"

    }
}