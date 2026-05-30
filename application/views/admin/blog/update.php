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
                                        <h5>Add Blog</h5>
                                    </div>
                                    <div class="card-body">
                                        <form id="validation-form123" enctype="multipart/form-data" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Title</label>
                                                        <input type="text" class="form-control" name="title" placeholder="Title" value="<?= $data_blog->title; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Date</label>
                                                        <input type="date" class="form-control date" name="date" placeholder="Date" value="<?= $data_blog->date; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Content</label>
														<?php
														echo $this->ckeditor->editor("content", $data_blog->content ); 
														?>
														<!--
                                                        <textarea class="form-control" name="content"><?= $data_blog->content; ?></textarea>

-->
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Slug</label>
                                                        <input type="text" class="form-control" name="slug" value="<?= $data_blog->slug; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Foto</label>
                                                        <div>
                                                            <input type="file" name="foto" class="validation-file">
                                                        </div>
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