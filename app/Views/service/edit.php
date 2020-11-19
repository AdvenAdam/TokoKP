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
                                        <form action="/service/update/<?= $service['id']; ?>" method="post" enctype="multipart/form-data">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="slug" value="<?= $service['slug']; ?>">
                                            <input type="hidden" name="fotoLama" value="<?= $service['foto']; ?>">
                                            <div class="grid-header">
                                                <h7 class="my-10"><?= "Informasi "; ?></h7>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" require id="nama" name="nama" value="<?= (old('nama')) ? (old('nama')) : $service['nama']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('nama'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="kerusakan" class="col-sm-2 col-form-label">Kerusakan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control <?= ($validation->hasError('kerusakan')) ? 'is-invalid' : ''; ?>" require id="kerusakan" name="kerusakan" value="<?= (old('kerusakan')) ? (old('kerusakan')) : $service['kerusakan']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('kerusakan'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="pc" class="col-sm-2 col-form-label">Pc</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control <?= ($validation->hasError('pc')) ? 'is-invalid' : ''; ?>" require id="pc" name="pc" value="<?= (old('pc')) ? (old('pc')) : $service['pc']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('pc'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="status" class="col-sm-2 col-form-label"> status</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?>" require id="status" name="status" value="<?= (old('status')) ? (old('status')) : $service['status']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('status'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="biaya" class="col-sm-2 col-form-label">Biaya</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control <?= ($validation->hasError('biaya')) ? 'is-invalid' : ''; ?>" require id="biaya" name="biaya" value="<?= (old('biaya')) ? (old('biaya')) : $service['biaya']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('biaya'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="no_hp" class="col-sm-2 col-form-label">No HP</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" require id="no_hp" name="no_hp" value="<?= (old('no_hp')) ? (old('no_hp')) : $service['no_hp']; ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('no_hp'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <label for="rincian_service" class="col-sm-2 col-form-label">Rincian Service</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" cols="12" rows="5" id="rincian_service" name="rincian_service"> <?= (old('rincian_service')) ? (old('rincian_service')) : $service['rincian_service']; ?></textarea>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('rincian_service'); ?>
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