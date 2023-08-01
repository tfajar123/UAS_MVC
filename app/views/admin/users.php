<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>

        <div class="col py-3">
            <div class="text-center">
                <h1>Welcome <?= $_SESSION['user_name']; ?></h1>
                <p>Ini adalah Control Panel Admin</p>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>