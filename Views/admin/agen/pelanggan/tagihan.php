<?= $this->extend('layout/agen'); ?>
<?= $this->section('konten'); ?>
<legend>Tagihan</legend>
<article>
    <?php
    $db = \Config\Database::connect();
    $id_pelanggan = $penggunaan['id_pelanggan'];
    $tampil = $db->query("SELECT * from pelanggan where no_pelanggan = '$id_pelanggan'");
    foreach ($tampil->getResultArray() as $data) {
        $tarif = $data['id_tarif'];
        $tampil = $db->query("SELECT * from tarif where id_tarif = '$tarif'");
        foreach ($tampil->getResultArray() as $t) {
            $tarif_kwh = $t['tarif_perkwh'];
        }
    }
    $total_meter = $penggunaan['meter_akhir'] - $penggunaan['meter_awal'];
    $total_bayar = $tarif_kwh * $total_meter;
    $status = $penggunaan['status'];
    if (!$status == 1) {
        $status = 'belum bayar';
    } else {
        $status = 'sudah bayar';
    }
    ?>
    <div class="isi-form">
        <form action="/agen/pelanggan/bayar/<?= $penggunaan['id']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="no_penggunaan" value="<?= $penggunaan['no_penggunaan']; ?>">
            <input type="hidden" name="id_pelanggan" value="<?= $penggunaan['id_pelanggan']; ?>">
            <input type="hidden" name="bulan" value="<?= $penggunaan['bulan']; ?>">
            <input type="hidden" name="tahun" value="<?= $penggunaan['tahun']; ?>">
            <input type="hidden" name="tgl_cek" value="<?= $penggunaan['tgl_cek']; ?>">
            <input type="hidden" name="id_petugas" value="<?= $penggunaan['id_petugas']; ?>">
            <input type="hidden" name="meter_awal" value="<?= $penggunaan['meter_awal']; ?>">
            <input type="hidden" name="meter_akhir" value="<?= $penggunaan['meter_akhir']; ?>">
            <input type="hidden" name="jumlah_meter" value="<?= $total_meter; ?>">
            <input type="hidden" name="tarif_perkwh" value="<?= $tarif_kwh; ?>">
            <input type="hidden" name="jumlah_bayar" value="<?= $total_bayar; ?>">
            <input type="hidden" name="status" value="1">

            <div class="baris">
                <div class="kolom-25">
                    <label for="meter_awal">Meter Awal</label>
                </div>
                <div class="kolom-75">
                    <input type="text" disabled id="meter_awal" name="meter_awal" class="<?= ($validasi->hasError('meter_awal')) ? 'tidak-valid' : ''; ?>" autofocus value="<?= (old('meter_awal')) ? old('meter_awal') : $penggunaan['meter_awal'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('meter_awal') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-25">
                    <label for="meter_akhir">Meter Akhir</label>
                </div>
                <div class="kolom-75">
                    <input type="text" disabled id="meter_akhir" name="meter_akhir" class="<?= ($validasi->hasError('meter_akhir')) ? 'tidak-valid' : ''; ?>" autofocus value="<?= (old('meter_akhir')) ? old('meter_akhir') : $penggunaan['meter_akhir'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('meter_akhir') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-25">
                    <label for="jumlah_meter">Jumlah Meter</label>
                </div>
                <div class="kolom-75">
                    <input type="text" disabled id="jumlah_meter" name="jumlah_meter" value="<?= $total_meter ?>" class="<?= ($validasi->hasError('jumlah_meter')) ? 'tidak-valid' : ''; ?>" autofocus value="<?= (old('jumlah_meter')) ? old('jumlah_meter') : $penggunaan['jumlah_meter'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('jumlah_meter') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-25">
                    <label for="tarif_perkwh">Tarif</label>
                </div>
                <div class="kolom-75">
                    <input type="text" disabled id="tarif_perkwh" name="tarif_perkwh" value="<?= $tarif_kwh; ?>" class="<?= ($validasi->hasError('tarif_perkwh')) ? 'tidak-valid' : ''; ?>" autofocus value="<?= (old('tarif_perkwh')) ? old('tarif_perkwh') : $penggunaan['tarif_perkwh'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('tarif_perkwh') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-25">
                    <label for="jumlah_bayar">Total</label>
                </div>
                <div class="kolom-75">
                    <input type="text" disabled id="jumlah_bayar" name="jumlah_bayar" value="<?= $total_bayar; ?>" class="<?= ($validasi->hasError('jumlah_bayar')) ? 'tidak-valid' : ''; ?>" autofocus value="<?= (old('jumlah_bayar')) ? old('jumlah_bayar') : $penggunaan['jumlah_bayar'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('jumlah_bayar') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-25">
                    <label for="bayar">Bayar</label>
                </div>
                <div class="kolom-75">
                    <input type="text" id="bayar" name="bayar" class="<?= ($validasi->hasError('bayar')) ? 'tidak-valid' : ''; ?>" autofocus value="<?= (old('bayar')) ? old('bayar') : $penggunaan['bayar'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('bayar') ?></div>
                </div>
            </div>

            <div class="baris">
                <div class="kolom-25">
                    <label for="status">Status</label>
                </div>
                <div class="kolom-75">
                    <input type="text" disabled id="status" name="status" value="<?= $status; ?>" class="<?= ($validasi->hasError('status')) ? 'tidak-valid' : ''; ?>" autofocus value="<?= (old('status')) ? old('status') : $penggunaan['status'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('status') ?></div>
                </div>
            </div>
            <div class="baris">
                <?php
                $status = $penggunaan['status'];
                if (!$status == 1) {
                ?>
                    <input type="submit" value="Bayar">
                <?php
                } else {
                ?>
                    <input type="submit" value="Bayar" style="display: none;">
                <?php
                }
                ?>

            </div>
        </form>
    </div>
</article>
<?= $this->endSection() ?>