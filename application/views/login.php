<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KurirDok || Login Page</title>

    <!-- Style CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.min.css') ?>">

    <!-- JQuery -->
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <!-- Bootstrap JS -->
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</head>
<body class="bg-info">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-6 offset-md-2 offset-lg-3 pt-5">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h3 class="card-title">Login To Your Account</h3>
                    </div>
                    <div class="card-body">
                        <?php if (@$this->session->flashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('error') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php endif; ?>
                        <form action="<?= base_url('auth/login') ?>" method="post">
                            <div class="form-group">
                                <label for="username">Username :</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password :</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                            </div>

                            <input type="submit" value="Login" class="btn btn-success btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>