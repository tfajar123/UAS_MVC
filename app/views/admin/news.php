<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>

        <div class="col py-3">
        <?php flash('post_message'); ?>
            <div class="row mb-3">
                <div class="col-md-6">
                    <h1>Recent News</h1>
                </div>
                <div class="col-md-6 text-end mt-2">
                    <a href="<?= URLROOT; ?>/artikel/add" class="btn btn-primary pull-right">
                        <i class="fa fa-pencil" aria-hidden="true"></i> Add Post
                    </a>
                </div>
            </div>
            
            <?php foreach($data['news'] as $new) : ?>
                <div class="card card-body mb-3">
                    <h4 class="card-title"><?= $new->title; ?></h4>
                    <div class="bg-light p-2 mb-3">
                        Ditulis oleh <?= $new->name; ?> pada <?= $new->newCreated; ?>
                    </div>
                    <p class="card-text"><?= substr($new->body, 0, 250) . "..."; ?></p>
                    <a href="<?= URLROOT; ?>/admin/shows/<?= $new->newsId; ?>" class="btn btn-dark">Selengkapnya</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>