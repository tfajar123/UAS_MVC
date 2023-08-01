<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>

        <div class="col py-3">
        <a href="<?= URLROOT; ?>/admin/news" class="btn btn-light"><i class="fa fa-backward mx-1"></i>Kembali</a>
            <br>
            <h1><?= $data['news']->title; ?></h1>
            <div class="bg-secondary text-white p-2 mb-3">
                Ditulis oleh <?= $data['user']->name; ?> pada <?= $data['news']->created_at; ?>
            </div>
            <?php if($data['news']->image !== null) :?>
            <img src="<?= URLROOT; ?>/assets/img/<?= $data['news']->image; ?>" alt="image" class="img-fluid w-50 mx-auto d-block">
            <?php endif; ?>
            <p class="mt-3"><?= nl2br($data['news']->body);?></p> <!-- Fungsi dari nl2br adalah untuk memisah paragraf yang diambil dari database -->
            <div class="row mt-4">
                    <div class="col d-grid">
                        <a href="<?= URLROOT; ?>/artikel/edit/<?= $data['news']->id; ?>" class="btn btn-dark w-25">Edit</a>
                    </div>
                    <div class="col d-grid">
                        <form class="text-end" action="<?= URLROOT; ?>/artikel/delete/<?= $data['news']->id; ?>" method="post">
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>