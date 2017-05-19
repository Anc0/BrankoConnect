<div class="row home-content-wrapper">
    <div class="sectors col-xs-12 font-raleway home-content">
        <?= $content ?>
    </div>
</div>
<div class="row home-content-wrapper">
    <div class="home-content">
        <div class="col-xs-12">
            <h3>
                <?= $contact ?>
            </h3>
        </div>
        <div class="col-xs-12 col-sm-6">
            <input id="contact-name" class="contact-field" type="text" name="name" placeholder="<?= $name ?>"
                   value="<?php echo set_value('name') ?>">
            <p id="contact-name-msg"></p>
        </div>
        <div class="col-xs-12 col-sm-6">
            <input id="contact-email" class="contact-field" type="text" name="email" placeholder="<?= $email ?>"
                   value="<?php echo set_value('email') ?>">
            <p id="contact-email-msg"></p>
        </div>
        <div class="col-xs-12">
            <textarea id="contact-content" class="contact-message" name="message"
                      placeholder="<?= $message ?>"><?php echo set_value('message') ?></textarea>
            <p id="contact-content-msg"></p>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-6">
                <p id="contact-success-msg"></p>
            </div>
            <div class="col-xs-6">
                <button id="contact-button" class="contact-button pull-right" type="button"><?= $send ?></button>
                <!--<input class="contact-button pull-right <?= $show_button ?>" type="submit" value="<?= $schedule ?>"/>-->
            </div>
        </div>
    </div>
</div>