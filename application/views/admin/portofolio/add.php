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
                                            <h5 class="m-b-10">Portofolio</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="<?= base_url(); ?>portofolioadmin"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#!">Form </a></li>
                                            <li class="breadcrumb-item"><a href="#!">Add Portofolio</a></li>
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
                                        <h5>Add Portofolio</h5>
                                    </div>
                                    <div class="card-body">
                                        <form id="validation-form123" enctype="multipart/form-data" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Portofolio Name</label>
                                                        <input type="text" class="form-control" name="portofolio_name" placeholder="Portofolio Name">
                                                        <br>
                                                        <label class="form-label">Photo</label>
                                                        <div>
                                                            <input type="file" name="foto" class="validation-file" required>
                                                        </div>
                                                        <small class="form-text text-muted">Best size : 370px . 410px</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Category</label>
                                                        <select class="form-control" name="category">

                                                            <?php 
															foreach ($category as $c) : ?>
                                                                <option value="<?= $c->category; ?>"><?= $c->category; ?></option>
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