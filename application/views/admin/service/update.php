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
                                            <h5 class="m-b-10">Service</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="<?= base_url(); ?>serviceadmin/ac_service"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#!">Form </a></li>
                                            <li class="breadcrumb-item"><a href="#!">Update Service</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- [ Form Validation ] start -->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Add Service</h5>
                                    </div>
                                    <div class="card-body">
                                        <form id="validation-form123" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Service Name</label>
                                                        <input type="text" class="form-control" name="service_name" value="<?= $data_service->service_name ?>" placeholder="Service Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Price</label>
                                                        <input type="number" class="form-control" name="price" value="<?= $data_service->price; ?>" placeholder="Price">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Unit</label>
                                                        <select class="form-control" name="unit">
                                                            <?php foreach ($unit as $c) : ?>
                                                                <?php if ($c->unit == $data_service->unit) { ?>
                                                                    <option value="<?= $c->unit; ?>" selected><?= $c->unit; ?></option>
                                                                <?php } else { ?>
                                                                    <option value="<?= $c->unit; ?>"><?= $c->unit; ?></option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
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