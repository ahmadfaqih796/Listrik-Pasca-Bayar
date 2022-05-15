<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/login/login.css">
    <link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>/logo_pln.ico" />
    <title>Login</title>
</head>

<body>
    <!-- particles.js container -->
    <div id="particles-js"></div>
    <div class="card">
        <!-- cek pesan notifikasi -->
        <?php
        if (!empty(session()->getFlashdata('gagal'))) {
            echo session()->getFlashdata('gagal');
        }
        echo form_open('agen/login/cek_login') ?>
        <img src="<?= base_url(); ?>/assets/gambar/server/logo_pln.png" alt="">

        <div class="input-group">
            <input id="username" type="username" name="username_agen" autocomplete="off" required autofocus />
            <span>Username</span>
        </div>
        <div class="input-group">
            <input type="password" name="password_agen" id="password" autocomplete="off" required>
            <span>Password</span>
        </div>
        <div class="input-checkbox">
            <input type="checkbox" onclick="tampil_Password()">
            <span>Tampilkan Password</span>
        </div>
        <div class="input-group">
            <input type="submit" value="Login">
        </div>
        <?php echo form_close() ?>
    </div>
    <script src="<?= base_url(); ?>/assets/js/lihat password.js"></script>
    <!-- particles.js lib - https://github.com/VincentGarreau/particles.js -->
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> <!-- stats.js lib -->
    <script src="<?= base_url(); ?>/assets/js/particles.js"></script>
</body>

</html>