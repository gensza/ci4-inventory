<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" name="base-url" content="<?= base_url() ?>">
    <title><?= $title ?? 'Admin Panel' ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- custom css Sidebar -->
    <link rel="stylesheet" href="<?= base_url('assets/css/layouts/sidebar.css') ?>">
    <link rel="stylesheet" href=<?= base_url('assets/css/layouts/navbar.css') ?>>
    <link rel="stylesheet" href=<?= base_url('assets/css/layouts/custom.css') ?>>

    <?= $this->renderSection('css') ?>
</head>

<body>

    <div class="d-flex">

        <!-- Sidebar -->
        <?= $this->include('layouts/sidebar') ?>

        <div class="flex-grow-1">

            <!-- Navbar -->
            <?= $this->include('layouts/navbar') ?>

            <!-- Content -->
            <div class="content-wrapper">
                <div class="content-inner">
                    <?= $this->renderSection('content') ?>
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <?= $this->renderSection('js') ?>
</body>

</html>