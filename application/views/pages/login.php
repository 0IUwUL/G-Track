<div class="container my-5">
    <div class="row mx-3 p-5">
        <div class="row col-10 p-5">
            <div class="box col shadow mb-5 p-5 rounded">
                <div class="logo shadow">
                    <img src="<?php echo base_url('assets/img/logo.png')?>" width="138" height="130" class="rounded rounded-circle">
                </div>
                <form  method="post" action="<?php echo site_url("Logins/logging_in")?>">
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Enter Username Here" name="username">
                </div>
                
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Enter Password Here" name="password">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-custom" name="login" style="color: #F6F6F6">Login</button>
                </div>
                <div class=" h5 mt-3">
                    Not A User? <a href="<?php echo site_url("sign_up/index")?>"style="color: #FB0000; text-decoration: none"><strong>Sign Up</strong></a>
                </div>
                <div class="row justify-content-center h5 mt-3">
                    <a href="<?php echo site_url("")?>"style="color: #FB0000; text-decoration: none"><strong>Forgot Password?</strong></a>
                </div>
                </form>
            </div>
        </div>    
    </div>
</div>