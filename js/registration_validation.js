var phone_regex = /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/g;
var email_regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
var password_regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/gm;


$(document).ready(function(){
    $("#first_name").keyup(function(){
        onInput("#first_name");
    });

    $("#last_name").keyup(function(){
        onInput("#last_name");
    });

    $("#email").keyup(function(){
        onRegexInput("#email", email_regex);
    });

    $("#contact").keyup(function(){
        onRegexInput("#contact", phone_regex);
    });

    $("#pwd").keyup(function(){
        onRegexInput("#pwd", password_regex);
    });

    $("#conf_pwd").keyup(function(){
        if( validateInput($(this).val()) && $(this).val()==$("#pwd").val()){
            $(this).css('border-bottom', '1px solid green');
            return;
        }else {
            $(this).css('border-bottom', '1px solid red');
        }
    });

    $("#register-button").click(function(e){

        var f_name = $("#first_name").val().trim();
        var l_name = $("#last_name").val().trim();
        var email = $("#email").val().trim();
        var contact = $("#contact").val().trim();
        var pwd = $("#pwd").val();
        var conf_pwd = $("#conf_pwd").val();

        if(validateInput(f_name) && validateInput(l_name) && 
        validateRegex(email, email_regex) && validateRegex(contact, phone_regex) &&
        validateRegex(pwd, password_regex) && pwd == conf_pwd){
            var data = {
                register: true,
                first_name: f_name, 
                last_name: l_name,
                customer_email: email,
                contact: contact,
                password: pwd
            }
            send_data("../login/register_process.php", "POST", data, registration_validation);
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
        return;
    }else {
        $(input).css('border-bottom', '2px solid red');
    }
}

function onRegexInput(input, regex){
    if(validateRegex($(input).val(), regex)){
        $(input).css('border-bottom', '2px solid green');
        return;
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

function registration_validation(data){
    console.log(data);
    if(data=="0"){
        window.location.href = '../login/login.php';
    }
    else if(data =="1"){
        // implement dialog box for insertion failure
        console.log("registration failed");
    }
    else if(data =="2"){
        // implement dialog box for email duplicate in DB
        console.log("Email duplication");
    }
}
