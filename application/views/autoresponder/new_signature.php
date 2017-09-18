<div class="container">
    <div class="row auto-toprow">
        <div class="col-xs-8">
            <h2>Creating new signature</h2>
        </div>
        <div class="col-xs-4 auto-dropdown">
            <a class="btn btn-primary pull-right auto-btn-right"
               href="<?php echo base_url() ?>autoresponder/">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <form method="post" action="<?php echo base_url() ?>autoresponder/create_signature/<?= $_SESSION['auto_user'] ?>">
                <div class="form-group">
                    <label>From email:</label>
                    <input type="email" class="form-control" name="sender">
                </div>
                <div class="form-group">
                    <label>From name:</label>
                    <input type="text" class="form-control" name="senderName">
                </div>
                <div class="form-group">
                    <label>Content:</label>
                    <textarea class="form-control auto-content-area" rows="25" name="content"></textarea>
                </div>
                <button type="submit" class="btn btn-primary pull-right">Create</button>
            </form>
        </div>
    </div>
</div>