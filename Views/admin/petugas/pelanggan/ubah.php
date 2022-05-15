<?= $this->extend('layout/admin'); ?>
<?= $this->section('konten'); ?>
<legend>Update Pelanggan</legend>
<article>
    <div class="isi-form">
        <form action="/petugas/pelanggan/perbarui/<?= $pelanggan['id']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="no_pelanggan" value="<?= $pelanggan['no_pelanggan']; ?>">
            <input type="hidden" name="no_meter" value="<?= $pelanggan['no_meter']; ?>">
            <div class="baris">
                <div class="kolom-25">
                    <label for="no_meter">No Meter</label>
                </div>
                <div class="kolom-75">
                    <input type="text" disabled id="no_meter" name="no_meter" class="<?= ($validasi->hasError('no_meter')) ? 'tidak-valid' : ''; ?>" placeholder="nimnya ?" autofocus value="<?= (old('no_meter')) ? old('no_meter') : $pelanggan['no_meter'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('no_meter') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-25">
                    <label for="nama">Nama</label>
                </div>
                <div class="kolom-75">
                    <input type="text" id="nama" name="nama" class="<?= ($validasi->hasError('nama')) ? 'tidak-valid' : ''; ?>" placeholder="nimnya ?" autofocus value="<?= (old('nama')) ? old('nama') : $pelanggan['nama'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('nama') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-25">
                    <label for="alamat">Alamat</label>
                </div>
                <div class="kolom-75">
                    <input type="text" id="alamat" name="alamat" class="<?= ($validasi->hasError('alamat')) ? 'tidak-valid' : ''; ?>" placeholder="nimnya ?" autofocus value="<?= (old('alamat')) ? old('alamat') : $pelanggan['alamat'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('alamat') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-25">
                    <label for="tenggang">Tenggang</label>
                </div>
                <div class="kolom-75">
                    <input type="text" id="tenggang" name="tenggang" class="<?= ($validasi->hasError('tenggang')) ? 'tidak-valid' : ''; ?>" placeholder="nimnya ?" autofocus value="<?= (old('tenggang')) ? old('tenggang') : $pelanggan['tenggang'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('tenggang') ?></div>
                </div>
            </div>
            <div class="baris">
                <div class="kolom-25">
                    <label for="id_tarif">Tarif</label>
                </div>
                <div class="kolom-75">
                    <input type="text" id="id_tarif" name="id_tarif" class="<?= ($validasi->hasError('id_tarif')) ? 'tidak-valid' : ''; ?>" placeholder="nimnya ?" autofocus value="<?= (old('id_tarif')) ? old('id_tarif') : $pelanggan['id_tarif'] ?>">
                    <div class="tidak-valid-feedback"><?= $validasi->getError('id_tarif') ?></div>
                </div>
            </div>
            <div class="baris">
                <input type="submit" value="Ubah">
            </div>
        </form>
    </div>
</article>
<?= $this->endSection() ?>