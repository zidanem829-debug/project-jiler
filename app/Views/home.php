<?php
$featuredFeatures = $featured ? array_slice(product_features($featured['fitur']), 0, 4) : [];
$faqs             = $faqs ?? [];
?>
<section class="hero">
    <div class="wrap hero-grid">
        <div class="hero-copy">
            <h1>Aplikasi web siap pakai berbasis Google Sheets & Apps Script.</h1>
            <p class="lede">Kelola aktivitas harian hingga pekerjaan Anda lebih rapi tanpa kerumitan coding maupun biaya server. Seluruh data tersimpan aman di Google Drive pribadi Anda dan dilengkapi panduan pasang langkah demi langkah—cukup bayar sekali untuk akses selamanya, tanpa biaya langganan bulanan.</p>
            <div class="hero-actions">
                <a class="btn btn-primary" href="<?= site_url('produk') ?>">Lihat katalog aplikasi</a>
                <a class="btn btn-ghost" href="<?= site_url('status') ?>">Cek status pesanan</a>
            </div>
            <div class="hero-facts">
                <span>Sekali bayar</span>
                <span>Akses selamanya</span>
                <span>Email otomatis setelah bayar</span>
            </div>
        </div>

        <aside class="dossier" aria-label="Isi paket aplikasi">
            <div class="dossier-head">
                <h2>Isi paket</h2>
                <span>Produk digital</span>
            </div>
            <div class="dossier-body">
                <div class="dossier-row"><strong>Template Google Sheets</strong><span>Siap disalin</span></div>
                <div class="dossier-row"><strong>Web app Apps Script</strong><span>Deploy sendiri</span></div>
                <div class="dossier-row"><strong>Video panduan</strong><span>Langkah deploy</span></div>
                <div class="dossier-row"><strong>Panduan teks</strong><span>Referensi cetak</span></div>
                <div class="dossier-row"><strong>Invoice resmi</strong><span>Dikirim via email</span></div>
            </div>
            <div class="dossier-foot">
                <p>Dikirim ke email pembeli setelah pembayaran terverifikasi.</p>
                <div class="dossier-total">
                    <span>Mulai dari</span>
                    <?php if ($featured !== null && product_promo_active($featured)): ?>
                        <span class="dossier-old"><s><?= rupiah($featured['harga']) ?></s></span>
                    <?php endif; ?>
                    <strong><?= rupiah($featured !== null ? product_price($featured) : 0) ?></strong>
                </div>
            </div>
        </aside>
    </div>
</section>

<div class="fact-strip">
    <div class="wrap">
        <dl class="fact-grid">
            <div class="fact">
                <dt>Pembayaran</dt>
                <dd>VA Permata, GoPay, QRIS</dd>
            </div>
            <div class="fact">
                <dt>Pengiriman akses</dt>
                <dd>Otomatis dari webhook</dd>
            </div>
            <div class="fact">
                <dt>Masa akses</dt>
                <dd>Tanpa batas waktu</dd>
            </div>
            <div class="fact">
                <dt>Panduan</dt>
                <dd>Video dan teks</dd>
            </div>
        </dl>
    </div>
</div>

<section class="section" id="produk">
    <div class="wrap">
        <div class="section-head">
            <h2>Pilih aplikasi sesuai kebutuhan anda.</h2>
            <p>Satu produk berisi template Google Sheets, web app Apps Script, dan panduan deploy. Harga mengikuti tingkat kompleksitas alur kerja.</p>
        </div>

        <?php if ($products === []): ?>
            <div class="panel">
                <div class="empty-state">
                    <h3>Belum ada aplikasi aktif</h3>
                    <p>Produk akan tampil di sini setelah admin menambahkannya dari dashboard.</p>
                    <a class="btn btn-ghost" href="<?= site_url('admin/login') ?>">Masuk dashboard</a>
                </div>
            </div>
        <?php else: ?>
            <div class="product-list">
                <?php foreach ($products as $index => $product): ?>
                    <article class="product-row">
                        <div class="product-row-main">
                            <h3><a href="<?= site_url('produk/' . $product['slug']) ?>"><?= esc($product['nama']) ?></a></h3>
                            <p><?= esc(mb_substr(strip_tags($product['deskripsi']), 0, 150)) ?><?= mb_strlen(strip_tags($product['deskripsi'])) > 150 ? '...' : '' ?></p>
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

<section class="section" id="cara-kerja">
    <div class="wrap feature-grid">
        <div class="feature-copy">
            <h2>Dibuat untuk pekerjaan berulang, bukan untuk presentasi.</h2>
            <p>Template mencatat barang masuk dan keluar, lalu menghitung sisa stok. Anda menyalinnya ke Google Drive sendiri, jadi data tetap berada di akun Anda. Panduan deploy disiapkan untuk pembeli yang belum pernah memakai Apps Script.</p>
            <p>Yang perlu Anda siapkan: akun Google dan waktu untuk mengikuti panduan. Tidak perlu menulis kode.</p>
            <?php if ($featured !== null && $featuredFeatures !== []): ?>
                <ul class="feature-check-list" style="margin-top: 24px;">
                    <?php foreach ($featuredFeatures as $fitur): ?>
                        <li><?= esc($fitur) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>

        <div class="steps" aria-label="Empat langkah membeli sampai deploy">
            <div class="step">
                <div class="step-number" aria-hidden="true"></div>
                <h3>Pilih aplikasi</h3>
                <p>Buka detail produk, cek isi aplikasi, lalu lanjut ke checkout.</p>
            </div>
            <div class="step">
                <div class="step-number" aria-hidden="true"></div>
                <h3>Bayar sesuai metode</h3>
                <p>Pilih Virtual Account, E-Wallet, atau QRIS. Pembayaran diproses oleh gateway.</p>
            </div>
            <div class="step">
                <div class="step-number" aria-hidden="true"></div>
                <h3>Terima email otomatis</h3>
                <p>Setelah webhook menyatakan pembayaran berhasil, invoice dan link akses dikirim ke email Anda.</p>
            </div>
            <div class="step">
                <div class="step-number" aria-hidden="true"></div>
                <h3>Salin dan deploy</h3>
                <p>Ikuti video dan panduan teks untuk menyalin template serta men-deploy web app di akun Google Anda.</p>
            </div>
        </div>
    </div>
</section>

<section class="section" id="faq">
    <div class="wrap feature-grid">
        <div class="feature-copy">
            <h2>Pertanyaan yang muncul sebelum membeli.</h2>
            <p>Jawaban di bawah mengikuti alur produk dan pengiriman akses yang sebenarnya. Jika ada yang belum terjawab, cek halaman status pesanan atau hubungi admin lewat email invoice.</p>
        </div>

        <div class="faq">
            <?php foreach ($faqs as $faq): ?>
                <details>
                    <summary><?= esc($faq['q']) ?></summary>
                    <div class="faq-answer"><?= esc($faq['a']) ?></div>
                </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="cta-band">
    <div class="wrap cta-band-inner">
        <div>
            <h2>Siap menata aktivitas Anda lebih teratur?</h2>
            <p>Pilih aplikasi yang sesuai kebutuhan, selesaikan pembayaran sekali saja, lalu pasang di Google Drive Anda melalui panduan yang praktis.</p>
        </div>
        <a class="btn btn-gold" href="<?= site_url('produk') ?>">Buka katalog</a>
    </div>
</section>
