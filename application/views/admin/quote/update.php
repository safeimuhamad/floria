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
                                        <h5>Add Sales Quotation</h5>
                                    </div>
                                    <div class="card-body">
                                        <form id="validation-form123" enctype="multipart/form-data" method="post">
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <?php foreach ($items as $item): ?>
                                                            <legend>Customer</legend>
                                                            <div class="form-group">
                                                                <label class="form-label">Customer</label>
                                                                <select class="form-control customer" name="customer"
                                                                    required>
                                                                    <option value="">Select Customer</option>
                                                                    <?php foreach ($customers as $customer): ?>
                                                                        <option value="<?= $customer->id_contact; ?>"
                                                                            <?= ($customer->id_contact == $item->customer) ? 'selected' : ''; ?>>
                                                                            <?= $customer->name; ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">Company</label>
                                                                <input type="text" class="form-control" name="company"
                                                                    placeholder="Company" value="<?= $item->company; ?>"
                                                                    readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">Phone</label>
                                                                <input type="text" class="form-control" name="telp"
                                                                    placeholder="Phone" value="<?= $item->telp; ?>"
                                                                    readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">Email</label>
                                                                <input type="email" class="form-control" name="email"
                                                                    placeholder="Email" value="<?= $item->email; ?>"
                                                                    readonly>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>

                                                    <div class="col-md-9">
                                                        <div class="form-group">
                                                            <legend>Hitung Kebutuhan Bahan & Material</legend>
                                                            <div class="form-row">
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Panjang(cm)</label>
                                                                        <input type="number" class="form-control"
                                                                            value="" name="panjang"
                                                                            placeholder="Panjang" id="panjangInput">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Lebar(cm)</label>
                                                                        <input type="number" class="form-control"
                                                                            value="" name="lebar" placeholder="Lebar"
                                                                            id="lebarInput">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Tinggi Tiang</label>
                                                                        <input type="number" class="form-control"
                                                                            id="tinggiTiang" value="" name="tinggiTiang"
                                                                            placeholder="Tinggi Tiang">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Jumlah Tiang</label>
                                                                        <input type="number" class="form-control"
                                                                            id="jumlahTiang" value="" name="jumlahTiang"
                                                                            placeholder="Jumlah Tiang">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Jarak Antara Reng &
                                                                            Rangka</label>
                                                                        <input type="number" class="form-control"
                                                                            id="inputJarak" value="" name="jarak"
                                                                            placeholder="Jarak">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-row">
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Panjang
                                                                            Atap(cm)</label>
                                                                        <input type="number" class="form-control"
                                                                            id="panjangAtap" value="" name="panjang"
                                                                            placeholder="Panjang">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Lebar Atap(cm)</label>
                                                                        <input type="number" class="form-control"
                                                                            id="lebarAtap" value="" name="lebar"
                                                                            placeholder="Lebar">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Luas :</label>
                                                                        <h3 id="luasResult">0 M²</h3>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <div class="form-group">
                                                                        <label class="form-label">P. Tiang
                                                                            :</label>
                                                                        <h3 id="tiangResult">0 M</h3>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <div class="form-group">
                                                                        <label class="form-label">P. Rangka
                                                                            :</label>
                                                                        <h3 id="rangkaResult">0 M</h3>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <div class="form-group">
                                                                        <label class="form-label">P. Reng
                                                                            :</label>
                                                                        <h3 id="rengResult">0 M</h3>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="form-label">L. Atap
                                                                            :</label>
                                                                        <h3 id="atapResult">0 M²</h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <legend>Product</legend>
                                                            <div class="form-row-product">
                                                                <?php foreach ($item_detail_product as $item): ?>
                                                                    <!-- Input Product, UOM, dan Price -->
                                                                    <div class="form-row">
                                                                        <div class="col-md-5">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Product</label>
                                                                                <select class="form-control product"
                                                                                    name="selected_product[]" required>
                                                                                    <option value="">Select Product</option>
                                                                                    <?php foreach ($products as $product): ?>
                                                                                        <option
                                                                                            value='<?= $product->id_product; ?>'
                                                                                            <?= ($product->id_product == $item->product_id) ? 'selected' : ''; ?>>
                                                                                            <?= $product->product_name; ?>
                                                                                        </option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Qty</label>
                                                                                <input type="number" class="form-control"
                                                                                    data-type="qty"
                                                                                    value="<?= $item->qty; ?>"
                                                                                    name="qty_product[]" placeholder="Qty">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <div class="form-group">
                                                                                <label class="form-label">UOM</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="uom_product[]"
                                                                                    value="<?= $item->unit; ?>"
                                                                                    placeholder="UOM" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Price</label>
                                                                                <input type="text" class="form-control"
                                                                                    data-type="price" name="price_product[]"
                                                                                    value="<?= $item->price_unit; ?>"
                                                                                    placeholder="Price">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Total</label>
                                                                                <input type="text" class="form-control"
                                                                                    data-type="price_total"
                                                                                    name="price_product_total[]"
                                                                                    value="<?= $item->price_unit * $item->qty; ?>"
                                                                                    placeholder="Total" readonly>
                                                                                <input type="hidden" class="form-control"
                                                                                    name="hidden_price_product_total[]">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Action</label>
                                                                                <!-- Tombol Add -->
                                                                                <button type="button"
                                                                                    class="btn btn-success add-product"><i
                                                                                        class="fas fa-plus"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            </div>

                                                            <div class="additional-product">
                                                                <!-- Dropdown product tambahan akan ditambahkan di sini secara otomatis -->
                                                            </div>
                                                            <legend>Material Support</legend>
                                                            <div class="form-row-material">
                                                                <?php foreach ($item_detail_material as $item): ?>
                                                                    <!-- Input Material Support, UOM, dan Price -->
                                                                    <div class="form-row">
                                                                        <div class="col-md-5">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Material
                                                                                    Support</label>
                                                                                <select class="form-control material"
                                                                                    name="select_material[]" required>
                                                                                    <option value="">Select Material
                                                                                    </option>
                                                                                    <?php foreach ($materials as $material): ?>
                                                                                        <option
                                                                                            value="<?= $material->id_product; ?>"
                                                                                            <?= ($material->id_product == $item->product_id) ? 'selected' : ''; ?>>
                                                                                            <?= $material->product_name; ?>
                                                                                        </option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Qty</label>
                                                                                <input type="number" class="form-control"
                                                                                    data-type="qty" name="qty_material[]"
                                                                                    value="<?= $item->qty; ?>"
                                                                                    placeholder="Qty">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <div class="form-group">
                                                                                <label class="form-label">UOM</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="uom_material[]"
                                                                                    value="<?= $item->unit; ?>"
                                                                                    placeholder="UOM" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Price</label>
                                                                                <input type="text" class="form-control"
                                                                                    value="<?= $item->price_unit; ?>"
                                                                                    data-type="price"
                                                                                    name="price_material[]"
                                                                                    placeholder="Price">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Total</label>
                                                                                <input type="text" class="form-control"
                                                                                    data-type="price_total"
                                                                                    name="price_material_total[]"
                                                                                    value="<?= $item->price_unit * $item->qty; ?>"
                                                                                    placeholder="Total" readonly>
                                                                                <input type="hidden"
                                                                                    name="hidden_price_material_total[]">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Action</label>
                                                                                <!-- Tombol Add -->
                                                                                <button type="button"
                                                                                    class="btn btn-success add-material"><i
                                                                                        class="fas fa-plus"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            </div>

                                                            <div class="additional-material">
                                                                <!-- Dropdown material tambahan akan ditambahkan di sini secara otomatis -->
                                                            </div>
                                                            <legend>Service</legend>
                                                            <div class="form-row-service">
                                                                <?php foreach ($item_detail_service as $item): ?>
                                                                    <!-- Input Service, UOM, dan Price -->
                                                                    <div class="form-row">
                                                                        <div class="col-md-5">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Service</label>
                                                                                <select class="form-control service"
                                                                                    name="select_service[]" required>
                                                                                    <option value="">Select Service</option>
                                                                                    <?php foreach ($services as $service): ?>
                                                                                        <option
                                                                                            value="<?= $service->id_product; ?>"
                                                                                            <?= ($service->id_product == $item->product_id) ? 'selected' : ''; ?>>
                                                                                            <?= $service->product_name; ?>
                                                                                        </option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Qty</label>
                                                                                <input type="number" class="form-control"
                                                                                    value="<?= $item->qty; ?>"
                                                                                    data-type="qty" name="qty_service[]"
                                                                                    placeholder="Qty">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <div class="form-group">
                                                                                <label class="form-label">UOM</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="uom_service[]"
                                                                                    value="<?= $item->unit; ?>"
                                                                                    placeholder="UOM" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Price</label>
                                                                                <input type="text" class="form-control"
                                                                                    data-type="price" name="price_service[]"
                                                                                    value="<?= $item->price_unit; ?>"
                                                                                    placeholder="Price">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Total</label>
                                                                                <input type="text" class="form-control"
                                                                                    data-type="price_total"
                                                                                    name="price_total[]"
                                                                                    value="<?= $item->price_unit * $item->qty; ?>"
                                                                                    placeholder="Total" readonly>
                                                                                <input type="hidden"
                                                                                    name="hidden_price_service_total[]">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <div class="form-group">
                                                                                <label class="form-label">Action</label>
                                                                                <!-- Tombol Add -->
                                                                                <button type="button"
                                                                                    class="btn btn-success add-service"><i
                                                                                        class="fas fa-plus"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            </div>

                                                            <div class="additional-services">
                                                                <!-- Dropdown service tambahan akan ditambahkan di sini secara otomatis -->
                                                            </div>
                                                            <div class="form-row-footer">
                                                                <div class="form-row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Note</label>
                                                                            <?php foreach ($items as $item): ?>
                                                                                <textarea class="form-control" rows="4"
                                                                                    name="note"><?= $item->note; ?></textarea>
                                                                            <?php endforeach; ?>
                                                                        </div>


                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label class="form-label"></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <h3>Subtotal: <span id="subtotal">0</span>
                                                                            </h3>
                                                                            <input type="hidden" name="subtotal"
                                                                                id="hiddenSubtotal" value="">
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </fieldset>
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

<!--<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script> -->
<script src="<?= base_url(); ?>template/assets/js/formatRupiah.js"></script>

<script>
    jQuery(document).ready(function ($) {
        // Event change pada dropdown pelanggan, produk, material, dan layanan
        $('.form-control.customer').on('change', function () {
            var selectedValue = $(this).val();
            var selectedInfo = <?= json_encode($customers); ?>;
            var fields = ['company', 'telp', 'email'];

            var info = selectedInfo.find(item => item.id_contact == selectedValue);

            fields.forEach(field => {
                var value = info ? info[field] : '';
                $('input[name="' + field + '"]').val(value);
            });
        });

        $('.form-control.product').on('change', function () {
            var selectedValue = $(this).val();
            var selectedInfo = <?= json_encode($products); ?>;
            var fields = ['unit', 'sell_price'];

            var info = selectedInfo.find(item => item.id_product == selectedValue);

            fields.forEach(field => {
                var inputName = field === 'sell_price' ? 'price_product' : field;
                var value = info ? info[field] : '';

                if (field === 'unit') {
                    $(this).closest('.form-row').find('input[name="uom_product[]"]').val(value);
                } else if (field === 'sell_price') {
                    $(this).closest('.form-row').find('input[name="price_product[]"]').val(value);
                }
                updateCalculations(); // Panggil fungsi updateCalculations() di sini jika diperlukan
            });
        });

        $('.form-control.material').on('change', function () {
            var selectedValue = $(this).val();
            var selectedInfo = <?= json_encode($materials); ?>;
            var fields = ['unit', 'sell_price'];

            var info = selectedInfo.find(item => item.id_product == selectedValue);

            fields.forEach(field => {
                var inputName = field === 'sell_price' ? 'price_product' : field;
                var value = info ? info[field] : '';

                if (field === 'unit') {
                    $(this).closest('.form-row').find('input[name="uom_material[]"]').val(value);
                } else if (field === 'sell_price') {
                    $(this).closest('.form-row').find('input[name="price_material[]"]').val(value);
                }
                updateCalculations(); // Panggil fungsi updateCalculations() di sini jika diperlukan
            });
        });

        $('.form-control.service').on('change', function () {
            var selectedValue = $(this).val();
            var selectedInfo = <?= json_encode($services); ?>;
            var fields = ['unit', 'sell_price'];

            var info = selectedInfo.find(item => item.id_product == selectedValue);

            fields.forEach(field => {
                var inputName = field === 'sell_price' ? 'price_product' : field;
                var value = info ? info[field] : '';

                if (field === 'unit') {
                    $(this).closest('.form-row').find('input[name="uom_service[]"]').val(value);
                } else if (field === 'sell_price') {
                    $(this).closest('.form-row').find('input[name="price_service[]"]').val(value);
                }
                updateCalculations(); // Panggil fungsi updateCalculations() di sini jika diperlukan
            });
        });

        function getInputValue(inputId) {
            return parseFloat(document.getElementById(inputId).value) || 0;
        }

        function hitungLuas() {
            return (getInputValue("panjangInput") * getInputValue("lebarInput")) / 10000;
        }

        function hitungTiang() {
            return getInputValue("tinggiTiang") * getInputValue("jumlahTiang");
        }

        function hitungRangka() {
            return (getInputValue("panjangInput") / getInputValue("inputJarak")) * 6;
        }

        function hitungReng() {
            return (getInputValue("lebarInput") / getInputValue("inputJarak")) * 6;
        }

        function hitungAtap() {
            return (getInputValue("panjangInput") / getInputValue("panjangAtap")) *
                (getInputValue("lebarInput") / getInputValue("lebarAtap")) *
                (getInputValue("panjangAtap") / 100);
        }

        function updateResults() {
            document.getElementById("luasResult").innerHTML = (hitungLuas() || 0) + " M²";
            document.getElementById("tiangResult").innerHTML = (hitungTiang() || 0) + " M";
            document.getElementById("rangkaResult").innerHTML = (hitungRangka() || 0) + " M";
            document.getElementById("rengResult").innerHTML = (hitungReng() || 0) + " M";
            document.getElementById("atapResult").innerHTML = (hitungAtap() || 0) + " M";
        }


        // Menyederhanakan event listener untuk semua input
        var inputListeners = ["panjangInput", "lebarInput", "tinggiTiang", "jumlahTiang", "inputJarak", "panjangAtap", "lebarAtap"];
        inputListeners.forEach(function (inputId) {
            document.getElementById(inputId).addEventListener("input", updateResults);
        });

        // Inisialisasi hasil saat halaman dimuat
        updateResults();


        // Fungsi untuk menambahkan entitas baru (service, product, material)
        function tambahEntitasTambahan(formClass, appendClass, namePrefix) {
            var klonForm = $(`${formClass}:first`).clone();

            // Mengosongkan nilai pada input yang sesuai
            klonForm.find(`[data-type^="${namePrefix}"]`).val('');
            klonForm.find('[data-type="price"]').val('');

            // Ubah tombol "Add" menjadi tombol "Hapus"
            klonForm.find(`.add-${namePrefix}`)
                .removeClass('btn-success')
                .addClass('btn-danger')
                .html('<i class="fas fa-trash"></i>')
                .click(function () {
                    $(this).closest('.form-row').remove();
                    updateCalculations();
                });

            $(appendClass).append(klonForm);

            // Mengikat fungsi perubahan nilai ke elemen dropdown yang baru
            klonForm.find('.product').on('change', function () {
                var selectedValue = $(this).val();
                var selectedInfo = <?= json_encode($products); ?>;
                var fields = ['unit', 'sell_price'];

                var info = selectedInfo.find(item => item.id_product == selectedValue);

                fields.forEach(field => {
                    var inputName = field === 'sell_price' ? 'price_product' : field;
                    var value = info ? info[field] : '';

                    var formRow = $(this).closest(formClass);
                    formRow.find(`input[name="${inputName}[]"]`).val(value);
                    if (field === 'unit') {
                        formRow.find(`input[name="uom_product[]"]`).val(value);
                    }
                });

                updateCalculations();
            });

            // Mengikat fungsi perubahan nilai ke elemen dropdown yang baru
            klonForm.find('.material').on('change', function () {
                var selectedValue = $(this).val();
                var selectedInfo = <?= json_encode($materials); ?>;
                var fields = ['unit', 'sell_price'];

                var info = selectedInfo.find(item => item.id_product == selectedValue);

                fields.forEach(field => {
                    var inputName = field === 'sell_price' ? 'price_material' : field;
                    var value = info ? info[field] : '';

                    var formRow = $(this).closest(formClass);
                    formRow.find(`input[name="${inputName}[]"]`).val(value);
                    if (field === 'unit') {
                        formRow.find(`input[name="uom_material[]"]`).val(value);
                    }
                });

                updateCalculations();
            });

            klonForm.find('.service').on('change', function () {
                var selectedValue = $(this).val();
                var selectedInfo = <?= json_encode($services); ?>;
                var fields = ['unit', 'sell_price'];

                var info = selectedInfo.find(item => item.id_product == selectedValue);

                fields.forEach(field => {
                    var inputName = field === 'sell_price' ? 'price_service' : field;
                    var value = info ? info[field] : '';

                    var formRow = $(this).closest(formClass);
                    formRow.find(`input[name="${inputName}[]"]`).val(value);

                    if (field === 'unit') {
                        formRow.find(`input[name="uom_service[]"]`).val(value);
                    }
                });

                updateCalculations();
            });


        }


        // Fungsi untuk mengupdate perhitungan
        function updateCalculations() {
            $('.form-row').each(function () {
                var qty = parseFloat($(this).find('[data-type^="qty"]').val()) || 0;
                var price = parseFloat($(this).find('[data-type^="price"]').val()) || 0;
                var total = qty * price;
                $(this).find('[data-type^="price_total"]').val(total);
                $(this).find('[name="hidden_price_product_total[]"]').val(total);
                $(this).find('[name="hidden_price_material_total[]"]').val(total);
                $(this).find('[name="hidden_price_service_total[]"]').val(total);
            });

            updateSubtotal();
        }


        // Fungsi untuk mengupdate subtotal
        function updateSubtotal() {
            var sub_total = 0;

            // Loop melalui setiap elemen dengan class yang sesuai dan hitung total
            $('.form-row [data-type^="price_total"]').each(function () {
                var price_total = parseFloat($(this).val()) || 0;
                sub_total += price_total;
                if ($(this).attr('data-type') === 'price_total') {
                    // Ubah format Rupiah untuk price_total
                    $(this).val(formatRupiah(price_total));
                    $('input[name="price_total"]').val(price_total);
                }

            });

            // Panggil fungsi formatRupiah untuk mengubah angka menjadi format Rupiah
            var formattedSubtotal = formatRupiah(sub_total);
            $('#subtotal').text(formattedSubtotal);
            $('input[name="subtotal"]').val(sub_total);
        }


        // Fungsi untuk menambahkan entitas (service, product, material)
        function tambahEntitas(formClass, appendClass, namePrefix) {
            $('.add-' + namePrefix).on('click', function () {
                tambahEntitasTambahan(formClass, appendClass, namePrefix);
            });
        }

        // Panggil fungsi tambahEntitas untuk setiap jenis entitas
        tambahEntitas('.form-row-service', '.additional-services', 'service');
        tambahEntitas('.form-row-product', '.additional-product', 'product');
        tambahEntitas('.form-row-material', '.additional-material', 'material');

        // Panggil fungsi updateCalculations saat terjadi perubahan pada input atau tombol tambah/hapus
        $('.form-row input[data-type^="qty"], .form-row input[data-type^="price"], .add-product, .add-service, .add-material').on('input click', function () {
            updateCalculations();
        });

        // Event listener untuk input qty dan price pada elemen baru
        $('.additional-services, .additional-product, .additional-material').on('input', '[data-type="qty"], [data-type="price"]', function () {
            updateCalculations(); // Panggil fungsi updateCalculations() saat terjadi perubahan pada input qty atau price pada elemen baru
        });


    });
</script>