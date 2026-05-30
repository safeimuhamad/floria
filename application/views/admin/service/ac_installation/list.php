<section class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">AC Installation</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="<?= base_url(); ?>serviceadmin/ac_installation"><i class="feather icon-home"></i></a></li>
                                            <!-- <li class="breadcrumb-item"><a href="#!">Form </a></li> -->
                                            <li class="breadcrumb-item"><a href="#!">List AC Installation</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Zero config table start -->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="w-100 d-flex justify-content-between align-items-center">
                                            <h5>AC Installation</h5>
                                            <a href="<?= base_url(); ?>serviceadmin/add/ins" class="btn btn-primary">Add Service</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="dt-responsive table-responsive">
                                            <table id="table_service" class="table table-striped table-bordered nowrap" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Service</th>
                                                        <th>Unit</th>
                                                        <th>Unit</th>
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
<!-- SweetAlert -->
<script src="<?= base_url(); ?>template/assets_lama/jss/sweetalert2.all.min.js"></script>

<script>
    $(document).ready(function() {
        list_blog();
    });

    function list_blog(keyword, length) {
        $('#table_service').DataTable().destroy();
        $('#table_service').DataTable({
            "paging": true,
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
                "url": "<?php echo site_url('serviceadmin/ins_list'); ?>",
                "type": "POST",
                "data": {
                    "keyword": keyword,
                    "length": length,
                },
                "error": function(request) {
                    Swal.fire({
                        title: "Terjadi kesalahan! Coba reload halaman :')",
                        icon: "error"
                    });
                    console.log(request.responseText);
                }
            },
        });
        var rel = setInterval(function() {
            $('#table_service').DataTable().ajax.reload();
            clearInterval(rel);
        }, 100);
        // console.log('tes');
    }

    function buttonDelete(type, id) {
        console.log('type');
        Swal.fire({
            title: 'Are you sure want to delete this data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = "<?= base_url(); ?>serviceadmin/delete_service/" + type + "/" + id;
            }
        })
    }
</script>