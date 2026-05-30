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
                                            <h5 class="m-b-10">Portofolio</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="<?= base_url(); ?>portofolioadmin"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#!">Form </a></li>
                                            <li class="breadcrumb-item"><a href="#!">Update Portofolio</a></li>
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
                                        <h5>Add Portofolio</h5>
                                    </div>
                                    <div class="card-body">
                                        <form id="validation-form123" enctype="multipart/form-data" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Portofolio Name</label>
                                                        <input type="text" class="form-control" name="portofolio_name" placeholder="portofolio Name" value="<?= $data_portofolio->portofolio_name; ?>">
                                                        <br>
                                                        <label class="form-label">Photo</label>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <img height="70px" src="<?= base_url(); ?>template/assets_admin/portofolio/<?= base64_decode($data_portofolio->foto) ?>">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="file" name="foto" class="validation-file">
                                                                <small class="form-text text-muted">Best size : 770px . 450px</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Category :</label>
                                                        <select class="form-control" name="category">
                                                            <?php foreach ($category as $c) : ?>
                                                                <?php if ($c->category == $data_portofolio->category) { ?>
                                                                    <option value="<?= $c->category; ?>" selected><?= $c->category; ?></option>
                                                                <?php } else { ?>
                                                                    <option value="<?= $c->category; ?>"><?= $c->category; ?></option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>

                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Foto</label>
                                                        <div>
                                                            <input type="file" name="foto" class="validation-file">
                                                        </div>
                                                    </div>
                                                </div> -->
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