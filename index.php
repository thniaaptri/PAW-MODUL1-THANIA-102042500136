<?php
// 1. buat menyimpan data produk dalam Array PHP sesuai ketentuan[cite: 1]
$produk_store = [
    [
        "nama" => "Monitor 24 Inch",
        "kategori" => "MONITOR",
        "harga" => 1800000,
        "stok" => 4
    ],
    [
        "nama" => "MacBook Air M1",
        "kategori" => "LAPTOP",
        "harga" => 24000000,
        "stok" => 3
    ],
    [
        "nama" => "Mouse Wireless",
        "kategori" => "AKSESORIS",
        "harga" => 250000,
        "stok" => 12
    ],
    [
        "nama" => "Keyboard Mechanical",
        "kategori" => "AKSESORIS",
        "harga" => 850000,
        "stok" => 0
    ],
    [
        "nama" => "Headset Gaming",
        "kategori" => "AUDIO",
        "harga" => 1200000,
        "stok" => 5
    ],
    [
        "nama" => "Webcam 1080p",
        "kategori" => "AKSESORIS",
        "harga" => 450000,
        "stok" => 0
    ]
];

// 2. buat menghitung jumlah produk otomatis menggunakan fungsi bawaan PHP[cite: 1]
$total_produk = count($produk_store);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cia Store </title>
    <!-- Menghubungkan file CSS ke file ini[cite: 1] -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- NAVBAR[cite: 1] -->
    <nav class="navbar">
        <div class="logo">Cia Store</div>
        <div class="menu">
            <a href="#">Home</a>
            <a href="#">Products</a>
            <a href="#">About</a>
        </div>
    </nav>

    <!-- HERO SECTION[cite: 1] -->
    <header class="hero">
        <h4>CIA STORE</h4>
        <h1>Simple Tech Store.</h1>
        <p>Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p><br>
        <a href="#katalog" class="btn-hero">Lihat Produk</a>
    </header>

    <!-- KATALOG PRODUK[cite: 1] -->
    <main class="katalog-section" id="katalog">

        <div class="katalog-header">
            <div>
                <p>OUR PRODUCTS</p>
                <h2>Katalog Produk</h2>
            </div>
            <!-- Menampilkan total produk[cite: 1] -->
            <div>Total Produk: <?= $total_produk ?></div>
        </div>

        <div class="product-grid">
            <?php
            // 3. Perulangan PHP untuk mencetak card produk secara otomatis[cite: 1]
            foreach ($produk_store as $item) {

                // 4. Challenge: Logika Diskon 10% jika harga >= Rp1.000.000[cite: 1]
                $is_diskon = false;
                $harga_akhir = $item["harga"];

                if ($item["harga"] >= 1000000) {
                    $is_diskon = true;
                    $nilai_diskon = $item["harga"] * 0.10; // Menghitung 10%[cite: 1]
                    $harga_akhir = $item["harga"] - $nilai_diskon;
                }
            ?>
                <!-- CARD HTML[cite: 1] -->
                <div class="card">
                    <span class="kategori"><?= $item["kategori"] ?></span>
                    <h3 class="nama-produk"><?= $item["nama"] ?></h3>

                    <?php
                    // 5. Percabangan tampilan harga (Diskon vs Normal) dengan format Rupiah[cite: 1]
                    if ($is_diskon) { ?>
                        <span class="harga-coret">Rp<?= number_format($item["harga"], 0, ',', '.') ?></span>
                        <span class="badge-diskon">10%</span><br>
                        <span class="harga-diskon">Rp<?= number_format($harga_akhir, 0, ',', '.') ?></span>
                    <?php } else { ?>
                        <span class="harga-normal">Rp<?= number_format($item["harga"], 0, ',', '.') ?></span>
                    <?php } ?>

                    <!-- 6. Percabangan tampilan Stok dan Tombol Beli[cite: 1] -->
                    <div class="stok">
                        Stok: <?= $item["stok"] ?> |
                        <?php if ($item["stok"] > 0) { ?>
                            <span class="tersedia">Tersedia</span>
                        <?php } else { ?>
                            <span class="habis">Stok Habis</span>
                        <?php } ?>
                    </div>

                    <?php if ($item["stok"] > 0) { ?>
                        <button class="btn-beli">Beli Sekarang</button>
                    <?php } else { ?>
                        <button class="btn-beli btn-disabled" disabled>Stok Habis</button>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </main>

    <!-- FOOTER[cite: 1] -->
    <footer>
        &copy; 2026 Cia Store. All rights reserved.
    </footer>

</body>
</html>