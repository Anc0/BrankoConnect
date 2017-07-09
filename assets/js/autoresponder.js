$(document).ready(function() {

    $("#autoSend").click(function() {
        $.get("/brankoosebna/autoresponder/send_messages",function(data) {
            console.log(data);
            if(data == 1) {
                $("#auto-message").text("Messages sent successfully.");
            } else {
                $("#auto-message").text("Something went wrong, please try again later.");
            }
        });
    });

});