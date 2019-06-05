//Default Variables
var d_ID = 1;
var e_HodApproved = 0;

fetchEvents(d_ID, e_HodApproved);

//Filter
$(".filter").click(function (){
    $(".filter").removeClass("active");
    $(this).addClass("active");
    e_HodApproved = $(this).context.id;

    fetchEvents(d_ID, e_HodApproved);
});

//Navigation
$(".dept").click(function () {
    $(".dept").removeClass("deptActive");
    $(this).addClass("deptActive");
    var d_ID = $(this).context.children[0].innerHTML;

    fetchEvents(d_ID,e_HodApproved);
});

//Fetch all the events for the department the user clicked on
function fetchEvents(d_ID,e_HodApproved) {
    $.ajax({
        url: "./php/fetchEvents.php",
        method: "post",
        data: {
            d_ID: d_ID,
            e_HodApproved:e_HodApproved
        },
        success: function (data) {
            $('#section').html('');
            $('#section').html(data);
        },
        error: function (data) {
            console.log(data);
        }
    });
}
