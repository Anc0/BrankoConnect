<div class="container">
    <div class="row auto-toprow">
        <div class="col-xs-8">
            <h2>Editing contact: <?= $contact->name ?></h2>
        </div>
        <div class="col-xs-4 auto-dropdown">
            <a class="btn btn-primary pull-right auto-btn-right"
               href="<?php echo base_url() ?>autoresponder/contacts">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <form method="post" action="<?php echo base_url() ?>autoresponder/update_contact/<?= $contact->id ?>">
                <div class="form-group">
                    <label>Day of campaign:</label>
                    <select class="form-control" name="serial">
                        <?php
                        for($i = 1; $i <= 30; $i++) {
                            if($i == $contact->serial_number) {
                                echo "<option selected>" . $i . "</option>";
                            } else {
                                echo "<option>" . $i . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" name="name" value="<?= $contact->name ?>">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" class="form-control" name="email" value="<?= $contact->email ?>">
                </div>
                <button type="button" class="btn btn-danger pull-right auto-btn-right" data-toggle="modal"
                        data-target="#modalDeleteContact">Delete contact
                </button>
                <button type="submit" class="btn btn-primary pull-right">Update</button>
            </form>
        </div>
    </div>
    <!-- Modal -->
    <div id="modalDeleteContact" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content auto-modal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>Deleting contact: <?= $contact->email ?></b></h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this contact?</p>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-danger"
                       href="<?php echo base_url(); ?>autoresponder/delete_contact/<?= $contact->id ?>">Delete</a>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>