<section class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <!-- [ Form Validation ] start -->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Add Product</h5>
                                    </div>
                                    <div class="card-body">
                                        <form id="validation-form123" enctype="multipart/form-data" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Product Name</label>
                                                        <input type="text" class="form-control" name="product_name"
                                                            placeholder="Product Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Type</label>
                                                        <select class="form-control" name="type">
                                                            <?php foreach ($type as $c): ?>
                                                                <option value="<?= $c->type_name; ?>"><?= $c->type_name; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Category</label>
                                                        <select class="form-control" name="category">
                                                            <?php foreach ($category as $c): ?>
                                                                <option value="<?= $c->category; ?>"><?= $c->category; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">UOM</label>
                                                        <select class="form-control" name="uom">
                                                            <?php foreach ($uom as $c): ?>
                                                                <option value="<?= $c->unit; ?>"><?= $c->unit; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Buy Price</label>
                                                        <input type="text" class="form-control" name="buy_price"
                                                            placeholder="Buy Price">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Sell Price</label>
                                                        <input type="text" class="form-control" name="sell_price"
                                                            placeholder="Sell Price">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Foto</label>
                                                        <div>
                                                            <input type="file" name="foto" class="validation-file">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Description</label>
                                                        <?php
                                                        echo $this->ckeditor->editor("content", " ");
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Form Validation ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Sisipkan file JavaScript -->
<script src="<?= base_url(); ?>template/assets/js/formatRupiah.js"></script>

<!-- Sisipkan kode JavaScript untuk implementasi di halaman -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Ambil elemen input buy_price dan sell_price
        var buyPriceInput = document.querySelector('input[name="buy_price"]');
        var sellPriceInput = document.querySelector('input[name="sell_price"]');

        // Tambahkan event listener pada input buy_price dan sell_price
        buyPriceInput.addEventListener("input", function (event) {
            var value = event.target.value;
            var cleanValue = removeNonNumeric(value);
            event.target.value = formatRupiah(cleanValue);
        });

        sellPriceInput.addEventListener("input", function (event) {
            var value = event.target.value;
            var cleanValue = removeNonNumeric(value);
            event.target.value = formatRupiah(cleanValue);
        });

        // Tambahkan event listener pada saat form disubmit
        var form = document.getElementById("validation-form123");
        form.addEventListener("submit", function (event) {
            var buyPriceInput = document.querySelector('input[name="buy_price"]');
            var sellPriceInput = document.querySelector('input[name="sell_price"]');
            var buyPriceValue = buyPriceInput.value;
            var sellPriceValue = sellPriceInput.value;

            // Hapus format Rupiah dari nilai input
            buyPriceInput.value = removeNonNumeric(buyPriceValue);
            sellPriceInput.value = removeNonNumeric(sellPriceValue);
        });
    });
</script>