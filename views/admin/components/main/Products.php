<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-briefcase"></i>                 
            </span>
            Products
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Overview
                <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
            </ul>
        </nav>
    </div>
    <div class="my-4">
        <a href="/admin/products/add" class="btn btn-sm btn-primary">Add Product</a>
    </div>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Products Listing Table</h4>
                    <!-- <p class="card-description">
                        Add class <code>.table-hover</code>
                    </p> -->
                    <div class="responsive-table">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>In Stocks</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <!-- <th></th> -->
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody class="text-dark">
                                <?php $i = 1; foreach ($products as $product) : ?>
                                    <?php $category = App::get("db")->query("SELECT * FROM categories WHERE id=$product->category_id")->getOne(); ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= escape($product->name) ?></td>
                                        <td><?= escape(substr($product->description, 0, 8)) . "..." ?></td>
                                        <td><?= escape($category->name) ?></td>
                                        <td><?= escape($product->price) ?></td>
                                        <td><?= escape($product->quantity) ?></td>
                                        <td>
                                            <img src="<?= BASE_URL ?>/views/uploads/images/<?= $product->images ?>" alt="">
                                        </td>
                                        <td><?= escape($product->created_at) ?></td>
                                        <td>
                                            <button class="btn btn-xs btn-success">Edit</button>
                                            <form action="" method="POST" class="d-inline">
                                                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                                                <input type="hidden" name="id" value="<?= $product->id ?>">
                                                <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure want to delete?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php $i++; endforeach; ?>
                            </tbody>
                        </table>
                        <nav aria-label="Customers Page Navigation">
                            <ul class="pagination justify-content-end mt-4">
                                <li class="page-item disabled">
                                    <a class="page-link">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li> 
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>