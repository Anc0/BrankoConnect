<div class="container">
    <div class="row auto-toprow">
        <div class="col-xs-8">
            <h2>Creating a new user</h2>
        </div>
        <div class="col-xs-4 auto-dropdown">
            <a class="btn btn-primary pull-right auto-btn-right"
               href="<?php echo base_url() ?>autoresponder">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <form method="post" action="<?php echo base_url() ?>autoresponder/create_user">
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-primary pull-right">Create</button>
            </form>
        </div>
    </div>
</div>