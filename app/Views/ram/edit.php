<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="page-content-wrapper">
    <div class="page-content-wrapper-inner">
        <div class="content-viewport">
            <div class="row">
                <div class="col-12 py-5">
                    <div class="grid">
                        <div class="grid-header">
                            <h2 class="my-3"><?= $title; ?></h2>
                        </div>
                        <div class="grid-body">
                            <div class="item-wrapper">
                                <div class="row mb-3">
                                    <div class="col-md-8 mx-auto">
                                        <form action="/ram/update/<?= $ram['id']; ?>" method="post" enctype="multipart/form-data">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="slug" value="<?= $ram['slug']; ?>">
                                            <input type="hidden" name="gambarLama" value="<?= $ram['gambar']; ?>">
                                            <div class="grid-header">
                                                <h7 class="my-10"><?= "Informasi Dasar Produk"; ?></h7>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="merk" class="col-sm-2 col-form-label">Merk</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control  <?= ($validation->hasError('merk')) ? 'is-invalid' : ''; ?>" id="merk" name="merk" autofocus value="<?= (old('merk')) ? (old('merk')) : $ram['merk']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('merk'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" require id="nama" name="nama" value="<?= (old('nama')) ? (old('nama')) : $ram['nama']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('nama'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" require id="harga" name="harga" value="<?= (old('harga')) ? (old('harga')) : $ram['harga']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('harga'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : ''; ?>" require id="stok" name="stok" value="<?= (old('stok')) ? (old('stok')) : $ram['stok']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('stok'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid-header">
                                                <h7 class="my-10"><?= "Informasi Dasar RAM"; ?></h7>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="jenis_ram" class="col-sm-2 col-form-label">Jenis RAM</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control <?= ($validation->hasError('jenis_ram')) ? 'is-invalid' : ''; ?>" require id="jenis_ram" name="jenis_ram" value="<?= (old('jenis_ram')) ? (old('jenis_ram')) : $ram['jenis_ram']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('jenis_ram'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="ukuran_ram" class="col-sm-2 col-form-label">Ukuran Ram</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control <?= ($validation->hasError('ukuran_ram')) ? 'is-invalid' : ''; ?>" require id="ukuran_ram" name="ukuran_ram" value="<?= (old('ukuran_ram')) ? (old('ukuran_ram')) : $ram['ukuran_ram']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('ukuran_ram'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="frekuensi" class="col-sm-2 col-form-label">Frekuensi</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control <?= ($validation->hasError('frekuensi')) ? 'is-invalid' : ''; ?>" require id="frekuensi" name="frekuensi" value="<?= (old('frekuensi')) ? (old('frekuensi')) : $ram['frekuensi']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('frekuensi'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid-header">
                                                <h7 class="my-10"><?= "Rincian Produk"; ?></h7>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="rincian" class="col-sm-2 col-form-label">Rincian</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" cols="12" rows="5" id="rincian" name="rincian"> <?= (old('rincian')) ? (old('rincian')) : $ram['rincian']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                                                <div class="col-sm-2">
                                                    <img src="/img/ram/<?= $ram['gambar']; ?>" class="img-thumbnail img-preview">
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" onchange="previewImg()">
                                                        <div class="invalid-feedback">
                                                            <?= $validation->getError('gambar'); ?>
                                                        </div>
                                                        <label class="custom-file-label" for="gambar"><?= $ram['gambar']; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <div class="col-sm-9">
                                                </div>
                                                <div class="col-sm-3">
                                                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?= $this->endSection(); ?>