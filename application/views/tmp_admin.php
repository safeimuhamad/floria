<!DOCTYPE html>
<html lang="en">

<head>

    <title>Floria.id - Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="" />

    <script type="text/javascript" src="<?= base_url(); ?>template/assets_lama/js/ckeditor/ckeditor.js"></script>
    <!-- <script type="text/javascript" src="<?= base_url(); ?>template/assets/js/ckfinder/ckfinder.js"></script>-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <!-- Favicon icon -->
    <link rel="icon" href="<?= base_url(); ?>template/assets_admin/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="<?= base_url(); ?>template/assets_admin/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="<?= base_url(); ?>template/assets_admin/plugins/animation/css/animate.min.css">

    <!-- notification css -->
    <link rel="stylesheet" href="<?= base_url(); ?>template/assets_admin/plugins/notification/css/notification.min.css">

    <!-- data tables css -->
    <link rel="stylesheet" href="<?= base_url(); ?>template/assets_admin/plugins/data-tables/css/datatables.min.css">

    <!-- vendor css -->
    <link rel="stylesheet" href="<?= base_url(); ?>template/assets_admin/css/style.css">

</head>

<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar menupos-fixed ">
        <div class="navbar-wrapper ">
            <div class="navbar-brand header-logo">
                <a href="index.html" class="b-brand">
                    <div class="b-bg">
                        B
                    </div>
                    <span class="b-title">Floria.id</span>
                </a>
                <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigation</label>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>productadmin" class="nav-link">
                            <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                            <span class="pcoded-mtext">Product</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url(); ?>salesquote" class="nav-link">
                            <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                            <span class="pcoded-mtext">Sales Quote</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>blogadmin" class="nav-link">
                            <span class="pcoded-micon"><i class="feather icon-bold"></i></span>
                            <span class="pcoded-mtext">Blog</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>portofolioadmin" class="nav-link">
                            <span class="pcoded-micon"><i class="feather icon-bold"></i></span>
                            <span class="pcoded-mtext">Portofolio</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url(); ?>categoryadmin" class="nav-link">
                            <span class="pcoded-micon"><i class="feather icon-grid"></i></span>
                            <span class="pcoded-mtext">Category</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>contactadmin" class="nav-link">
                            <span class="pcoded-micon"><i class="feather icon-phone"></i></span>
                            <span class="pcoded-mtext">Contact</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed">

        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
            <a href="index.html" class="b-brand">
                <div class="b-bg">
                    M
                </div>
                <span class="b-title">Floria.Id</span>
            </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="#!">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            <a href="#!" class="mob-toggler"></a>
            <ul class="navbar-nav mr-auto">
                <li>
                    <!-- [ breadcrumb ] start -->
                    <div class="page-header">
                    </div>
                    <!-- [ breadcrumb ] end -->
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li><a href="#" onclick="buttonKeluar();" class="displayChatbox"><i
                            class="icon feather icon-log-out"></i></a></li>
            </ul>
        </div>
    </header>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <!--
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('info'); ?>"></div>
    <div class="flash-data-danger" data-flashdata="<?= $this->session->flashdata('danger'); ?>"></div>
     -->
    <?= $contents; ?>

    <!-- Required Js -->
    <script src="<?= base_url(); ?>template/assets_admin/js/vendor-all.min.js"></script>
    <script src="<?= base_url(); ?>template/assets_admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>template/assets_admin/js/pcoded.min.js"></script>

    <!-- am chart js -->
    <script src="<?= base_url(); ?>template/assets_admin/plugins/chart-am4/js/core.js"></script>
    <script src="<?= base_url(); ?>template/assets_admin/plugins/chart-am4/js/charts.js"></script>
    <script src="<?= base_url(); ?>template/assets_admin/plugins/chart-am4/js/animated.js"></script>
    <script src="<?= base_url(); ?>template/assets_admin/plugins/chart-am4/js/maps.js"></script>
    <script src="<?= base_url(); ?>template/assets_admin/plugins/chart-am4/js/worldLow.js"></script>
    <script src="<?= base_url(); ?>template/assets_admin/plugins/chart-am4/js/continentsLow.js"></script>

    <!-- dashboard-custom js -->
    <script src="<?= base_url(); ?>template/assets_admin/js/pages/dashboard-analytics.js"></script>
    <!-- datatable Js -->
    <script src="<?= base_url(); ?>template/assets_admin/plugins/data-tables/js/datatables.min.js"></script>
    <script src="<?= base_url(); ?>template/assets_admin/js/pages/data-basic-custom.js"></script>
    <!-- SweetAlert -->
    <script src="<?= base_url(); ?>template/assets_lama/jss/sweetalert2.all.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            const flashData = $('.flash-data').data('flashdata')
            if (flashData) {
                Swal.fire({
                    title: 'Success',
                    icon: 'success',
                    text: flashData,
                    confirmButtonColor: '#2196f3',
                    //type: 'success'
                })
            }
            const flashData2 = $('.flash-data-danger').data('flashdata')
            if (flashData2) {
                Swal.fire({
                    title: 'Failed',
                    icon: 'error',
                    text: flashData2,
                    confirmButtonColor: '#2196f3',
                    // type: 'success'
                })
            }
        });

        function buttonKeluar(id) {
            Swal.fire({
                title: 'Are you sure want to logout?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = "<?= base_url(); ?>login/logout/";
                }
            })
        }
    </script>

</body>

</html>