<div class="container">
    <div class="row">
        <div class="col-xs-10">
            <h2>You are editing campaign: <?= $campaign->name ?></h2>
        </div>
        <div class="col-xs-2 auto-dropdown">
            <a class="btn btn-primary" href="<?php echo base_url()?>autoresponder/home">Choose campaign</a>
        </div>
    </div>
    <div class="auto-grid">
        <?php
        for($i = 1; $i <= 36; $i++) {
            $ser = false;
            if(isset($serial)) {
                for($j = 0; $j < count($serial); $j++) {
                    if($serial[$j] == $i) {
                        $ser = true;
                    }
                }
            }

            if($ser) {
              foreach($messages as $row) {
                  if($row->serial_number == $i) {
                      $text = $row->subject;
                      $link = base_url() . 'autoresponder/message/' . $row->id;
                  }
              }
            } else {
                $text = 'No content.';
                $link = "#";
            }
            $grid = '<div class="col-xs-2 auto-grid-element"><a class="remove-link" href="'
                . $link .
                '"><p>'
                . $i .
                '</p><p class="auto-center">'
                . $text .
                '</p></a></div>';
            if($i == 1) {
                echo '<div class="row">';
                echo $grid;
            } else if($i == 36) {
                echo $grid;
            } else {
                echo $grid;
                if($i % 6 == 0) {
                    echo '</div><div class="row">';
                }
            }
        }
        ?>
    </div>
</div>