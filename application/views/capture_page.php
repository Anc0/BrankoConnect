<!DOCTYPE html>
<html>
<head>
    <title>BrankoConnect</title>
    <link rel="icon" href="<?php echo base_url() ?>assets/img/favicon.ico"/>
    <!-- Cookies banner -->
    <link rel="stylesheet" type="text/css"
          href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css"/>
    <!-- Bootstrap latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap-theme.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/styles.css">
    <!-- Custom fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
    <!-- Google analytics -->
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-97548212-1', 'auto');
        ga('send', 'pageview');
    </script>
</head>
<body>
<div class="container content capture-page-content">
    <div class="row capture-page-content-inner">
        <div class="col-xs-12">
            <p class="font-capturepage-01">"Finally, An Easy Way To Recruit - Rejection FREE - Without Wasting Your Time
                & Money Chasing Dead Beat
                Prospects & Leads…"</p>
            <p class="font-capturepage-02">"This is the exact info I personally used to grow a 6-figure network
                marketing business before I was 28
                years old and fire my boss… without cold calling or bugging friends & family... and I'd like to show it
                to you as well!"</p>
        </div>
        <div class="col-xs-12 col-md-6">
            <p class="font-capturepage-03">In this 10 day Online Recruiting Bootcamp, you'll learn…</p>
            <ul class="fa-ul font-capturepage-04">
                <li><i class="fa-li fa fa-check capture-page-li"></i><b>About how to use Google & Facebook</b> to
                    generate
                    leads,
                    separate
                    your hot
                    prospects from the “suspects”
                    and get paid to do it.
                </li>
                <li><i class="fa-li fa fa-check capture-page-li"></i><b>How to become the hunted, instead of the
                        hunter</b>
                    and have
                    prospects
                    knocking down your door or calling
                    you with credit card in hand to join or buy from your business.
                </li>
                <li><i class="fa-li fa fa-check capture-page-li"></i>How To Get Leads & Prospects to <b>Call YOU</b>
                    About
                    Your
                    Business.
                </li>
            </ul>
            <div class="font-center">
                <img class="capture-page-arrow" src="<?php echo base_url() ?>/assets/img/arrow_01.png">
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <img class="capture-page-img" src="<?php echo base_url() ?>/assets/img/capture_page_03.png">
            <p class="font-capturepage-05">Click the "GET ACCESS NOW" button below for your Attraction Marketing Boot
                Camp and receive step-by-step
                instructions on how to ATTRACT prospects & customers to your business!</p>
            <button class="capture-page-button" id="captureButton"><img
                        src="<?php echo base_url() ?>/assets/img/capture_page_button_01.gif"</button>
        </div>
        <!-- The Modal -->
        <div id="captureModal" class="capture-page-modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="row font-center">
                    <div class="col-xs-12">
                        <a class="pull-right" href="#" id="modalClose">
                            <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
                        </a>
                        <img class="capture-page-modal-img"
                             src="<?php echo base_url() ?>/assets/img/capture_page_modal_01.gif">
                    </div>
                </div>
                <div class="row font-center capture-page-modal-form">
                    <div class="col-xs-12">
                        <p class="font-modal-01">
                            (enter your email address below and click the
                            “Get Instant Access!” button to get your 10 day boot-camp)
                        </p>
                        <p class="font-modal-02">
                            YES, I Want The Bootcamp!
                        </p>
                    </div>
                    <div class="col-xs-12">
                        <div class="capture-page-modal-center-div">
                            <input class="capture-page-modal-input" type="text" placeholder="Enter Your Best Email"
                                   id="captureInputModal"/></div>
                    </div>
                    <div class="col-xs-12 hidden" id="modalNotif">
                        <div class="capture-page-modal-center-div">
                            <p class="modal-notif-text pull-left font-opensans font-gray" id="modalNotifText"></p>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="capture-page-modal-center-div">
                            <button class="capture-page-modal-button" id="captureButtonModal">Get Instant Access!
                            </button>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <p class="font-size-px-18 font-lightgray font-opensans">
                            We respect your privacy. Your email address will never be shared or sold.
                        </p>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>


<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/js/jquery-3.2.1.min.js"></script>
<!-- Bootstrap latest compiled and minified JavaScript -->
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<!-- Custom javascript -->
<script src="<?php echo base_url() ?>assets/js/main.js"></script>
<!-- Font Awesome CDN-->
<script src="https://use.fontawesome.com/abcce56e65.js"></script>
</body>
</html>