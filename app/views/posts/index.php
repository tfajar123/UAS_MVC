<?php require APPROOT . '/views/inc/header.php'; ?>
    <?php flash('post_message'); ?>
    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Posts</h1>
        </div>
        <?php if(isset($_SESSION['user_id'])) : ?>
        <div class="col-md-6 text-end mt-2">
            <a href="<?= URLROOT; ?>/posts/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil" aria-hidden="true"></i> Add Post
            </a>
        </div>
        <?php endif; ?>
    </div>
    <?php foreach($data['posts'] as $post) : ?>
        <div class="card card-body mb-3">
            <h4 class="card-title"><?= $post->title; ?></h4>
            <div class="bg-light p-2 mb-3">
                Ditulis oleh <?= $post->name; ?> pada <?= $post->postCreated; ?>
            </div>
            <p class="card-text"><?= substr($post->body, 0, 250). "..."; ?></p>
            <a href="<?= URLROOT; ?>/posts/show/<?= $post->postId; ?>" class="btn btn-dark">Selengkapnya</a>
        </div>
    <?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>