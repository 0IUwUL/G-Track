<div class="container my-5">
    <div class="row mx-3 p-5">
        <div class="row col-10 p-5">
            <div class="box col shadow mb-5 p-5 rounded">
                <div class="logo shadow">
                    <img src="<?php echo base_url('assets/img/logo.png')?>" width="138" height="130" class="rounded rounded-circle">
                </div>
                <form method="post" action="<?php echo base_url('forgot_password/forgot')?>">
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Enter Email" name="email">
                </div>
                
                <div class="mb-3 mx-auto">
                    <button href="<?php echo base_url('pages/forgot_pass_verify')?>" class="btn btn-custom" name="verify" style="color: #F6F6F6">Send Verification</button>
                </div>

                <!-- <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Enter New Password" name="password_1">
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Confirm Password" name="password_2">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-custom" name="submit" style="color: #F6F6F6">Submit</button>
                </div>
                </form>
                <div class="row justify-content-center h5 mt-3" style="color: #628EFF">
                    find password in a different way
                </div> -->
            
            </div>
        </div>    
    </div>
</div>