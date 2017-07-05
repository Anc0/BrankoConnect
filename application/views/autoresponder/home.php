<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="">
                Welcome to the BrankoConnect autoresponder editor.
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-8"><h3>
                Please choose a campaign you wish to edit.
            </h3>
        </div>
        <div class="col-xs-12 col-sm-4 pull-right auto-dropdown">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                    Campaign
                    <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">

                    <?php
                    foreach ($campaigns->result() as $row) {
                        echo '<li role="presentation"><a role="menuitem" href="' . base_url() . 'autoresponder/campaign/' . $row->id . '">' . $row->name . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>