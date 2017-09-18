<div class="container">
    <div class="row auto-toprow">
        <div class="col-xs-8">
            <h2>Creating a new message</h2>
        </div>
        <div class="col-xs-4 auto-dropdown">
            <a class="btn btn-primary pull-right auto-btn-right"
               href="<?php echo base_url() ?>autoresponder/campaign/<?= $campaign ?>">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <form method="post" action="<?php echo base_url()?>autoresponder/create_message">
                <div class="form-group">
                    <label>Day of campaign:</label>
                    <select class="form-control" disabled>
                        <?php
                            echo "<option selected>" . $serial . "</option>";
                        ?>
                    </select>
                    <input type="text" class="hidden" name="serial" value="<?= $serial ?>">
                </div>
                <div class="form-group">
                    <label>Subject:</label>
                    <input type="text" class="form-control" name="subject">
                </div>
                <div class="form-group">
                    <label>From email:</label>
                    <input type="text" class="form-control" name="sender" value="<?= $signature->email ?>">
                </div>
                <div class="form-group">
                    <label>From name:</label>
                    <input type="text" class="form-control" name="senderName" value="<?= $signature->name ?>">
                </div>
                <div class="form-group">
                    <label>Content:</label>
                    <textarea id="contentArea" class="form-control auto-content-area" rows="25" name="content"><?= $signature->content ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary pull-right">Create</button>
            </form>
        </div>
    </div>
</div>