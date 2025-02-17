<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta20
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title> Therapos - <?= ucfirst($uri->getSegment(2)) ?></title>
    <!-- CSS files -->
    <link href="<?= site_url('assets') ?>/dist/css/tabler.min.css?1692870487" rel="stylesheet" />
    <link href="<?= site_url('assets') ?>/dist/css/tabler-flags.min.css?1692870487" rel="stylesheet" />
    <link href="<?= site_url('assets') ?>/dist/css/tabler-payments.min.css?1692870487" rel="stylesheet" />
    <link href="<?= site_url('assets') ?>/dist/css/tabler-vendors.min.css?1692870487" rel="stylesheet" />
    <link href="<?= site_url('assets') ?>/dist/css/demo.min.css?1692870487" rel="stylesheet" />
    <link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.2.2/af-2.7.0/b-3.2.2/b-colvis-3.2.2/b-html5-3.2.2/b-print-3.2.2/cr-2.0.4/fc-5.0.4/fh-4.0.1/r-3.0.4/rg-1.5.1/sp-2.3.3/sl-3.0.0/datatables.min.css" rel="stylesheet" integrity="sha384-vOKOcazSnztsSxE5yH4VaXkbBHaeQe29hNchwNJCcfkaLIGY4n3M5s8lUJUgrwdo" crossorigin="anonymous">
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }

        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            /* Ensure the loading screen is above all other content */
        }

        .spinner-border {
            width: 3rem;
            height: 3rem;
        }
    </style>
    <?= $this->renderSection('pageStyles') ?>
</head>

<body class="layout-fluid">
    <div id="loadingScreen" class="loading-screen d-none">
        <!-- <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <p class="mt-3">Loading...</p> -->
        <h1>Loading<span class="animated-dots"></span></h1>
    </div>
    <script src="<?= site_url('assets') ?>/dist/js/demo-theme.min.js?1692870487"></script>
    <div class="page">
        <!-- Sidebar -->
        <?= $this->include('layouts/office/partials/sidebar'); ?>

        <!-- Navbar -->
        <?= $this->include('layouts/office/partials/navbar'); ?>

        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <?php if ($uri->getSegment(2) === 'dashboard'): ?>
                                <div class="page-pretitle">
                                    Overview
                                </div>
                            <?php else: ?>
                                <ol class="breadcrumb">
                                    <?php
                                    // Mengambil semua segmen URL yang ada
                                    $segments = $uri->getSegments();

                                    // Menambahkan breadcrumb 'Home' terlebih dahulu
                                    echo '<li class="breadcrumb-item"><a href="' . site_url() . '">Home</a></li>';

                                    // Loop untuk menampilkan setiap segmen sebagai breadcrumb
                                    $url = '';  // Variable untuk menggabungkan URL
                                    foreach ($segments as $index => $segment):
                                        $url .= '/' . $segment;
                                        // Setiap breadcrumb selain yang terakhir, diberi link
                                        if ($index + 1 < count($segments)): ?>
                                            <li class="breadcrumb-item">
                                                <a href="<?= site_url($url) ?>"><?= ucfirst($segment) ?></a>
                                            </li>
                                        <?php else: ?>
                                            <!-- Breadcrumb terakhir, diberi class active tanpa link -->
                                            <li class="breadcrumb-item active">
                                                <?= ucfirst($segment) ?>
                                            </li>
                                    <?php endif;
                                    endforeach;
                                    ?>
                                </ol>


                            <?php endif ?>
                            <h2 class="page-title">
                                <?= ($uri->getSegment(3)) ? ucfirst($uri->getSegment(2)) . ' - ' . ucfirst($uri->getSegment(3)) : ucfirst($uri->getSegment(2)) ?>
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <?= $this->renderSection('titleActions'); ?>
                    </div>
                </div>
                <div class="toast-container position-fixed end-0 p-1">
                    <div class="toast fade" id="toast-success" role="alert" aria-live="assertive" aria-atomic="true" data-bs-animation="true" data-bs-autohide="true" data-bs-toggle="toast" data-bs-delay="5000">
                        <div class="toast-header text-bg-success">
                            <span class="avatar avatar-xs me-2" style="background-image: url(...)"></span>
                            <strong class="me-auto">Success</strong>
                            <button type="button" class="ms-2 btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            <?= session()->get('success') ?>
                        </div>
                    </div>
                    <div class="toast fade" id="toast-error" role="alert" aria-live="assertive" aria-atomic="true" data-bs-animation="true" data-bs-autohide="true" data-bs-toggle="toast" data-bs-delay="5000">
                        <div class="toast-header text-bg-danger">
                            <span class="avatar avatar-xs me-2" style="background-image: url(...)"></span>
                            <strong class="me-auto">Error</strong>
                            <button type="button" class="ms-2 btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            <?= session()->get('error') ?>
                        </div>
                    </div>
                    <div class="toast fade" id="toast-warning" role="alert" aria-live="assertive" aria-atomic="true" data-bs-animation="true" data-bs-autohide="true" data-bs-toggle="toast" data-bs-delay="5000">
                        <div class="toast-header text-bg-warning">
                            <span class="avatar avatar-xs me-2" style="background-image: url(...)"></span>
                            <strong class="me-auto">Warning</strong>
                            <button type="button" class="ms-2 btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            <?= session()->get('warning') ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <?= $this->renderSection('content'); ?>
                </div>
            </div>
            <?= $this->include('layouts/office/partials/footer'); ?>
        </div>
    </div>
    <?php if ($uri->getSegment(2) === 'dashboard') : ?>
        <!-- Libs JS -->
        <script src="<?= site_url('assets') ?>/dist/libs/apexcharts/dist/apexcharts.min.js?1692870487" defer></script>
        <script src="<?= site_url('assets') ?>/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1692870487" defer></script>
        <script src="<?= site_url('assets') ?>/dist/libs/jsvectormap/dist/maps/world.js?1692870487" defer></script>
        <script src="<?= site_url('assets') ?>/dist/libs/jsvectormap/dist/maps/world-merc.js?1692870487" defer></script>
        <?= $this->include('layouts/office/partials/demo-js') ?>
    <?php endif ?>
    <!-- Tabler Core -->
    <script src="<?= site_url('assets') ?>/dist/js/tabler.min.js?1692870487" defer></script>
    <script src="<?= site_url('assets') ?>/dist/js/demo.min.js?1692870487" defer></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js" integrity="sha384-VFQrHzqBh5qiJIU0uGU5CIW3+OWpdGGJM9LBnGbuIH2mkICcFZ7lPd/AAtI7SNf7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js" integrity="sha384-/RlQG9uf0M2vcTw3CX7fbqgbj/h8wKxw7C3zu9/GxcBPRKOEcESxaxufwRXqzq6n" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.2.2/af-2.7.0/b-3.2.2/b-colvis-3.2.2/b-html5-3.2.2/b-print-3.2.2/cr-2.0.4/fc-5.0.4/fh-4.0.1/r-3.0.4/rg-1.5.1/sp-2.3.3/sl-3.0.0/datatables.min.js" integrity="sha384-N4X3r4etr0hdCrdNnwljYL8Ah0YxhpkD4hf9lChpcdG2xR/hCkXrRRkB4ACPuyiw" crossorigin="anonymous"></script>
    <script src="<?= site_url('assets') ?>/dist/js/thera.js" defer></script>
    <script>
        $(document).ready(function() {
            <?php if (session()->get('success')): ?>
                $('#toast-success').toast('show');
            <?php elseif (session()->get('error')): ?>
                $('#toast-error').toast('show');
            <?php elseif (session()->get('warning')): ?>
                $('#toast-warning').toast('show');
            <?php endif ?>
        });
    </script>
    <?= $this->renderSection('pageScripts') ?>
</body>

</html>