<section class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ breadcrumb ] start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Product</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.html"><i
                                                        class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#!">Form </a></li>
                                            <li class="breadcrumb-item"><a href="#!">Add Product</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ breadcrumb ] end -->
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
                                                            placeholder="Product Name"
                                                            value="<?= $data_product->product_name; ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="form-label">Type</label>
                                                        <select class="form-control" name="type">
                                                            <?php foreach ($type as $c): ?>
                                                                <?php if ($c->type_name == $data_product->type) { ?>
                                                                    <option value="<?= $c->type_name; ?>" selected><?= $c->type_name; ?></option>
                                                                <?php } else { ?>
                                                                    <option value="<?= $c->type_name; ?>"><?= $c->type_name; ?>
                                                                    </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="form-label">Category</label>
                                                        <select class="form-control" name="category">
                                                            <?php foreach ($category as $c): ?>
                                                                <?php if ($c->category == $data_product->category) { ?>
                                                                    <option value="<?= $c->category; ?>" selected><?= $c->category; ?></option>
                                                                <?php } else { ?>
                                                                    <option value="<?= $c->category; ?>"><?= $c->category; ?>
                                                                    </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="form-label">UOM</label>
                                                        <select class="form-control" name="uom">
                                                            <?php foreach ($uom as $c): ?>
                                                                <?php if ($c->unit == $data_product->unit) { ?>
                                                                    <option value="<?= $c->unit; ?>" selected><?= $c->unit; ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option value="<?= $c->unit; ?>"><?= $c->unit; ?>
                                                                    </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Buy Price</label>
                                                        <input type="text" class="form-control" name="buy_price"
                                                            placeholder="Buy Price"
                                                            value="<?= $data_product->buy_price; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Sell Price</label>
                                                        <input type="text" class="form-control" name="sell_price"
                                                            placeholder="Sell Price"
                                                            value="<?= $data_product->sell_price; ?>">
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
                                                        echo $this->ckeditor->editor("content", $data_product->description);
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success">Update</button>
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