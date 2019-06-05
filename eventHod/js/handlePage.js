//Default Variables
var e_AdminApproved = 0;

fetchEvents(e_AdminApproved);

//Filter
$(".filter").click(function () {
    $(".filter").removeClass("active");
    $(this).addClass("active");
    e_AdminApproved = $(this).context.id;

    fetchEvents(e_AdminApproved);
});

//Toggle accept and reject
function setResponse(tar,resID,counterpart){

    //Set class to chosen and remove counterpart
    $("#"+counterpart).removeClass("chosen");
    $(tar).addClass("chosen");

    var e_ID = counterpart.slice(3);

    //Update the database
    $.ajax({
        url: "./php/updateEvents.php",
        method: "post",
        data: {
            e_ID,
            resID
        },
        success: function (data) {
            $('#response').html('');
            $('#response').html('Event successfully '+data);            
            fade();
        },
        error: function (data) {
            alert("Server error");
            console.log(data);
        }
    });
}

//Fade animation for the status display
function fade(){
    $('#response').css('display','block');
    $('#response').removeClass('fadeOut');

    setTimeout(() => {
        $('#response').addClass('fadeOut');
        var isSet = true;
    }, 1000);

    if(isSet){
        setTimeout(() => {
            $('#response').removeClass('fadeOut');
            $('#response').css('display','none');
        }, 2000);
        isSet = false;
    }
}

//Fetch events (Filtered from the Database)
function fetchEvents(e_AdminApproved){
    $.ajax({
        url: "./php/fetchEvents.php",
        method: "post",
        data: {e_AdminApproved},
        success: function (data) {
            $('#section').html('');
            $('#section').html(data);
        },
        error: function (data) {
            alert("Server error");
            console.log(data);
        }
    });
}