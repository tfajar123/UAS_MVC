<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>

        <div class="col py-3">
            <a href="<?= URLROOT; ?>/admin/posts" class="btn btn-light"><i class="fa fa-backward mx-1"></i>Kembali</a>
            <div class="card card-body bg-light mt-5">
                <div class="mx-4 py-4">
                    <h2>Edit Post</h2>
                    <p>Silahkan edit postingan anda</p>
                    <form action="<?= URLROOT; ?>/admin/edit/<?= $data['id']; ?>" method="post">
                        <div class="form-group">
                            <label for="title">Judul : <sup>*</sup></label>
                            <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['title']; ?>">
                            <span class="invalid-feedback"><?= $data['title_err']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="body">Body : <sup>*</sup></label>
                            <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?= $data['body']; ?></textarea>
                            <span class="invalid-feedback"><?= $data['body_err']; ?></span>
                        </div>
                        <input type="submit" class="btn btn-success mt-3" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>