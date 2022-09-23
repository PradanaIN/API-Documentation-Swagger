<?php
echo "<pre>";
print_r($json_bmkg);
?>

<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="text-center mt-4 mb-3">Data Gempa Bumi BMKG</h1>
            <div class="list-group">
                <?php foreach ($json_bmkg['Infogempa']['gempa'] as $key => $value) : ?>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><?php echo $value['Wilayah'] ?></h5>
                            <!-- date now minus date published -->
                            <small><?php echo $value['Tanggal'] ?></small>
                        </div>
                        <small class="text-muted"><?php echo $value['Dirasakan'] ?></small>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>