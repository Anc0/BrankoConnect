$(document).ready(function() {

    $("#autoSend").click(function() {
        $.get("/brankoosebna/autoresponder/send_messages",function(data) {

            data = JSON.parse(data);
            console.log(data.length);
            content = "";
            for(i = 0; i < data.length; i ++) {
                if('message' in data[i]) {
                    if('contact' in data[i]) {
                        content = content.concat('<p> Day: ');
                        content = content.concat(i+1);
                        content = content.concat('<br>Message: ');
                        content = content.concat(data[i]["message"]["subject"]);
                        content = content.concat('<br>Contacts: ');
                        content = content.concat("<ul>");
                        for(j = 0; j < data[i]["contact"].length; j++) {
                            content = content.concat("<li>");
                            content = content.concat(data[i]["contact"][j]["email"]);
                            content = content.concat("</li>")
                        }
                        content = content.concat('</ul><br>Success: ');
                        content = content.concat(data[i]["valid"]);
                        content = content.concat('<br></p>');
                    } else {
                        content = content.concat("<p>There are no contacts on day ");
                        content = content.concat(i+1);
                        content = content.concat(".</p>");
                    }

                } else {
                    content = content.concat("<p>There is no message for day ");
                    content = content.concat(i+1);
                    content = content.concat(".<p>")
                }

            }
            console.log(content);
            $("#modalReportBody").html(content);
            $("#modalSendReport").modal('show');
        });
    });

    tinymce.init({
        selector:'.auto-content-area',
        plugins: 'textcolor image link code',
        menubar: false,
        toolbar: 'undo redo | copy paste cut | bold italic underline | fontselect | fontsizeselect | forecolor backcolor | alignleft aligncenter alignright alignjustify | link image | code',
        branding: false,
        font_formats: 'Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Courier=courier,courier;Courier New=courier new,courier;Georgia=georgia,palatino;Tahoma=tahoma,arial,helvetica,sans-serif;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;'
    });

});