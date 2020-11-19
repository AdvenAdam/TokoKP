<!-- Procie -->
<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="page-content-wrapper">
    <div class="page-content-wrapper-inner">
        <div class="row">
            <div class="col mt-5 mb-3">
                <div class="grid">
                    <div class="grid-header mt-2 mb-2">
                        <h1>
                            <?= $title; ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $i = 1; ?>
            <?php $x = 1; ?>
            <?php foreach ($casing as $key => $value) { ?>
                <div class="col-md-3 col-sm-6 col-6 equel-grid">
                    <form action="/casing/addstok/<?= $value['id']; ?>" method="post" enctype="multipart/form-data">
                        <div class="grid">
                            <input type="hidden" value="<?= $value['stok']; ?>" name="stokLama">
                            <div class="grid-header mb-1 mt-3">
                                <p class="text-black"><b><?= $value['nama']; ?></b></p>
                            </div>
                            <div class="grid-body text-gray mt-1">
                                <div class="d-flex justify-content-between mb-3">
                                    <img src="/img/casing/<?= $value['gambar']; ?>" width="200px" height="150px">
                                </div>
                                <?= $value['stok']; ?><br>
                                <div class="slidecontainer">
                                    <input type="range" min="1" max="50" value="25" class="slider" name="stok" id="myRange<?= $x++; ?>">
                                    <p>Value: <span id="val<?= $i++; ?>"></span></p>
                                </div>
                                <center>
                                    <button type="submit" class="btn btn-success">Add</button>
                                </center>
                            </div>
                        </div>
                </div>
                </form>
            <?php } ?>
        </div>
    </div>
    <?php for ($i = 1; $i <= $total; $i++) { ?>
        <script>
            var slider = document.getElementById("myRange<?= $i; ?>");
            var output<?= $i; ?> = document.getElementById("val<?= $i; ?>");
            output<?= $i; ?>.innerHTML = slider.value;

            slider.oninput = function() {
                output<?= $i; ?>.innerHTML = this.value;
            }
        </script>
    <?php } ?>
    <?= $this->endSection(); ?>