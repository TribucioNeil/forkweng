<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PESO - Calapan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/admin/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/admin/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/admin/vendors/css/vendor.bundle.base.css">

    <link rel="stylesheet" href="assets/admin/css/vertical-layout-light/style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-image: url('assets/admin/images/bgadmin.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            max-width: 500px;
            background-color: rgba(0, 0, 0, 0.7); /* Dark background color */
            color: #fff; /* Light text color */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            height: 320px;
        }

        .centered-text {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            width: 100%;
        }

        @media (max-width: 768px) {
            .card {
                width: 80%;
            }

            .col-md-5 {
                margin-top: 20px;
            }
        }
    </style>
</head>

<body style="padding-left: 10px;">

    <div class="card col-md-5">
        <div class="brand-logo">
            <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
                <?php
                            $errorData = session()->getFlashdata('error');
                            if (is_array($errorData)) {
                                foreach ($errorData as $error) {
                                    echo $error . '<br>';
                                }
                            } else {
                                echo $errorData;
                            }
                            ?>
            </div>
            <?php endif; ?>
            <!-- <img src="assets/admin/images/logoo.jpg" alt="logo"> -->
        </div>
        <form class="pt-3" action="<?= site_url('adminLoginProcess') ?>" method="post">
            <div class="form-group">
                <input name="username" type="text" class="form-control form-control-lg" id="exampleInputUsername1"
                    placeholder="Email">
            </div>
            <div class="form-group">
                <input name="password" type="password" class="form-control form-control-lg" id="exampleInputPassword1"
                    placeholder="Password">
            </div>
            <div class="mt-3">
            </div>
            <button style="height: 20px; border-radius: 5px; "
                class="centered-text btn-primary btn-lg font-weight-medium align-items-center" type="submit">SIGN
                IN</button>
        </form>
    </div>
    <div class="col-md-5">

    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous">
</script>

</html>
