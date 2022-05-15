<?= $this->extend('layout/admin'); ?>
<?= $this->section('konten'); ?>
<legend>Pelanggan</legend>
<article>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert sukses">
            <span class="closebtn">&times;</span>
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="pencarian">
        <form action="" method="POST">
            <div class="baris">
                <input type="text" name="kunci" placeholder="cari pelanggan">
                <button type="submit" name="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
    <table>
        <tr>
            <td colspan="9"><a href="/petugas/pelanggan/tambah">+ Tambahkan Pelanggan</a></td>
        </tr>
        <tr>
            <th>no</th>
            <th>No Meter</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tenggang</th>
            <th>Tarif</th>
            <th colspan="3">Aksi</th>
        </tr>
        <?php
        $i = 1 + (5 * ($halaman - 1));
        foreach ($pelanggan as $p) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $p['no_meter']; ?></td>
                <td><?= $p['nama']; ?></td>
                <td><?= $p['alamat']; ?></td>
                <td><?= $p['tenggang']; ?></td>
                <td><?= $p['id_tarif']; ?></td>
                <td>
                    <form action="/petugas/pelanggan/<?= $p['id'] ?>" method="POST">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" style="background-color: red; cursor: pointer;" onclick="return confirm('apakah anda ingin menghapus ini ?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
                <td><a href="/petugas/pelanggan/ubah/<?= $p['no_pelanggan'] ?>"><i class="fas fa-wrench"></i></a></td>
                <td><a href="/petugas/pelanggan/detail/<?= $p['no_pelanggan'] ?>"><i class="fas fa-user"></i></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?= $pager->links('pelanggan', 'halaman') ?>
</article>
<?= $this->endSection(); ?>