<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-format-list-bulleted"></i>        
            </span>
            Add Category
        </h3>
    </div>
    <div class="row">
        <div class="col-12 col-md-11 col-lg-10 grid-margin">
            <div class="card">
                <div class="card-body">
                    <!-- <h4 class="card-title"></h4> -->
                    <form action="" method="POST" class="forms-sample">
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION["csrf_token"] ?>">
                        <div class="form-group">
                            <label for="#addCategoryName">Name</label>
                            <input type="text" name="name"
                                   class="form-control" id="addCategoryName" placeholder="Name"
                                   value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>"
                            >
                            <small class="text-danger font-weight-bold">
                                <?= $nameErr ? $nameErr : "" ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="#addCategoryDesc">Description</label>
                            <textarea name="description"
                                      class="form-control" placeholder="Description" id="addCategoryDesc" rows="3"
                            ><?= isset($_POST['description']) ? $_POST['description'] : '' ?></textarea>
                            <small class="text-danger font-weight-bold">
                                <?= $descErr ? $descErr : "" ?>
                            </small>
                        </div>
                        
                        <button type="submit" class="btn btn-gradient-primary mr-2">Add</button>
                        <a href="/admin/categories" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>