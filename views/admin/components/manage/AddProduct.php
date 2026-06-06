<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-briefcase"></i>        
            </span>
            Add Product
        </h3>
    </div>
    <div class="row">
        <div class="col-12 col-md-11 col-lg-10 grid-margin">
            <div class="card">
                <div class="card-body">
                    <!-- <h4 class="card-title"></h4> -->
                    <form action="" method="POST" class="forms-sample" enctype="multipart/form-data">
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION["csrf_token"] ?>">
                        <div class="form-group">
                            <label for="#addProductName">Product Name</label>
                            <input type="text" name="name"
                                   class="form-control" id="addProductName" placeholder="Product Name"
                                   value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>"
                            >
                            <small class="text-danger font-weight-bold">
                                <?= $nameErr ? $nameErr : "" ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="#addProductDesc">Product Description</label>
                            <textarea name="description"
                                      class="form-control" placeholder="Product Description" id="addProductDesc" rows="3"
                            ><?= isset($_POST['description']) ? $_POST['description'] : '' ?></textarea>
                            <small class="text-danger font-weight-bold">
                                <?= $descErr ? $descErr : "" ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="#addProductCategory">Category</label>
                            <select name="category" class="form-control" id="addProductCategory">
                                <option value="">Select Category</option>
                                <?php foreach($categories as $category) : ?>
                                    <option value="<?= $category->id ?>">
                                        <?= $category->name ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger font-weight-bold">
                                <?= $cateErr ? $cateErr : "" ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="#addProductPrice">Price</label>
                            <input type="text" name="price"
                                   class="form-control" id="addProductPrice" placeholder="Product Price"
                                   value="<?= isset($_POST['price']) ? $_POST['price'] : '' ?>"
                            >
                            <small class="text-danger font-weight-bold">
                                <?= $priceErr ? $priceErr : "" ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="#addProductQuantity">In Stocks</label>
                            <input type="text" name="quantity"
                                   class="form-control" id="addProductQuantity" placeholder="Product In Stocks"
                                   value="<?= isset($_POST['quantity']) ? $_POST['quantity'] : '' ?>"
                            >
                            <small class="text-danger font-weight-bold">
                                <?= $quantityErr ? $quantityErr : "" ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="#addProductImage">Image</label>
                            <input type="file" name="image"
                                   class="form-control" id="addProductImage" placeholder="Product Image"
                            >
                            <small class="text-danger font-weight-bold">
                                <?= $imageErr ? $imageErr : "" ?>
                            </small>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary mr-2">Add</button>
                        <a href="/admin/products" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>