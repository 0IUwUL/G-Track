<div class="container-fluid main" style="height:100vh;padding-left:0px;">
        <div class="d-block d-md-none menu">
            <div class="bar"></div>
        </div>
        <div class="row align-items-center" style="height:100%">
        <div class="col-md-3 d-none d-md-block" style="height:100%" >
            <div class="container-fluid nav sidebar flex-column" style="padding:2.5rem">
                <a href="account_settings" class="nav-link"><i class="bi bi-person-circle"></i> Account</a>
                <a href="change_pass" class="nav-link active mt-auto"><i class="bi bi-lock"></i> Password</a>
                <a href="#" class="nav-link"><i class="bi bi-bell"></i> Notifications</a>
                <a href="about" class="nav-link mb-auto"><i class="bi bi-info-circle-fill"></i> About</a>
            </div>
        </div>
        <div class="col-md-9" style="height:100%">
            <div class="container">
                    <h2 class="mt-5 mb-5" style="color: #628EFF"><strong> Password Settings </strong></h2>
                        <div class="col-md-9">
                            <div class="box col shadow mb-5 p-5 rounded">
                                <?php echo form_open("C_Password/change_password");?>
                                    <div class="form-group">
                                        <p style="margin:0; color: #628EFF; text-align:left"><strong>Change Password:</strong><p>
                                        <input type="password" class="form-control" name="password_1" id="password_1" placeholder="Enter New Password" required>
                                    </div>
                                    <div class="form-group">
                                        <p style="margin:0; color: #628EFF; text-align:left"><strong>New Password:</strong></p>
                                        <input type="password" class="form-control" name="password_2" id="password_2" placeholder="Confirm New Password" required>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col">
                                            <button type="button" href="<?php echo site_url("pages/change_pass");?>" class="btn btn-default btn-block"><strong>Cancel</strong></button>
                                        </div>
                                        <div class="col">
                                            <button type="submit" id="change_password" name="change_password" class="btn btn-primary btn-block" value="Submit"><strong>Submit</strong></button>
                                        </div>
                                    </div>
                                    <div class="errorchangepass">
                                        <?php echo validation_errors();?>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>  
        </div>
    </div>
</div>