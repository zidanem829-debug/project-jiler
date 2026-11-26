<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $pageTitle = seo_title($title); ?>
    <title><?= esc($pageTitle) ?></title>
    <meta name="description" content="<?= esc($description) ?>">
    <meta name="robots" content="<?= esc($robots) ?>">
    <link rel="canonical" href="<?= esc($canonical) ?>">
    <link rel="icon" href="<?= base_url('favicon.ico') ?>?v=20261125" sizes="any">
    <link rel="apple-touch-icon" href="<?= base_url('apple-touch-icon.png') ?>?v=20261125" sizes="180x180">
    <meta name="theme-color" content="#f6f1e7">
    <?php if ($verification !== ''): ?>
        <meta name="google-site-verification" content="<?= esc($verification) ?>">
    <?php endif; ?>

    <meta property="og:locale" content="id_ID">
    <meta property="og:type" content="<?= esc($ogType) ?>">
    <meta property="og:title" content="<?= esc($pageTitle) ?>">
    <meta property="og:description" content="<?= esc($description) ?>">
    <meta property="og:url" content="<?= esc($canonical) ?>">
    <?php if (seo_store_name() !== null): ?>
        <meta property="og:site_name" content="<?= esc(seo_store_name()) ?>">
    <?php endif; ?>
    <?php if ($ogImage !== ''): ?>
        <meta property="og:image" content="<?= esc($ogImage) ?>">
        <meta name="twitter:image" content="<?= esc($ogImage) ?>">
    <?php endif; ?>
    <?php if ($product !== null): ?>
        <meta property="product:price:amount" content="<?= esc((string) product_price($product)) ?>">
        <meta property="product:price:currency" content="IDR">
    <?php endif; ?>

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?= esc($pageTitle) ?>">
    <meta name="twitter:description" content="<?= esc($description) ?>">

    <script>document.documentElement.classList.add('js');</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/site.css') ?>">
    <?php $jsonLdOutput = seo_json_ld($jsonLd); ?>
    <?php if ($jsonLdOutput !== ''): ?>
        <script type="application/ld+json"><?= $jsonLdOutput ?></script>
    <?php endif; ?>
</head>
<body class="site-body">
<a class="skip-link" href="#main">Lewati ke konten</a>

<header class="site-header" data-site-header>
    <div class="wrap header-inner">
        <a class="brand" href="<?= site_url('/') ?>" aria-label="<?= esc(store_name()) ?>">
            <span class="brand-mark brand-mark-image" aria-hidden="true">
                <img src="<?= base_url('assets/img/brand/zafscript-monogram.jpg') ?>" alt="" width="48" height="48">
            </span>
            <span class="brand-text">
                <?= esc(store_name()) ?>
                <small>Web App & Automation</small>
            </span>
        </a>

        <nav class="site-nav" id="site-nav" data-site-nav aria-label="Navigasi utama">
            <a href="<?= site_url('produk') ?>" <?= $active === 'catalog' ? 'aria-current="page"' : '' ?>>Produk</a>
            <a href="<?= site_url('/') ?>#cara-kerja">Cara kerja</a>
            <a href="<?= site_url('/') ?>#faq">Pertanyaan</a>
            <a href="<?= site_url('status') ?>" <?= $active === 'status' ? 'aria-current="page"' : '' ?>>Cek pesanan</a>
            <a class="btn btn-primary" href="<?= site_url('produk') ?>">Pilih template</a>
        </nav>

        <div class="nav-actions">
            <a class="btn btn-primary btn-small" href="<?= site_url('produk') ?>">Pilih template</a>
            <button class="nav-toggle" type="button" data-nav-toggle aria-expanded="false" aria-controls="site-nav" aria-label="Buka navigasi">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</header>

<main id="main">
    <div class="wrap">
        <?= $this->include('partials/flash') ?>
    </div>
    <?= $content ?>
</main>

<footer class="site-footer">
    <div class="wrap">
        <div class="footer-grid">
            <div class="footer-brand">
                <a class="brand" href="<?= site_url('/') ?>">
                    <span class="brand-mark brand-mark-image" aria-hidden="true">
                        <img src="<?= base_url('assets/img/brand/zafscript-monogram.jpg') ?>" alt="" width="48" height="48">
                    </span>
                    <span class="brand-text">
                        <?= esc(store_name()) ?>
                        <small>Web App & Automation</small>
                    </span>
                </a>
                <p><?= esc($store->tagline) ?>. Pembayaran diproses lewat gateway, akses template dikirim otomatis ke email setelah pembayaran terverifikasi.</p>
            </div>

            <div class="footer-col">
                <h2>Jelajahi</h2>
                <ul>
                    <li><a href="<?= site_url('produk') ?>">Katalog aplikasi</a></li>
                    <li><a href="<?= site_url('/') ?>#cara-kerja">Cara kerja</a></li>
                    <li><a href="<?= site_url('status') ?>">Cek status pesanan</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h2>Informasi</h2>
                <ul>
                    <li><a href="<?= site_url('syarat') ?>">Syarat dan ketentuan</a></li>
                    <li><a href="<?= site_url('privasi') ?>">Kebijakan privasi</a></li>
                    <li><a href="<?= site_url('admin/login') ?>">Masuk admin</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <span>&copy; <?= date('Y') ?> <?= esc(store_name()) ?>. Semua hak dilindungi.</span>
            <span class="footer-credit">Diproduksi oleh <?= esc($store->producer) ?></span>
        </div>
    </div>
</footer>

<script src="<?= base_url('assets/js/site.js') ?>" defer></script>
</body>
</html>
