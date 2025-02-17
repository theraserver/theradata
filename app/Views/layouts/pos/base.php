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
    <title></title>
    <!-- CSS files -->
    <link href="<?= site_url('assets') ?>/dist/css/tabler.min.css?1692870487" rel="stylesheet" />
    <link href="<?= site_url('assets') ?>/dist/css/tabler-flags.min.css?1692870487" rel="stylesheet" />
    <link href="<?= site_url('assets') ?>/dist/css/tabler-payments.min.css?1692870487" rel="stylesheet" />
    <link href="<?= site_url('assets') ?>/dist/css/tabler-vendors.min.css?1692870487" rel="stylesheet" />
    <link href="<?= site_url('assets') ?>/dist/css/demo.min.css?1692870487" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
    <?= $this->renderSection('pageStyles') ?>
</head>

<body class="layout-fluid">
    <script src="<?= site_url('assets') ?>/dist/js/demo-theme.min.js?1692870487"></script>
    <?= $this->include('layouts/header'); ?>
    <div class="page">
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                Empty page
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <!-- Content here -->
                    <?= $this->renderSection('content'); ?>
                </div>
            </div>
            <?= $this->include('layouts/footer'); ?>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?= site_url('assets') ?>/dist/js/tabler.min.js?1692870487" defer></script>
    <script src="<?= site_url('assets') ?>/dist/js/demo.min.js?1692870487" defer></script>
    <?= $this->renderSection('pageScripts') ?>
</body>

</html>