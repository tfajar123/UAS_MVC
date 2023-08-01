<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>

        <div class="col py-3">
        <a href="<?= URLROOT; ?>/admin/posts" class="btn btn-light"><i class="fa fa-backward mx-1"></i>Kembali</a>
            <br>
            <h1><?= $data['post']->title; ?></h1>
            <div class="bg-secondary text-white p-2 mb-3">
                Ditulis oleh <?= $data['user']->name; ?> pada <?= $data['post']->created_at; ?>
            </div>
            <p><?= $data['post']->body; ?></p>

                <hr>
                <div class="row mt-4">
                    <div class="col d-grid">
                        <a href="<?= URLROOT; ?>/admin/edit/<?= $data['post']->id; ?>" class="btn btn-dark w-25">Edit</a>
                    </div>
                    <div class="col d-grid">
                        <form class="text-end" action="<?= URLROOT; ?>/admin/delete/<?= $data['post']->id; ?>" method="post">
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>