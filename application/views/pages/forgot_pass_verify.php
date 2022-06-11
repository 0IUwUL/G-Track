<div class="container my-5">
    <div class="row mx-3 p-5">
        <div class="row col-10 p-5">
            <div class="box col shadow mb-5 p-5 rounded">
                <div class="logo shadow">
                    <img src="<?php echo base_url('assets/img/logo.png')?>" width="138" height="130" class="rounded rounded-circle">
                </div>
                <form method="post" action="<?php echo base_url('forgot_password/pass_verify')?>">
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Enter Verification Code" name="passcode">
                </div>
                <div class="mb-3 mx-auto">
                    <button class="btn btn-custom" name="verify" style="color: #F6F6F6">Submit</button>
                </div>
            </div>
        </div>    
    </div>
</div>