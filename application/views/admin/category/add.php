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
                                        <h5>Add Category</h5>
                                    </div>
                                    <div class="card-body">
                                        <form id="validation-form123" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Category Name</label>
                                                        <input type="text" class="form-control" name="category"
                                                            placeholder="Category Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Type</label>
                                                        <select class="form-control" name="type">
                                                            <?php foreach ($data_type as $option): ?>
                                                                <option value="<?= $option->type_name ?>">
                                                                    <?= $option->type_name ?>
                                                                </option>
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