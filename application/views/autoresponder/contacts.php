<div class="container">
    <div class="row auto-toprow">
        <div class="col-xs-8">
            <h2>Editing contacts for campaign: <?= $campaign_name ?></h2>
        </div>
        <div class="col-xs-4 auto-dropdown">
            <a class="btn btn-primary pull-right auto-btn-right"
               href="<?php echo base_url() ?>autoresponder/campaign/<?= $campaign ?>">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-striped auto-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Day of campaign</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                for ($i = 0; $i < count($contacts); $i++) {
                    $row = '
                        <tr>
                            <td>' . $contacts[$i]->name . '</td>
                            <td>' . $contacts[$i]->email . '</td>
                            <td>' . $contacts[$i]->serial_number . '</td>
                            <td><a class="btn btn-primary pull-right auto-btn-right" href="' . base_url() .
                            'autoresponder/contact/' . $contacts[$i]->id . '">Edit contact</a></td>
                        </tr>
                        ';
                    echo $row;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row auto-newcontact">
        <a class="btn btn-primary pull-right" href="<?php echo base_url()?>autoresponder/new_contact">Create a new contact</a>
    </div>

</div>