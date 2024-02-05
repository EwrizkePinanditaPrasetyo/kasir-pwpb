<?= $this->extend('layout/dashboard'); ?>

<?= $this->section('content'); ?>
<style>
    .icon-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 150px; /* Sesuaikan dengan kebutuhan tinggi card */
}

.card {
    text-align: center;
}

.card-title {
    margin-top: 10px;
}
</style>
<div class="col-12 mt-3">
    <div class="row">
        <!-- Bagian Kiri (Daftar Menu) -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><b>Menu List</b></h3>
                </div>
                <div class="card-body">
                    <!-- Kategori Menu -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-info" onclick="showAll()">All</button>
                        <button type="button" class="btn btn-info" onclick="showFood()">Food</button>
                        <button type="button" class="btn btn-info" onclick="showDrink()">Drink</button>
                    </div>
                    <div class="custom-scroll" style="max-height: 420px; overflow-y: auto;">
                        <!-- Daftar Card Menu -->
                        <div class="row mt-3">
                            <?php foreach ($menu as $item) : ?>

                            <!-- Card 1 -->
                            <div class="col-md-6 food">
                                    <div class="card">
                                        <div class="icon-container">
                                            <i class="fas fa-utensils fa-3x" style="color: #3498db;"></i> <!-- Menggunakan ikon utensils dari Font Awesome -->
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $item['nama_produk'] ?></h5>
                                            <p class="card-text">Rp. <?= number_format($item['harga'], 0, ',', '.') ?></p>
                                            <a href="#" class="btn btn-primary">Add to Cart</a>
                                        </div>
                                    </div>
                                
                            </div>

                            <!-- Card 2 (Tambahkan card lainnya sesuai kebutuhan) -->
                            <div class="col-md-6 food">
            
                                    <div class="card">
                                        <img src="<?= base_url('/foto/Chicken Alfredo Pasta.jpg') ?>" class="card-img-top" alt="Drink Image" style="width: 100%; height: 200px; object-fit: cover;">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $item['nama_produk'] ?></h5>
                                            <p class="card-text">Rp. <?= number_format($item['harga'], 0, ',', '.') ?></p>
                                            <a href="#" class="btn btn-primary">Add to Cart</a>
                                        </div>
                                    </div>
                                
                            </div>
                            <div class="col-md-6 food">
                                <div class="card">
                                    <img src="<?= base_url('/foto/Aglio e Olio.jpg') ?>" class="card-img-top" alt="Food Image" style="width: 100%; height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $item['nama_produk'] ?></h5>
                                        <p class="card-text">Rp. <?= number_format($item['harga'], 0, ',', '.') ?></p>
                                        <a href="#" class="btn btn-primary">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card 2 (Tambahkan card lainnya sesuai kebutuhan) -->
                            <div class="col-md-6 drink">
                                <div class="card">
                                    <img src="<?= base_url('/foto/StrawberryMojito.jpg') ?>" class="card-img-top" alt="Drink Image" style="width: 100%; height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $item['nama_produk'] ?></h5>
                                        <p class="card-text">Rp. <?= number_format($item['harga'], 0, ',', '.') ?></p>
                                        <a href="#" class="btn btn-primary">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 food">
                                <div class="card">
                                    <img src="<?= base_url('/foto/BrisketBeef.jpg') ?>" class="card-img-top" alt="Food Image" style="width: 100%; height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $item['nama_produk'] ?></h5>
                                        <p class="card-text">Rp. <?= number_format($item['harga'], 0, ',', '.') ?></p>
                                        <a href="#" class="btn btn-primary">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card 2 (Tambahkan card lainnya sesuai kebutuhan) -->
                            <div class="col-md-6 food">
                                <div class="card">
                                    <img src="<?= base_url('/foto/Lasagna.jpg') ?>" class="card-img-top" alt="Drink Image" style="width: 100%; height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $item['nama_produk'] ?></h5>
                                        <p class="card-text">Rp. <?= number_format($item['harga'], 0, ',', '.') ?></p>
                                        <a href="#" class="btn btn-primary">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian Kanan (Transaksi Kasir) -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><b>Transaction</b></h3>
                </div>
                <div class="card-body">
                    <!-- Tabel Transaksi -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Isi Tabel Transaksi -->
                            <tr>
                                <td>Lasagna</td>
                                <td>Rp. 215.000</td>
                                <td>1</td>
                                <td>Rp. 215.000</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm">+</button>
                                    <button type="button" class="btn btn-primary btn-sm">-</button>
                                    <button type="button" class="btn btn-danger btn-sm">Remove</button>
                                </td>
                            </tr>
                            <!-- Tambahkan baris lainnya sesuai dengan transaksi -->
                        </tbody>
                    </table>

                    <!-- Total Pembayaran -->
                    <div class="text-right">
                        <h6>Total: Rp. 215.000</h6>
                        <h6>Uang: Rp. 300.000</h6>
                        <h6>Kembalian: Rp. 85.000</h6>
                    </div>

                    <!-- Tombol Checkout -->
                    <div class="text-center mt-3">
                        <button type="button" class="btn btn-success">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function showAll() {
        $('.food, .drink').show();
    }

    function showFood() {
        $('.food').show();
        $('.drink').hide();
    }

    function showDrink() {
        $('.food').hide();
        $('.drink').show();
    }
</script>
<?= $this->endSection(); ?>