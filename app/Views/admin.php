<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/bootstrap.min.css">
    <title>Slebew Laundry<?=$this->renderSection('title')?></title>
</head>
<body>
    <!-- NAVBAR START -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="/home" class="navbar-brand">Slebew laundry</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbara" aria-controls="navbarSupportedContent" aria-expand="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbara">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="/Home" class="nav-link active">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="nav-link active">DAFTAR</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- NAVBAR END -->

    <!-- MENU START -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-secondary">
                <?=$this->include('component/sidebar.php') ?>
            </div>     
            <div class="col-md-10">
                <?=$this->renderSection('content') ?>
            </div>     
        </div>    
    </div>
    <!-- MENU END -->
</body>
</html>
<script src="<?=base_url()?>/assets/jquery/jquery-3.6.0.min.js"></script>
<script src="<?=base_url()?>/assets/js/bootstrap.min.js"></script>
<?=$this->renderSection('script')?>