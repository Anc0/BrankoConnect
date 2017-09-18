<div class="container">
    <div class="row auto-toprow">
        <div class="col-xs-8">
            <h2>Editing message: <?= $message->subject ?></h2>
        </div>
        <div class="col-xs-4 auto-dropdown">
            <a class="btn btn-primary pull-right auto-btn-right"
               href="<?php echo base_url() ?>autoresponder/campaign/<?= $message->campaign_id ?>">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <form method="post" action="<?php echo base_url() ?>autoresponder/update_message/<?= $message->id ?>">
                <div class="form-group">
                    <label>Day of campaign:</label>
                    <select class="form-control" name="serial">
                        <?php
                        for ($i = 1; $i <= 30; $i++) {
                            if ($i == $message->serial_number) {
                                echo "<option selected>" . $i . "</option>";
                            } else if (!in_array($i, $serials)) {
                                echo "<option>" . $i . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Subject:</label>
                    <input type="text" class="form-control" name="subject" value="<?= $message->subject ?>">
                </div>
                <div class="form-group">
                    <label>From email:</label>
                    <input type="text" class="form-control" name="sender" value="<?= $message->sender ?>">
                </div>
                <div class="form-group">
                    <label>From name:</label>
                    <input type="text" class="form-control" name="senderName" value="<?= $message->sender_name ?>">
                </div>
                <div class="form-group">
                    <label>Content:</label>
                    <textarea class="form-control auto-content-area" rows="25" name="content"><?= $message->content ?></textarea>
                </div>
                <button type="button" class="btn btn-danger pull-right auto-btn-right" data-toggle="modal"
                        data-target="#modalDeleteMessage">Delete message
                </button>
                <button type="submit" class="btn btn-primary pull-right">Update</button>
            </form>
        </div>
    </div>
    <!-- Modal -->
    <div id="modalDeleteMessage" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content auto-modal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>Deleting message: <?= $message->subject ?></b></h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this message?</p>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-danger"
                       href="<?php echo base_url(); ?>autoresponder/delete_message/<?= $message->id ?>">Delete</a>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>