<div class="container">
    <div class="row auto-toprow">
        <div class="col-xs-8">
            <h2>Editing signature</h2>
        </div>
        <div class="col-xs-4 auto-dropdown">
            <a class="btn btn-primary pull-right auto-btn-right"
               href="<?php echo base_url() ?>autoresponder/">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <form method="post" action="<?php echo base_url() ?>autoresponder/update_signature/<?= $_SESSION['auto_user'] ?>">
                <div class="form-group">
                    <label>From email:</label>
                    <input type="email" class="form-control" name="sender" value="<?= $signature->email ?>">
                </div>
                <div class="form-group">
                    <label>From name:</label>
                    <input type="text" class="form-control" name="senderName" value="<?= $signature->name ?>">
                </div>
                <div class="form-group">
                    <label>Content:</label>
                    <textarea class="form-control auto-content-area" rows="25" name="content"><?= $signature->content ?></textarea>
                </div>
                <button type="button" class="btn btn-danger pull-right auto-btn-right" data-toggle="modal"
                        data-target="#modalDeleteSignature">Delete signature
                </button>
                <button type="submit" class="btn btn-primary pull-right">Update</button>
            </form>
        </div>
    </div>
    <!-- Modal -->
    <div id="modalDeleteSignature" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content auto-modal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>Deleting signature</b></h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete your signature?</p>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-danger"
                       href="<?php echo base_url(); ?>autoresponder/delete_signature/<?= $_SESSION['auto_user'] ?>">Delete</a>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>