<div class="container">
    <div class="row auto-toprow">
        <div class="col-xs-8">
            <h2>Creating a new contact</h2>
        </div>
        <div class="col-xs-4 auto-dropdown">
            <a class="btn btn-primary pull-right auto-btn-right"
               href="<?php echo base_url() ?>autoresponder/contacts">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <form method="post" action="<?php echo base_url() ?>autoresponder/create_contact">
                <div class="form-group">
                    <label>Day of campaign:</label>
                    <select class="form-control" name="serial">
                        <?php
                        echo "<option selected>1</option>";
                        for($i = 2; $i <= 30; $i++) {
                            echo "<option>" . $i . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <button type="submit" class="btn btn-primary pull-right">Create</button>
            </form>
        </div>
    </div>
</div>