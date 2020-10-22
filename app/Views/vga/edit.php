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
                                        <form action="/vga/update/<?= $vga['id']; ?>" method="post" enctype="multipart/form-data">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="slug" value="<?= $vga['slug']; ?>">
                                            <input type="hidden" name="gambarLama" value="<?= $vga['gambar']; ?>">
                                            <div class="grid-header">
                                                <h7 class="my-10"><?= "Informasi Dasar Produk"; ?></h7>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="merk" class="col-sm-2 col-form-label">Merk</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control  <?= ($validation->hasError('merk')) ? 'is-invalid' : ''; ?>" id="merk" name="merk" autofocus value="<?= (old('merk')) ? (old('merk')) : $vga['merk']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('merk'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" require id="nama" name="nama" value="<?= (old('nama')) ? (old('nama')) : $vga['nama']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('nama'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" require id="harga" name="harga" value="<?= (old('harga')) ? (old('harga')) : $vga['harga']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('harga'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : ''; ?>" require id="stok" name="stok" value="<?= (old('stok')) ? (old('stok')) : $vga['stok']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('stok'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid-header">
                                                <h7 class="my-10"><?= "Informasi Dasar VGA"; ?></h7>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="base_clock" class="col-sm-2 col-form-label">Base Clock</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control <?= ($validation->hasError('base_clock')) ? 'is-invalid' : ''; ?>" require id="base_clock" name="base_clock" value=" <?= (old('base_clock')) ? (old('base_clock')) : $vga['base_clock']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('base_clock'); ?>
                                                    </div>
                                                </div>
                                                <label for="boost_clock" class="col-sm-2 col-form-label">Boost Clock</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control <?= ($validation->hasError('boost_clock')) ? 'is-invalid' : ''; ?>" require id="boost_clock" name="boost_clock" value=" <?= (old('boost_clock')) ? (old('boost_clock')) : $vga['boost_clock']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('boost_clock'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="ukuran_memori" class="col-sm-2 col-form-label">Ukuran Memori</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control <?= ($validation->hasError('ukuran_memori')) ? 'is-invalid' : ''; ?>" require id="ukuran_memori" name="ukuran_memori" value=" <?= (old('ukuran_memori')) ? (old('ukuran_memori')) : $vga['ukuran_memori']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('ukuran_memori'); ?>
                                                    </div>
                                                </div>
                                                <label for="tipe_memori" class="col-sm-2 col-form-label">Tipe Memori</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control <?= ($validation->hasError('tipe_memori')) ? 'is-invalid' : ''; ?>" require id="tipe_memori" name="tipe_memori" value=" <?= (old('tipe_memori')) ? (old('tipe_memori')) : $vga['tipe_memori']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('tipe_memori'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="lebar_memori" class="col-sm-2 col-form-label">Lebar Memori</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control <?= ($validation->hasError('lebar_memori')) ? 'is-invalid' : ''; ?>" require id="lebar_memori" name="lebar_memori" value=" <?= (old('lebar_memori')) ? (old('lebar_memori')) : $vga['lebar_memori']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('lebar_memori'); ?>
                                                    </div>
                                                </div>

                                                <label for="konektor_daya" class="col-sm-2 col-form-label">Konektor daya</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control <?= ($validation->hasError('konektor_daya')) ? 'is-invalid' : ''; ?>" require id="konektor_daya" name="konektor_daya" value=" <?= (old('konektor_daya')) ? (old('konektor_daya')) : $vga['konektor_daya']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('konektor_daya'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid-header">
                                                <h7 class="my-10"><?= "Rincian Produk"; ?></h7>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="rincian" class="col-sm-2 col-form-label">Rincian</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" cols="12" rows="5" id="rincian" name="rincian"> <?= (old('rincian')) ? (old('rincian')) : $vga['rincian']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                                                <div class="col-sm-2">
                                                    <img src="/img/vga/<?= $vga['gambar']; ?>" class="img-thumbnail img-preview">
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" onchange="previewImg()">
                                                        <div class="invalid-feedback">
                                                            <?= $validation->getError('gambar'); ?>
                                                        </div>
                                                        <label class="custom-file-label" for="gambar"><?= $vga['gambar']; ?></label>
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