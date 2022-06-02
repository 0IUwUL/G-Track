<div class="container-fluid main" style="height:100vh;padding-left:0px;">
        <div class="d-block d-md-none menu">
            <div class="bar"></div>
        </div>
        
        <div class="row align-items-center" style="height:100%">
        <div class="col-md-3 d-none d-md-block" style="height:100%" >
            <div class="container-fluid nav sidebar flex-column" style="padding:2.5rem">
                <a href="account_settings" class="nav-link active mt-auto"><i class="bi bi-person-circle"></i> Account</a>
                <a href="change_pass" class="nav-link"><i class="bi bi-lock"></i> Password</a>
                <!-- <a href="#" class="nav-link"><i class="bi bi-bell"></i> Notifications</a> -->
                <a href="about" class="nav-link mb-auto"><i class="bi bi-info-circle-fill"></i> About</a>
            </div>
        </div>
        <div class="col-md-9" style="height:100%">
        <h2 class="mt-5 mb-5" style="text-align: left;color: #628EFF">Profile Settings</h2>
            <div class="box col shadow mb-5 p-5 rounded">
            <div class="container content clear-fix">
            <div class="row" style="height:100%">
                <div class="col-md-3">
                    <div href=# class="d-inline">
                        <img src="<?php echo base_url('assets/img/profile_picture.jpg');?>" style="max-width:100%; height:50%; padding-bottom:1rem">
                        <br>
                        <p class="pl-2">
                            <a href="#" class="btn" style="color: #628EFF;font-weight:600;padding:0">Edit Picture</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="container">
                        <?php echo form_open('Account_Settings/change');?>
                            <div class="form-group">
                                <p for="userName" style="text-align:left;margin-top:1rem">Username</p>
                                <input type="text" class="form-control" id="userName" name="userName" value="<?php echo $saur[0]['name'];?>">
                            </div>
                            <div class="form-group">
                                <p for="email" style="text-align:left;margin-top:1rem">Email</p>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $saur[0]['email'];?>">
                            </div>
                            <div class="form-group">
                                <p for="number" style="text-align:left;margin-top:1rem">Income</p>
                                <input type="number" class="form-control" id="income" name="income" value="<?php echo $saur[0]['income'];?>">
                            </div>
                            <div class="row mt-5">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-default btn-block">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>  
        </div>
    </div>
</div>