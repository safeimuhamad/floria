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
                                        <h5>Add Contact</h5>
                                    </div>
                                    <div class="card-body">
                                        <form id="validation-form123" enctype="multipart/form-data" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"> Name</label>
                                                        <input type="text" class="form-control" name="name"
                                                            placeholder="Name" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label"> Company</label>
                                                        <input type="text" class="form-control" name="company"
                                                            placeholder="Company Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Phone</label>
                                                        <input type="number" class="form-control" name="phone"
                                                            placeholder="Phone" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" class="form-control" name="email"
                                                            placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Service</label>
                                                        <select class="form-control" name="service">
                                                            <?php foreach ($services as $row): ?>
                                                                <option value="<?= $row->category; ?>"><?= $row->category; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Message</label>
                                                        <textarea class="form-control" rows="4"
                                                            name="message"></textarea>
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