$(document).ready(function() {

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
        }
    });

});