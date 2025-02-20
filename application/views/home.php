<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>stylesheets/screen.css">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>public/assets/fav/favicon-32x32.png" type="image/png">
</head>

<body>
    <div class="row mx-0 login_section">
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="col-md-4">
                <?php
                if ($this->session->flashdata('status')) : ?>
                    <div class="alert alert-success">
                        <?= $this->session->flashdata('status'); ?>
                    </div>
                <?php endif; ?>
                <form action="<?php echo base_url(); ?>Login/do_login" method="post">
                    <div class="form-group form-input">
                        <input type="text" name="username" id="username" value="" required />
                        <label for="username" class="form-label">Username</label>
                    </div>
                    <div class="form-group form-input">
                        <input type="password" name="password" id="password" value="" required />
                        <label for="password" class="form-label">Password</label>
                    </div>
                    <div class="form-group mt-5 text-center">
                        <input type="submit" name="login" value="Login" class="btn btn-warning">
                    </div>
                    <p class="text-center mt-3">Don't have an Account. <a href="<?php echo base_url(); ?>register" class="text-white">Register</a> Now</p>

                </form>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>