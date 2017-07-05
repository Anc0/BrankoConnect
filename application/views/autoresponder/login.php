<div class="container">
    <div class="row">
        <div class="col-xs-12 auto-center text-center">
            <h2>BrankoConnect autoresponder</h2>
            <form action="<?php echo base_url()?>autoresponder/login" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
