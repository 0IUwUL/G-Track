<div class="container my-5">
    <div class="row mx-3 p-5">
        <div class="row col-10 p-5">
            <div class="box col shadow mb-5 p-5 rounded">
                <div class="logo shadow">
                    <img src="<?php echo base_url('assets/img/logo.png')?>" width="138" height="130" class="rounded rounded-circle">
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Enter Email" name="name">
                </div>
                
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Enter Verification" name="verification">
                    <button type="submit" class="btn btn-custom" name="verify" style="color: #F6F6F6">Send Verification</button>
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Enter New Password" name="new_password">
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Confirm Password" name="confirm_password">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-custom" name="submit" style="color: #F6F6F6">Submit</button>
                </div>

                <div class="row justify-content-center h5 mt-3" style="color: #628EFF">
                    find password in a different way
                </div>
            
            </div>
        </div>    
    </div>
</div>