<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/admin/root.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/admin/navigasi.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/admin/konten.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/admin/tabel.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/admin/form.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/admin/animasi.css">
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/halaman.css">
    <script src="<?php base_url() ?>/assets/js/fontawesome.js"></script>
    <link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>/logo_pln.ico" />
    <title>Makan</title>

</head>

<body>
    <?php
    if (session()->get('username') == '') {
        session()->setFlashdata('gagal', 'anda belum login sayang !!!');
        return redirect()->to(base_url('admin/petugas/login'));
    }
    ?>
    <nav>
        <div class="menu-icon">
            <span class="fas fa-bars"></span>
        </div>
        <div class="cancel-icon">
            <span class="fas fa-times"></span>
        </div>
        <div class="logo">
            <span class="wrapper"></span>
            <div class="logo-text" data-text="PLN">PLN</div>
        </div>
        <div class="nav-items">
            <li><a href="<?= base_url('petugas/beranda') ?>">Beranda</a></li>
            <li><a href="<?= base_url('petugas/pelanggan') ?>">Pelanggan</a></li>
            <li><a href="<?= base_url('petugas/penggunaan') ?>">Penggunaan</a></li>
            <li><a href="http://localhost/web/CI4/listrik/antrian/">Antrian</a></li>
            <li><a href="<?= base_url('petugas/login/logout') ?>">Logout</a></li>
        </div>
        <div class="pengguna">
            <img src="<?php base_url() ?>/assets/gambar/server/admin.png" alt="" class="gambar">
            <h3>
                <?= session()->get('nama') . ' / ' . session()->get('akses') ?>
            </h3>
        </div>
    </nav>
    <section>
        <?php
        if (!empty(session()->getFlashdata('gagal'))) {
        ?>
            <script>
                alert("anda masih dimenu home !!!, jangan pindah ke halaman login itu haram");
            </script>
        <?php
        }
        ?>
        <?= $this->renderSection('konten'); ?>
        <img src="<?php base_url() ?>/assets/gambar/server/pln.gif" alt="" class="pln">
    </section>
    <script src="<?php base_url() ?>/assets/js/navigasi.js"></script>
    <script>
        var close = document.getElementsByClassName("closebtn");
        var i;
        for (i = 0; i < close.length; i++) {
            close[i].onclick = function() {
                var div = this.parentElement;
                div.style.opacity = "0";
                setTimeout(function() {
                    div.style.display = "none";
                }, 600);
            }
        }

        function tampilGambar() {
            const gambar = document.querySelector('#gambar');
            const imgTampil = document.querySelector('.tampil-gambar');

            const fileGambar = new FileReader();
            fileGambar.readAsDataURL(gambar.files[0]);

            fileGambar.onload = function(e) {
                imgTampil.src = e.target.result;
            }
        }
    </script>
</body>

</html>