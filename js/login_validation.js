var email_regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
var password_regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/gm;

$(document).ready(function(){
    $("#login-email").keyup(function(){
        onRegexInput("#login-email", email_regex);
    });

    $("#login-pwd").keyup(function(){
        onRegexInput("#login-pwd", password_regex);
    });

    $("#login-button").click(function(){
        var email = $("#login-email").val();
        var pwd = $("#login-pwd").val();
        if(
        validateRegex(email, email_regex) && validateRegex(pwd, password_regex)){
            var data = {
                login: true,
                customer_email: email,
                password: pwd
            }
            send_data("../login/login_process.php", "POST", data, login_validation);
        }
    });





});

function validateInput(input){
    if(input == null || input.trim()=="" || input.trim()==null) return false;
    return true;
}

function validateRegex(input, regex){
    if(validateInput(input)==false)return false;
    if(!input.match(regex))return false;
    return true;

}

function onInput(input){
    if(validateInput($(input).val())){
        $(input).css('border-bottom', '2px solid green');
    }else {
        $(input).css('border-bottom', '2px solid red');
    }
}

function onRegexInput(input, regex){
    if(validateRegex($(input).val(), regex)){        $(input).css('border-bottom', '2px solid green');
    }else {
        $(input).css('border-bottom', '2px solid red');
    }
}

function send_data(url, method, data_object, success_function){
    $.ajax({
        url: url,
        method: method,
        data: data_object,
        success: function(data){
            success_function(data);
        }
    }); 

}

function login_validation(data){
    console.log(data);
    if(data=="0"){
        document.location.href = '../index.php';
    }
    else if(data =="1"){
        // implement dialog box for incorrec password
        console.log("password incorrect");
    }
    else if(data =="2"){
        // implement dialog box for failed login
        console.log("login failed");
    }
}