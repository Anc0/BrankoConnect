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
            <p class="font-capturepage-01"> »Razbiti miti o mrežnem marketingu ali zakaj je potrebno narediti za uspeh
                več, kot le poklicati 100 ljudi in jih vključiti v mrežo?«</p>
            <p class="font-capturepage-02">»Kaj nam ima povedati strokovnjak, ki je vodilni učitelj v mrežnem marketingu
                na svetu, <br>Eric Worre?«</p>
        </div>
        <div class="col-xs-12 col-md-6">
            <p class="font-capturepage-03">Iz tega priročnika se boste naučili:</p>
            <ul class="fa-ul font-capturepage-04">
                <li><i class="fa-li fa fa-check capture-page-li"></i>Zakaj so ugovori naš največji prijatelj in ne
                    sovražnik?
                </li>
                <li><i class="fa-li fa fa-check capture-page-li"></i>Zakaj je mrežni marketing podjetniška izbira?</li>
                <li><i class="fa-li fa fa-check capture-page-li"></i>Katera je ključna veščina v mrežnem marketingu?
                </li>
                <li><i class="fa-li fa fa-check capture-page-li"></i>Kateri so stebri mrežnega marketinga?</li>
                <li><i class="fa-li fa fa-check capture-page-li"></i>Zakaj moramo imeti jasen fokus, če želimo uspeti?
                </li>
            </ul>
            <div class="font-center">
                <img class="capture-page-arrow" src="<?php echo base_url() ?>/assets/img/arrow_01.png">
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <img class="capture-page-img" src="<?php echo base_url() ?>/assets/img/capture_page_bcpro_01.jpg">
            <p class="font-capturepage-05">Kliknite gumb »snemi priročnik« spodaj in prejeli boste brezplačni
                e-priročnik, Mala šola mrežnega marketinga.</p>
            <button class="capture-page-button-msz" id="captureButtonMmm">Prenesi priročnik</button>
        </div>
        <!-- The Modal -->
        <div id="captureModalMmm" class="capture-page-modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="row font-center">
                    <div class="col-xs-12">
                        <a class="pull-right" href="#" id="modalCloseMmm">
                            <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
                        </a>
                        <img class="capture-page-modal-img"
                             src="<?php echo base_url() ?>/assets/img/capture_page_modal_01.gif">
                    </div>
                </div>
                <div class="row font-center capture-page-modal-form">
                    <div class="col-xs-12">
                        <p class="font-modal-01">
                            (vnesite vaš e-mail naslov in pritisnite "Prenesi zdaj")
                        </p>
                        <p class="font-modal-02">
                            Da, želim MALO ŠOLO MREŽNEGA MARKETINGA, priročnik
                        </p>
                    </div>
                    <div class="col-xs-12">
                        <div class="capture-page-modal-center-div">
                            <input class="capture-page-modal-input" type="text" placeholder="Vnesite vaš e-mail naslov"
                                   id="captureInputModalMmm"/></div>
                    </div>
                    <div class="col-xs-12 hidden" id="modalNotifMmm">
                        <div class="capture-page-modal-center-div">
                            <p class="modal-notif-text pull-left font-opensans font-gray" id="modalNotifTextMmm"></p>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="capture-page-modal-center-div">
                            <button class="capture-page-modal-button" id="captureButtonModalMmm">Prenesi zdaj
                            </button>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <p class="font-size-px-18 font-lightgray font-opensans">
                            Spoštujemo vašo zasebnost. Vašega e-mail naslova ne bomo delili ali prodali trejim osebam.
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
<script src="<?php echo base_url() ?>assets/js/bcpro.js"></script>
<!-- Font Awesome CDN-->
<script src="https://use.fontawesome.com/abcce56e65.js"></script>
</body>
</html>