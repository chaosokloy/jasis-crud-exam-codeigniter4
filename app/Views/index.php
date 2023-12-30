<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="<?= base_url('bootstrap-5.0.2-dist/css/bootstrap.min.css') ?>">
    <style>
        body {
            background-image: url('https://wallpapercave.com/wp/wp8872087.png'); /* Replace with your image URL */
            background-size: cover;
            background-repeat: no-repeat;
            color: #ffffff; /* Change text color */
        }

        .container {
            margin-top: 100px;
        }

        .card {
            border: none;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            background: rgba(0, 0, 0, 0.7); /* Adjust the background color and transparency */
            color: #ffffff; /* Change text color */
            width: 100%; /* Adjust the width as needed */
            max-width: 500px; /* Set a maximum width if necessary */
        }

        .card-title {
            color: #ffffff;
        }

        .btn-dark {
            background-color: #343a40; /* Change button color */
        }

        .btn-dark:hover {
            background-color: #1d2124;
        }
    </style>
    <title>Login Form</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card p-3">
                    <form action="<?= base_url('main/auth')?>" method="post">
                        <center>
                            <h1 class="fw-bold card-title mb-4">Login</h1>
                        </center>
                        <hr/>
                        <!-- Display error messages -->
                        <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                        <?php endif ?>    
                        <div class="form-group">
                            <label for="usr" class="fw-bold">Username:</label>
                            <input type="text" class="form-control" placeholder="Enter username" id="usr" name="username">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'username') : '' ?></span>
                        </div>
                        <div class="form-group">
                            <label for="pwd" class="fw-bold">Password:</label>
                            <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
                        </div><br>
                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" class="btn btn-dark text-warning btn-block">Login</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <script src="<?= base_url('bootstrap-5.0.2-dist/js/bootstrap.min.js') ?>"></script>
</body>

</html>
