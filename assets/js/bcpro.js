$(document).ready(function() {

    $("#captureButtonMmm").click(function() {
        document.getElementById('captureModalMmm').style.display = "block";
    });

    window.onclick = function(event) {
        if (event.target == document.getElementById('captureModalMmm')) {
            document.getElementById('captureModalMmm').style.display = "none";
            $("#captureInputModalMsz").removeClass("capture-page-modal-input-error");
            $("#modalNotifMmm").addClass("hidden");
            $("#captureInputModalMmm").val("");
        }
    };

    $("#modalCloseMmm").click(function() {
        document.getElementById('captureModalMmm').style.display = "none";
        $("#captureInputModalMmm").removeClass("capture-page-modal-input-error");
        $("#modalNotifMmm").addClass("hidden");
        $("#captureInputModalMmm").val("");
    });

    $("#captureButtonModalMmm").click(function() {
        var email = $("#captureInputModalMmm").val();
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        var tld = window.location.href.split('/')[2];
        tld = tld.substr(tld.length - 2, 2);
        if(tld == "om") {
            tld = "com";
        }

        var url = "http://www.brankoconnect.".concat(tld).concat("/site/prirocnik");

        var req = "sub_email_mmm";

        if(re.test(email)) {
            $.post(
                req,
                {
                    "email": email
                },
                function(data) {
                    if(data === "") {
                        window.location.replace(url);
                        $("#subSuccess").text("Prenos priročnika uspešen.");
                        $("#subSuccess").removeClass("hidden");
                    } else {
                        $("#subSuccess").text("Nekaj je šlo narobe, prosimo poskusite znova kasneje.");
                        $("#subSuccess").removeClass("hidden");
                        document.getElementById('captureModalMmm').style.display = "none";
                    }
                }
            );
        } else {
            $("#captureInputModalMmm").addClass("capture-page-modal-input-error");
            $("#modalNotifTextMmm").text("Vnesite veljaven e-mail naslov.");
            $("#modalNotifMmm").removeClass("hidden");
        }
    });
});