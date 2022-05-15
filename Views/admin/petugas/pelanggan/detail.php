<?= $this->extend('layout/admin'); ?>
<?= $this->section('konten'); ?>
<legend>Detail</legend>
<article>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert sukses">
            <span class="closebtn">&times;</span>
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <table>
        <?php $i = 1; ?>
        <tr>
            <th>no</th>
            <th>Nama</th>
            <th>Meter</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Meter Awal</th>
            <th>Meter Akhir</th>
            <th>Tgl Cek</th>
            <th>petugas</th>
            <th>Aksi</th>
        </tr>
        <?php
        $db = \Config\Database::connect();
        $pelanggan = $pelanggan['no_pelanggan'];
        $tampil = $db->query("SELECT * from penggunaan where id_pelanggan = '$pelanggan'");
        foreach ($tampil->getResultArray() as $data_penggunaan) {
        ?>
            <tr>
                <td><?= $i++; ?></td>
                <?php
                $tampil = $db->query("SELECT * from pelanggan where no_pelanggan = '$pelanggan'");
                foreach ($tampil->getResultArray() as $data_pelanggan) {
                ?>
                    <td><?= $data_pelanggan['nama']; ?></td>
                    <td><?= $data_pelanggan['no_meter']; ?></td>
                <?php
                }
                ?>
                <td><?= $data_penggunaan['bulan']; ?></td>
                <td><?= $data_penggunaan['tahun']; ?></td>
                <td><?= $data_penggunaan['meter_awal']; ?></td>
                <td><?= $data_penggunaan['meter_akhir']; ?></td>
                <td><?= $data_penggunaan['tgl_cek']; ?></td>
                <?php
                $petugas = $data_penggunaan['id_petugas'];
                $tampil = $db->query("SELECT * from petugas where id_petugas = '$petugas'");
                foreach ($tampil->getResultArray() as $data_petugas) {
                ?>
                    <td><?= $data_petugas['nama']; ?></td>
                <?php
                }
                ?>
                <?php if (!$data_penggunaan['status'] == 1) { ?>
                    <td><a href="/petugas/pelanggan/tagihan/<?= $data_penggunaan['no_penggunaan'] ?>" style="background-color: red;"><i class="fas fa-money-bill"></i></a></td>
                <?php } else { ?>
                    <td><a href="/petugas/pelanggan/tagihan/<?= $data_penggunaan['no_penggunaan'] ?>"><i class="fas fa-money-bill"></i></a></td>
                <?php
                } ?>

            </tr>
        <?php
        }
        ?>
    </table>
</article>
<?= $this->endSection(); ?>