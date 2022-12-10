$(document).ready(function(){
    $("#food_name").keyup(function(){
        onInput("#food_name");
    });

    $("#food_desc").keyup(function(){
        onInput("#food_desc");
    });

    $("#food_price").click(function(){
        onNumber("#food_price");
    });

    $("#image").click(function(){
        onImage("#image");
        console.log($(this).val());
    });
   

    $("#add_prod-button").click(function(){
        var name = $("#food_name").val().trim();
        var food_desc = $("#food_desc").val().trim();
        var food_price = $("#food_price").val();
        var file = $("#image").val();
        var category;
        if(onInput("#category")) category = $("#category").val();
        if(validateInput(category) && validateInput(name) && 
        validateInput(food_desc) && validateNumber(food_price) && 
        onImage("#image")){
            
        }
    });


});

function validateInput(input){
    if(input == null || input.trim()=="" || input.trim()==null) return false;
    return true;
}

function validateNumber(input){
    if(input == null || input<=0) return false;
    return true;
}

function validateImage(input){
    if(input == null) return false;
    return true;
}

function onImage(input){
    if(validateImage($(input).val())){
        $(input).css('border-bottom', '2px solid green');
        return true;
    }else {
        $(input).css('border-bottom', '2px solid red');
        return false;
    }
}

function onNumber(input){
    if(validateNumber($(input).val())){
        $(input).css('border-bottom', '2px solid green');
    }else {
        $(input).css('border-bottom', '2px solid red');
    }
}

function onInput(input){
    if(validateInput($(input).val())){
        $(input).css('border-bottom', '2px solid green');
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
        },
        dataType:"json",
    }); 

}

function process_result(data){
    if(data==0){
        alert("Successfully added");
    }
    else if(data==1){
        alert("Failed to add");
    }
}