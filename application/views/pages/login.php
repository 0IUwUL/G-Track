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
      <a class="navbar-brand mx-3 text-light strong h3" href = "<?php echo base_url();?>dashboard"><strong>G-Track</strong></a>
    </nav>


<div class="container my-5">
    <div class="row mx-3 p-5">
        <div class="row col-10 p-5">
            <div class="box col shadow mb-5 p-5 rounded">
                <div class="logo shadow">
                    <img src="<?php echo base_url('assets/img/logo.png')?>" width="138" height="130" class="rounded rounded-circle">
                </div>

                <?php echo form_open("Logins/login") ;?>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Enter Username Here" name="username">
                </div>
                
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Enter Password Here" name="password">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-custom" name="login" style="color: #F6F6F6">Login</button>
                </div>
                </form>
                <div class="errorsignup">
                    <?php echo validation_errors();?>
                </div>
                <p class="error"><?php echo isset($error)? $error : "" ;?></p>
                <div class=" h5 mt-3">
                    Not A User? <a href="<?php echo site_url("sign_up")?>"style="color: #FB0000">Sign Up</a>
                </div>
                <div class="row justify-content-center h5 mt-3">
                    <a href="<?php echo site_url("pages/view/forgot_pass")?>"style="color: #FB0000; text-decoration: none"><strong>Forgot Password?</strong></a>
                </div>
                </form>
            </div>
        </div>    
    </div>
</div>