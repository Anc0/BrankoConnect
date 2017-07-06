<div class="container">
    <div class="row auto-toprow">
        <div class="col-xs-8">
            <h2>Editing campaign: <?= $campaign->name ?></h2>
        </div>
        <div class="col-xs-4 auto-dropdown">

            <a class="btn btn-primary pull-right auto-btn-right"
               href="<?php echo base_url() ?>autoresponder/home">Back</a>

        </div>
    </div>

    <div class="auto-grid">
        <?php
        for ($i = 1; $i <= 30; $i++) {
            $ser = false;
            if (isset($serial)) {
                for ($j = 0; $j < count($serial); $j++) {
                    if ($serial[$j] == $i) {
                        $ser = true;
                    }
                }
            }
            if ($ser) {
                foreach ($messages as $row) {
                    if ($row->serial_number == $i) {
                        $text = $row->subject;
                        $link = base_url() . 'autoresponder/message/' . $row->id;
                        $class = "col-xs-2 auto-grid-element auto-grid-active";
                    }
                }
            } else {
                $text = 'No content.';
                $link = base_url() . 'autoresponder/new_message/' . $i;
                $class = "col-xs-2 auto-grid-element auto-grid-notactive";
            }
            $grid = '<div class="' . $class . '"><a class="remove-link" href="'
                . $link .
                '"><p>'
                . $i .
                '</p><p class="auto-center">'
                . $text .
                '</p></a></div>';
            if ($i == 1) {
                echo '<div class="row">';
                echo $grid;
            } else if ($i == 30) {
                echo $grid;
                echo '</div>';
            } else {
                echo $grid;
                if ($i % 6 == 0) {
                    echo '</div><div class="row">';
                }
            }
        }
        ?>
    </div>

    <div class="row auto-buttons">
        <div class="col-xs-12">
            <button type="button" class="btn btn-danger pull-right auto-btn-right" data-toggle="modal"
                    data-target="#modalDeleteCampaign">Delete campaign
            </button>
            <a class="btn btn-primary pull-right auto-btn-right" href="<?php echo base_url() ?>autoresponder/contacts">Edit
                contacts</a>
        </div>
    </div>

    <!-- Modal -->
    <div id="modalDeleteCampaign" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content auto-modal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>Deleting campaign <?= $campaign->name ?></b></h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete campaign "<?= $campaign->name ?>", all of its messages and
                        contacts?</p>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-danger" href="<?php echo base_url()?>autoresponder/delete_campaign/<?= $campaign->id ?>">Delete</a>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>