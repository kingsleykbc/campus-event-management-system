$('#accept').click(function () {
    //if the user clicked on the accept button
    updateStatus(1);
});
$('#decline').click(function(){
    //if the user clicked on the reject button
    updateStatus(3);
});


//Function to make ajax call to the server and update the status
function updateStatus(num) {
    var e_ID = $('#e_ID').html(); //Event ID

    $.ajax({
        url: "./php/updateStatus.php",
        method: "post",
        data: {
            e_ID,
            num
        },
        success: function (data) {
            $('#adminApproval').html('');
            $('#adminApproval').html(data);
        },
        error: function (error) {
            console.log(error);
        }
    });
}