<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?= URLROOT; ?>" class="btn btn-light"><i class="fa fa-backward mx-1"></i>Kembali</a>
    <br>
    <div class="row">
        <div class="col-11">
            <h1><?= $data['news']->title; ?></h1>
            <div class="col-1">
                    <!-- Tombol berbagi untuk Facebook -->
                    <a class="me-1" href="https://www.facebook.com/sharer/sharer.php?u=<?= $data['currentURL']; ?>" target="_blank">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Facebook_f_logo_%282019%29.svg/900px-Facebook_f_logo_%282019%29.svg.png" class="img-fluid" style="width: 30px;" alt="Bagikan di Facebook">
                    </a>

                    <!-- Tombol berbagi untuk Twitter -->
                    <a href="https://twitter.com/intent/tweet?url=<?= $data['currentURL']; ?>" target="_blank">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/ce/X_logo_2023.svg/180px-X_logo_2023.svg.png" class="img-fluid" style="width: 30px;" alt="Bagikan di Twitter">
                    </a>
                </div>
        </div>
    </div>
    
    <div class="bg-secondary text-white p-2 mb-3">
        Ditulis oleh <?= $data['user']->name; ?> pada <?= $data['news']->created_at; ?>
    </div>
    <?php if($data['news']->image !== null) :?>
    <img src="<?= URLROOT; ?>/assets/img/<?= $data['news']->image; ?>" alt="image" class="img-fluid w-50 mx-auto d-block">
    <?php endif; ?>
    <p class="mt-3"><?= nl2br($data['news']->body);?></p> <!-- Fungsi dari nl2br adalah untuk memisah paragraf body yang diambil dari database -->
<?php require APPROOT . '/views/inc/footer.php'; ?>