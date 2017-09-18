$(document).ready(function() {

    $("#captureButtonMsz").click(function() {
        document.getElementById('captureModalMsz').style.display = "block";
    });

    window.onclick = function(event) {
        if (event.target == document.getElementById('captureModalMsz')) {
            document.getElementById('captureModalMsz').style.display = "none";
            $("#captureInputModalMsz").removeClass("capture-page-modal-input-error");
            $("#modalNotifMsz").addClass("hidden");
            $("#captureInputModalMsz").val("");
        }
    };

    $("#modalCloseMsz").click(function() {
        document.getElementById('captureModalMsz').style.display = "none";
        $("#captureInputModalMsz").removeClass("capture-page-modal-input-error");
        $("#modalNotifMsz").addClass("hidden");
        $("#captureInputModalMsz").val("");
    });

    $("#captureButtonModalMsz").click(function() {
        var email = $("#captureInputModalMsz").val();
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        var tld = window.location.href.split('/')[2];
        tld = tld.substr(tld.length - 2, 2);
        if(tld == "om") {
            tld = "com";
        }

        var url = "http://www.brankoconnect.".concat(tld);

        var req = "sub_email_msz";

        if(re.test(email)) {
            $.post(
                req,
                {
                    "email": email
                },
                function(data) {
                    if(data === "") {
                        window.location.replace(url);
                    } else {
                        $("#subSuccess").text("Something went wrong, please try again later");
                        $("#subSuccess").removeClass("hidden");
                        document.getElementById('captureModalMsz').style.display = "none";
                    }
                }
            );
        } else {
            $("#captureInputModalMsz").addClass("capture-page-modal-input-error");
            $("#modalNotifTextMsz").text("Enter a valid email address.");
            $("#modalNotifMsz").removeClass("hidden");
        }
    });
});