<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-format-list-bulleted"></i>                 
            </span>
            Categories
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
        <a href="/admin/categories/add" class="btn btn-sm btn-primary">Add Category</a>
    </div>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Categories Listing Table</h4>
                    <!-- <p class="card-description">
                        Add class <code>.table-hover</code>
                    </p> -->
                    <div class="responsive-table">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach ($categories as $category) : ?>
                                    <tr class="text-dark">
                                        <td><?= $i ?></td>
                                        <td><?= $category->name ?></td>
                                        <td class="text-danger"><?= $category->description ?></td>
                                        <td><?= $category->created_at ?></td>
                                        <td>
                                            <form action="" class="d-inline">
                                                <button type="submit" class="btn btn-sm btn-success">
                                                    Edit
                                                </button>
                                            </form>
                                            <form action="" method="POST" class="d-inline">
                                                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                                                <input type="hidden" name="id" value="<?= $category->id ?>">
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php $i++;endforeach ?>
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