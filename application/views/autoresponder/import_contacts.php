<div class="container">
    <div class="row auto-toprow">
        <div class="col-xs-8">
            <h2>Importing contacts</h2>
        </div>
        <div class="col-xs-4 auto-dropdown">
            <a class="btn btn-primary pull-right auto-btn-right"
               href="<?php echo base_url() ?>autoresponder">Back</a>
        </div>
        <div class="col-xs-12">
            <p>
                Paste no more than 10.000 emails at once. Each email must be in its own line with no empty lines anywhere.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <form method="post" action="<?php echo base_url() ?>autoresponder/import">
                <div class="form-group">
                    <label>Emails:</label>
                    <textarea class="form-control" name="emails" rows="25"></textarea>
                </div>
                <button type="submit" class="btn btn-primary pull-right">Import</button>
            </form>
        </div>
    </div>
</div>