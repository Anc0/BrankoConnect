<nav id="navbar-container" class="navstyle navbar-fixed-top" role = "navigation">
    <div class="container">
        <div class="navbar-left" id="navbarFirst">
            <a href="<?php echo base_url()?>site/home">
                <img id="logo" class="logo" src="<?php echo base_url()?>assets/img/logo.png"/>
            </a>

        </div>
        <div class="collapsed" id="collapseButton">
            <button class="collapse-button pull-right" id="collapseClick">
                <i class="fa fa-bars fa-2x"></i>
            </button>
        </div>
        <div class="navbar-right navlink-container pull-right collapsed" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a class="navlink navlink-anim" href="<?php echo base_url()?>site/home"><?=$nav_home?></a></li>
                <li><a class="navlink navlink-anim" href="<?php echo base_url()?>site/blog"><?=$nav_blog?></a></li>
                <li><a class="navlink navlink-anim" href="<?php echo base_url()?>site/about"><?=$nav_about?></a></li>
                <li><a class="navlink navlink-anim" href="<?php echo base_url()?>site/work"><?=$nav_work?></a></li>
                <!--<li class="dropdown">
                    <a class="navlink navlink-anim dropdown-toggle" data-toggle="dropdown" href="#"><?=$nav_lang?>
                        <span class="caret"></span></a>
                    <ul class="dropdown-main dropdown-menu">
                        <li><a class="dropdown-item dropdown-anim" href="<?php echo base_url()?>site/english"><?=$nav_en?></a></li>
                        <li><a class="dropdown-item dropdown-anim" href="<?php echo base_url()?>site/slovenian"><?=$nav_sl?></a></li>
                    </ul>
                </li>-->
            </ul>
        </div>
        <div class="vertical collapsed" id="collapsibleMenu">
            <ul class="vertical-menu">
                <li><a class="navlink navlink-anim-vertical navlink-vertical" href="<?php echo base_url()?>site/home"><?=$nav_home?></a></li>
                <li><a class="navlink navlink-anim-vertical navlink-vertical" href="<?php echo base_url()?>site/blog"><?=$nav_blog?></a></li>
                <li><a class="navlink navlink-anim-vertical navlink-vertical" href="<?php echo base_url()?>site/about"><?=$nav_about?></a></li>
                <li><a class="navlink navlink-anim-vertical navlink-vertical" href="<?php echo base_url()?>site/work"><?=$nav_work?></a></li>
                <!--<li class="dropdown">
                    <a class="navlink navlink-anim-vertical navlink-vertical dropdown-toggle" data-toggle="dropdown" href="#"><?=$nav_lang?>
                        <span class="caret"></span></a>
                    <ul class="dropdown-main dropdown-menu dropdown-collapsible">
                        <li><a class="dropdown-item dropdown-anim" href="<?php echo base_url()?>site/english"><?=$nav_en?></a></li>
                        <li><a class="dropdown-item dropdown-anim" href="<?php echo base_url()?>site/slovenian"><?=$nav_sl?></a></li>
                    </ul>
                </li>-->
            </ul>
        </div>
    </div>
</nav>
<div class="container content">