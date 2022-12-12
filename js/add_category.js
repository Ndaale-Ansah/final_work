$(document).ready(function(){
    $("#add_category").keyup(function(){
        onInput("#add_category");
    });

    $("#view_cat-button").click(function(){
        window.location.href = '../Admin/view_category.php';
    });

    $("#add_cat-button").click(function(){
        var category = $("#add_category").val().trim();
        if(validateInput(category)){
            send_data("../actions/add_category.php", "POST", {
                addcatbtn: true,
                cat_name: category,
            },
            process_result);
        }
    });


});

function validateInput(input){
    if(input == null || input.trim()=="" || input.trim()==null || input.length>100) return false;
    return true;
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
        // TODO: implement success dialog for add category
    }
    else if(data==1){
        // TODO: implement fail dialog for add category
    }
}