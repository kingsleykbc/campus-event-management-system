//Validate Form
var errors = 0;
$('#submit-event').click(function(e){
    var formData = $("#eventForm :input").serializeArray();
    $('#error').html('');
    
    //Slight Form Validation
    errors = validateInput(formData);

    //Check the DB for similar date and venue
    $.ajax({
        url:"./php/checkDate.php",
        method:'post',
        data:{
            date: $('#date').val(),
            venue: $('#venue').val()
        },
        success:function (data){
            if(data != ""){
                $('#error').html(data);
                errors++;
            }else{
                if (errors <= 0) {
                    $.post($("#eventForm").attr("action"), formData, function (data) {
                        $("#add-event").empty();
                        $("#add-event").html(data);
                    });
                }
            }
        },
        error:function(error){
            console.log(error);
        }
    });
});

$("#add-event").submit(function () {
    return false;
});

//Validate the fields
function validateInput(data){
    var errors = 0;
    $('.form-error').html("");
    for(i = 0; i < data.length; i++){
        if (data[i].value == "" || data[i].value == "--"){            
            $('#'+data[i].name+'E').html("This field cannot be empty");
            errors++
        }else{
            if (!isNaN(data[i].value)){
                $('#'+data[i].name+'E').html("This field cannot be Numeric");
            }
        }
    }
    return errors;
}
