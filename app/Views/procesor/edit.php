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
                                        <form action="/procesor/update/<?= $procesor['id']; ?>" method="post" enctype="multipart/form-data">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="slug" value="<?= $procesor['slug']; ?>">
                                            <input type="hidden" name="gambarLama" value="<?= $procesor['gambar']; ?>">
                                            <div class="grid-header">
                                                <h7 class="my-10"><?= "Informasi Dasar Produk"; ?></h7>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="merk" class="col-sm-2 col-form-label">Merk</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control  <?= ($validation->hasError('merk')) ? 'is-invalid' : ''; ?>" id="merk" name="merk" autofocus value="<?= (old('merk')) ? (old('merk')) : $procesor['merk']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('merk'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" require id="nama" name="nama" value="<?= (old('nama')) ? (old('nama')) : $procesor['nama']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('nama'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" require id="harga" name="harga" value="<?= (old('harga')) ? (old('harga')) : $procesor['harga']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('harga'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : ''; ?>" require id="stok" name="stok" value="<?= (old('stok')) ? (old('stok')) : $procesor['stok']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('stok'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid-header">
                                                <h7 class="my-10"><?= "Informasi Dasar Processor"; ?></h7>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="socket" class="col-sm-2 col-form-label">Socket</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control <?= ($validation->hasError('socket')) ? 'is-invalid' : ''; ?>" require id="socket" name="socket" value="<?= (old('socket')) ? (old('socket')) : $procesor['socket']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('socket'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="iGPU" class="col-sm-2 col-form-label">iGPU</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control <?= ($validation->hasError('iGPU')) ? 'is-invalid' : ''; ?>" require id="iGPU" name="iGPU" value="<?= (old('iGPU')) ? (old('iGPU')) : $procesor['iGPU']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('iGPU'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="frekuensi" class="col-sm-2 col-form-label">Frekuensi</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control <?= ($validation->hasError('frekuensi')) ? 'is-invalid' : ''; ?>" require id="frekuensi" name="frekuensi" value="<?= (old('frekuensi')) ? (old('frekuensi')) : $procesor['frekuensi']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('frekuensi'); ?>
                                                    </div>
                                                </div>
                                                <label for="cache" class="col-sm-2 col-form-label">Cache</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control <?= ($validation->hasError('cache')) ? 'is-invalid' : ''; ?>" require id="cache" name="cache" value="<?= (old('cache')) ? (old('cache')) : $procesor['cache']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('cache'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="jml_core" class="col-sm-2 col-form-label">Jumlah Core</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control <?= ($validation->hasError('jml_core')) ? 'is-invalid' : ''; ?>" require id="jml_core" name="jml_core" value="<?= (old('jml_core')) ? (old('jml_core')) : $procesor['jml_core']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('jml_core'); ?>
                                                    </div>
                                                </div>
                                                <label for="jml_threads" class="col-sm-2 col-form-label">Jumlah Threads</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control <?= ($validation->hasError('jml_threads')) ? 'is-invalid' : ''; ?>" require id="jml_threads" name="jml_threads" value="<?= (old('jml_threads')) ? (old('jml_threads')) : $procesor['jml_threads']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('jml_threads'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid-header">
                                                <h7 class="my-10"><?= "Rincian Produk"; ?></h7>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="rincian" class="col-sm-2 col-form-label">Rincian</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" cols="12" rows="5" id="rincian" name="rincian"> <?= (old('rincian')) ? (old('rincian')) : $procesor['rincian']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                                                <div class="col-sm-2">
                                                    <img src="/img/procesor/<?= $procesor['gambar']; ?>" class="img-thumbnail img-preview">
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" onchange="previewImg()">
                                                        <div class="invalid-feedback">
                                                            <?= $validation->getError('gambar'); ?>
                                                        </div>
                                                        <label class="custom-file-label" for="gambar"><?= $procesor['gambar']; ?></label>
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