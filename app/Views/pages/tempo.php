<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="text-center mt-4 mb-4">Berita Online Tempo</h1>
            <?php foreach ($xml_tempo->channel->item as $key => $value) : ?>
                <div class="card">
                    <img class="card-img-top img-fluid" src="<?php echo $value->img ?>" alt="thumbnail" width="100">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $value->title ?></h5>
                        <a class="card-text" href="<?php echo $value->link ?>" target="_blank"><small class="text-muted">Baca selengkapnya</small></a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>