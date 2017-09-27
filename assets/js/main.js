$(document).ready(function() {

    if($(window).width() < 1000) {
        $("#myNavbar").addClass("collapsed");
        $("#collapseButton").removeClass("collapsed");
    } else {
        $("#collapseButton").addClass("collapsed");
        $("#myNavbar").removeClass("collapsed");
    }

    $("#contact-button").click(function() {
        $("#contact-name-msg").text("");
        $("#contact-email-msg").text("");
        $("#contact-content-msg").text("");
        $("#contact-success-msg").text("");

        $("#contact-button").removeClass("contact-button-fail");
        $("#contact-button").removeClass("contact-button-success");

        var name = $("#contact-name").val();
        var email = $("#contact-email").val();
        var content = $("#contact-content").val();

        var valid = true;
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if(name.length == 0 | email.length == 0 | content.length == 0 | !re.test(email)) {
            valid = false;
        }
        if(valid == true) {
            $.post(
                "send_email",
                {
                    name: name,
                    email: email,
                    content: content
                },
                function(data) {
                    data = JSON.parse(data);

                    if(data["email_sent"] == false | data["success"] == false) {
                        $("#contact-success-msg").text(data["email_failed"]);

                        $("#contact-button").removeClass("contact-button-success");
                        $("#contact-button").addClass("contact-button-fail");

                        $("#contact-button").removeClass("contact-button-success");
                        $("#contact-button").addClass("contact-button-fail");
                    } else {
                        $("#contact-success-msg").text(data["message"]);

                        $("#contact-name").val("");
                        $("#contact-email").val("");
                        $("#contact-content").val("");

                        $("#contact-button").removeClass("contact-button-fail");
                        $("#contact-button").addClass("contact-button-success");
                    }
                }
            );
        } else {
            $.post(
                "get_text_work",
                function(data) {
                    data = JSON.parse(data);
                    if(name.length == 0) {
                        $("#contact-name-msg").text(data["name_required"]);
                    }
                    if(content.length == 0) {
                        $("#contact-content-msg").text(data["message_required"]);
                    }
                    if(!re.test(email)) {
                        $("#contact-email-msg").text(data["email_valid"]);
                    }
                    if(email.length == 0) {
                        $("#contact-email-msg").text(data["email_required"]);
                    }
                    $("#contact-button").addClass("contact-button-fail");
                }
            );
        }

    });

    $(".link-click").click(function() {
        ga('send', 'event', {
            eventCategory: 'Outbound Link',
            eventAction: 'click',
            eventLabel: event.target.href,
            eventValue: $(this).attr('id'),
            transport: 'beacon'
        });
    });

    $(document).scroll(function() {
        if($(window).scrollTop() === 0) {
            $("#navbar-container").removeClass("navstyle-small");
            $("#navbar-container").addClass("navstyle");

            $("#logo").removeClass("logo-small");
            $("#logo").addClass("logo");

            $(".navlink-anim").removeClass("navlink-small");
            $(".navlink-anim").addClass("navlink");

            $("#myNavbar").removeClass("navlink-container-small");
            $("#myNavbar").addClass("navlink-container");

            $(".dropdown-anim").removeClass("dropdown-item-small");
            $(".dropdown-anim").addClass("dropdown-item");

            $("#collapseClick").removeClass("collapse-button-small");
            $("#collapseClick").addClass("collapse-button");

            $("#collapsibleMenu").removeClass("vertical-small");
            $("#collapsibleMenu").addClass("vertical");

            $(".navlink-anim-vertical").removeClass("navlink-vertical-small");
            $(".navlink-anim-vertical").addClass("navlink-vertical");
        } else {
            $("#navbar-container").removeClass("navstyle");
            $("#navbar-container").addClass("navstyle-small");

            $("#logo").removeClass("logo");
            $("#logo").addClass("logo-small");

            $(".navlink-anim").removeClass("navlink");
            $(".navlink-anim").addClass("navlink-small");

            $("#myNavbar").removeClass("navlink-container");
            $("#myNavbar").addClass("navlink-container-small");

            $(".dropdown-anim").removeClass("dropdown-item");
            $(".dropdown-anim").addClass("dropdown-item-small");

            $("#collapseClick").removeClass("collapse-button");
            $("#collapseClick").addClass("collapse-button-small");

            $("#collapsibleMenu").removeClass("vertical");
            $("#collapsibleMenu").addClass("vertical-small");

            $(".navlink-anim-vertical").removeClass("navlink-vertical");
            $(".navlink-anim-vertical").addClass("navlink-vertical-small");
        }
    });

    $(window).resize(function() {
        if($(window).width() < 1000) {
            $("#myNavbar").addClass("collapsed");
            $("#collapseButton").removeClass("collapsed");
            $("#collapseClick").removeClass("collapsed");

            $("#navbarFirst").addClass("col-xs-6");
            $("#collapseButton").addClass("col-xs-6");
        } else {
            $("#collapseButton").addClass("collapsed");
            $("#myNavbar").removeClass("collapsed");
            $("#collapsibleMenu").addClass("collapsed");
            $("#collapseClick").addClass("collapsed");

            $("#navbarFirst").removeClass("col-xs-6");
            $("#collapseButton").removeClass("col-xs-6");
        }
    });

    $("#collapseClick").click(function() {
        $("#collapsibleMenu").toggleClass("collapsed");
    });

    $("#captureButton").click(function() {
        document.getElementById('captureModal').style.display = "block";
    });

    window.onclick = function(event) {
        if (event.target == document.getElementById('captureModal')) {
            document.getElementById('captureModal').style.display = "none";
            $("#captureInputModal").removeClass("capture-page-modal-input-error");
            $("#modalNotif").addClass("hidden");
            $("#captureInputModal").val("");
        }
    };

    $("#modalClose").click(function() {
        document.getElementById('captureModal').style.display = "none";
        $("#captureInputModal").removeClass("capture-page-modal-input-error");
        $("#modalNotif").addClass("hidden");
        $("#captureInputModal").val("");
    });

    $("#captureButtonModal").click(function() {
        var email = $("#captureInputModal").val();
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        var tld = window.location.href.split('/')[2];
        tld = tld.substr(tld.length - 2, 2);
        if(tld == "om") {
            tld = "com";
        }

        var url = "http://www.brankoconnect.".concat(tld);

        var req = "sub_email";

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
                        document.getElementById('captureModal').style.display = "none";
                    }
                }
            );
        } else {
            $("#captureInputModal").addClass("capture-page-modal-input-error");
            $("#modalNotifText").text("Enter a valid email address.");
            $("#modalNotif").removeClass("hidden");
        }
    });

});