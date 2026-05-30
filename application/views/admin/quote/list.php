<section class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <!-- Zero config table start -->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="w-100 d-flex justify-content-between align-items-center">
                                            <h5>Product</h5>
                                            <a href="<?= base_url(); ?>salesquote/add" class="btn btn-primary">Add
                                                Sales Quotation</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="dt-responsive table-responsive">
                                            <table id="table_quotation"
                                                class="table table-striped table-bordered nowrap" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Date</th>
                                                        <th>No Ref</th>
                                                        <th>Customer</th>
                                                        <th>Total</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Required Js -->
<script src="<?= base_url(); ?>template/assets_admin/js/vendor-all.min.js"></script>
<script src="<?= base_url(); ?>template/assets_admin/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>template/assets_admin/js/pcoded.min.js"></script>
<!-- datatable Js -->
<script src="<?= base_url(); ?>template/assets_admin/plugins/data-tables/js/datatables.min.js"></script>
<script src="<?= base_url(); ?>template/assets_admin/js/pages/data-basic-custom.js"></script>
<!-- SweetAlert -->
<script src="<?= base_url(); ?>template/assets_lama/jss/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>template/assets_lama/js/formatRupiah.js"></script>
<script>
    $(document).ready(function () {
        list_quotation();
    });

    function list_quotation(keyword, length) {
        $('#table_quotation').DataTable().destroy();
        $('#table_quotation').DataTable({
            "paging": true, // Aktifkan paging
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]], // Atur jumlah data per halaman
            "pageLength": 10, // Jumlah data per halaman default
            "scrollY": true,
            "scrollX": true,
            "searching": true,
            "select": false,
            "bLengthChange": true,
            "scrollCollapse": true,
            "bPaginate": true,
            "bInfo": true,
            "bSort": false,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?php echo site_url('salesquote/list'); ?>",
                "type": "POST",
                "data": {
                    "keyword": keyword,
                    "length": length,
                },
                "dataSrc": function (data) {
                    for (var i = 0; i < data.data.length; i++) {
                        // Ubah format rupiah pada kolom "Total"
                        data.data[i][4] = formatRupiah(data.data[i][4]);
                    }
                    return data.data;
                },
                "error": function (request) {
                    Swal.fire({
                        title: "Terjadi kesalahan! Coba reload halaman :')",
                        icon: "error"
                    });
                    console.log(request.responseText);
                }
            },
            "columns": [
                // ... (kolom lainnya)
                null,  // Kolom "No" (tidak ada perubahan)
                null,  // Kolom "Date" (tidak ada perubahan)
                null,  // Kolom "No Ref" (tidak ada perubahan)
                null,  // Kolom "Customer" (tidak ada perubahan)
                {
                    "data": 4, // Index kolom "Total"
                    "className": "text-right" // Tambahkan perataan teks ke kanan
                },
                null,  // Kolom "Status" (tidak ada perubahan)
                null   // Kolom "Action" (tidak ada perubahan)
            ],
        });
        var rel = setInterval(function () {
            $('#table_quotation').DataTable().ajax.reload();
            clearInterval(rel);
        }, 100);
        // console.log('tes');
    }

    function buttonDelete(baseUrl, id) {
        console.log('delete');
        Swal.fire({
            title: 'Are you sure want to delete this data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = baseUrl + 'salesquote/delete/' + id;
            }
        })
    }




</script>