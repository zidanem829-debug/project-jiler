<section class="page-head">
    <div class="wrap">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="<?= site_url('/') ?>">Beranda</a>
            <span aria-hidden="true">/</span>
            <span>Produk</span>
        </nav>
        <h1>Katalog Aplikasi Web.</h1>
        <p>Setiap produk dilengkapi database Google Sheets, antarmuka web Apps Script, serta panduan pemasangan dalam format video dan teks. Pilih sistem yang paling selaras dengan kebutuhan harian hingga pekerjaan Anda.</p>
    </div>
</section>

<section class="section-tight">
    <div class="wrap">
        <?php if ($products === []): ?>
            <div class="empty-state">
                <h3>Belum ada template aktif</h3>
                <p>Admin belum menambahkan produk yang tampil di katalog. Tambahkan produk dari dashboard untuk mulai berjualan.</p>
                <a class="btn btn-ghost" href="<?= site_url('admin/login') ?>">Masuk dashboard</a>
            </div>
        <?php else: ?>
            <div class="product-list">
                <?php foreach ($products as $product): ?>
                    <article class="product-row">
                        <div class="product-row-main">
                            <h3><a href="<?= site_url('produk/' . $product['slug']) ?>"><?= esc($product['nama']) ?></a></h3>
                            <p><?= esc(mb_substr(strip_tags($product['deskripsi']), 0, 160)) ?><?= mb_strlen(strip_tags($product['deskripsi'])) > 160 ? '...' : '' ?></p>
                        </div>
                        <div class="product-meta">
                            <span class="badge badge-<?= complexity_tone($product['tingkat_kompleksitas']) ?>"><?= esc($product['tingkat_kompleksitas']) ?></span>
                        </div>
                        <div class="product-price"><?= view('partials/product-price', ['product' => $product]) ?></div>
                        <div class="product-cta">
                            <a class="btn btn-ghost btn-small" href="<?= site_url('produk/' . $product['slug']) ?>">Lihat detail</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
