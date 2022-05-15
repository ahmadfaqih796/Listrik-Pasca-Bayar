<?= $this->extend('layout/agen'); ?>
<?= $this->section('konten'); ?>
<legend>Tambah Pelanggan</legend>
<article>
    <div class="isi-form">
        <form action="/agen/pelanggan/simpan" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <?php
            $tenggang = date("d");
            $id_pel = date("YmdHis");
            if (date('z') < 10) {
                $no_met = "00" . date("zymNHs");
            } elseif (date('z') < 100) {
                $no_met = "0" . date("zymNHs");
            } else {
                $no_met = date("zymNHs");
            }
            ?>
            <input type="hidden" id="no_pelanggan" name="no_pelanggan" value="<?= $id_pel; ?>">
            <input type="hidden" id="no_meter" name="no_meter" value="<?= $no_met; ?>">
            <input type="hidden" id="tenggang" name="tenggang" value="<?= $tenggang; ?>">
            <div class="baris">
                <div class="kolom-25">
                    <label for="nama">Nama</label>
                </div>
                <div class="kolom-75">
                    <input type="text" id="nama" name="nama" placeholder="siapa namanya ?" value="<?= old('nama') ?>">
                </div>
            </div>
            <div class="baris">
                <div class="kolom-25">
                    <label for="alamat">Alamat</label>
                </div>
                <div class="kolom-75">
                    <input type="text" id="alamat" name="alamat" placeholder="apa Alamatnya ?" value="<?= old('alamat') ?>">
                </div>
            </div>

            <div class="baris">
                <div class="kolom-25">
                    <label for="id_tarif">Tarif</label>
                </div>
                <div class="kolom-75">
                    <select id="id_tarif" name="id_tarif">
                        <option value="3">R3/450VA</option>
                        <option value="4">R1/900VA</option>
                        <option value="5">R2/450VA</option>
                        <option value="8">R2/900VA</option>
                        <option value="9">B1/1500VA</option>
                        <option value="10">R3/900VA</option>
                        <option value="13">R1/450VA</option>
                        <option value="16">R3/1300VA</option>
                    </select>
                </div>
            </div>
            <div class="baris">
                <input type="submit" value="Tambah">
            </div>
        </form>
    </div>
</article>
<?= $this->endSection() ?>