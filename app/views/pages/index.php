<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-3"><?= $data['title']; ?></h1>
            <p class="lead"><?= $data['description']; ?></p>
        </div>
    </div>

    <?php flash('post_message'); ?>
    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Recent News</h1>
        </div>
    </div>
    <?php foreach($data['news'] as $new) : ?>
        <div class="card card-body mb-3">
            <h4 class="card-title"><?= $new->title; ?></h4>
            <div class="bg-light p-2 mb-3">
                Ditulis oleh <?= $new->name; ?> pada <?= $new->newCreated; ?>
            </div>
            <p class="card-text"><?= substr($new->body, 0, 250) . "..."; ?></p>
            <a href="<?= URLROOT; ?>/artikel/show/<?= $new->newsId; ?>" class="btn btn-dark">Selengkapnya</a>
        </div>
    <?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>
