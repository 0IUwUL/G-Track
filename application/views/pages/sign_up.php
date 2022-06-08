<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G-Track App</title>
    <!--Bootstrap 5 elements link-->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
    <!-- for calendar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body class="bg-light">
    <nav class="navbar navbar" style="background-color: #628EFF;">
      <a class="navbar-brand mx-3 text-light strong h3" href = "<?php echo base_url();?>dashboard"><strong>ET App</strong></a>
    </nav>
    
<div class="container my-5">
    <div class="row mx-3 p-5">
        <div class="row col-10 p-5">
            <div class="box col shadow mb-5 p-5 rounded">
                <div class="logo shadow">
                    <img src="<?php echo base_url('assets/img/logo.png')?>" width="138" height="130" class="rounded rounded-circle">
                </div>
                <?php echo form_open("sign_up/register") ;?>
                    <div class="mb-3">
                        <h3>Create Account</h3>
                    </div>
                    <div class="mb-3">
                        <p>Username</p>
                        <input type="text" class="form-control"  name="username">
                    </div>
                    <div class="mb-3">
                        <p>Email</p>
                        <input type="text" class="form-control"  name="email">
                    </div>
                    <div class="mb-3">
                        <p>Password</p>
                        <input type="password" class="form-control"  name="password_1">
                    </div>
                    <div class="mb-3">
                        <p>Confirm Password</p>
                        <input type="password" class="form-control"  name="password_2">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-custom" name="submit" style="color: #F6F6F6">Sign Up</button>
                    </div>
                    <div class="errorsignup">
                            <?php echo validation_errors();?>
                    </div>
                </form>
                <div class="mb-3">
                    <hr></hr>
                </div>
                <div class="social-icon mb-3">
                    <a href="#" class="instagram"><i class="bi bi-instagram mx-5"></i></a>
                    <a href="#" class="google"><i class="bi bi-google mx-5"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook mx-5"></i></a>
                </div>
                <div class="row justify-content-center mt-3">
                    <p>Already a User? <a href="<?php echo base_url('/')?>"><u>LOGIN</u></a></p>
                </div>
                
            </div>
        </div>    
    </div>
</div>

   