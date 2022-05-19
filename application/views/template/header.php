<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ET App</title>
    <!--Bootstrap 5 elements link-->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
</head>
<body class="bg-light">
    <nav class="navbar navbar" style="background-color: #628EFF;">
      <a class="navbar-brand mx-3 text-light strong h3" href = "<?php echo base_url();?>pages/view"><strong>ET App</strong></a>
        
      <div class="nav-item mx-3">
        <div class="d-flex">
            <button type="button" class="btn text-light" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #628EFF;">
                <i class="bi bi-list h3"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end mx-3 my-2" style="background-color: #F6F6F6;">
                <li><a class="dropdown-item" type="button"><strong>Name</strong></a></li>
                <li><a class="dropdown-item" type="button">Settings</a></li>
                <li><a class="dropdown-item" type="button" href = "<?php echo base_url();?>pages/view/about">About</a></li>
                <li><a class="dropdown-item" type="button">Logout</a></li>
            </ul>
        </div>
      </div>
    </nav>