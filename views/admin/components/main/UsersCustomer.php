<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account"></i>                 
            </span>
            Users
        </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <!-- <li class="breadcrumb-item"><a href="#">Users Tables</a></li> -->
        <li class="breadcrumb-item active" aria-current="page">Role 0</li>
        </ol>
    </nav>
    <!-- <a href="/admin/users-customer" class="btn btn-danger" onclick="return confirm('Are you Want to loaded')">Test</a> -->
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card"> 
                <div class="card-body">
                    <h4 class="card-title">Customers Table</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Created_At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach ($customers as $customer) : ?>
                                    <tr class="text-dark">
                                        <td>
                                            <?= $i ?>
                                        </td>
                                        <td>
                                            <?= escape($customer->name) ?>
                                        </td>
                                        <td> 
                                            <?= escape($customer->email) ?>
                                        </td>
                                        <td>
                                            <?= escape($customer->phone ? $customer->phone : "Null") ?>
                                        </td>
                                        <td>
                                            <?= escape($customer->address ? substr($customer->address,0,8) . "..." : "Null") ?>
                                        </td>
                                        <td>
                                            <?= escape($customer->created_at) ?>
                                        </td>
                                        <td>
                                            <!-- <form action="/admin/users-customer" method="GET"> -->
                                                <a href="/admin/users-customer/edit?id=<?= $customer->id ?>" class="text-light">
                                                    <button class="btn-icon btn btn-warning btn-rounded d-inline">
                                                        <i class="mdi mdi-pen"></i>
                                                    </button>
                                                </a>
                                                <!-- </form> -->
                                            <form action="/admin/users-customer" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                                <input type="hidden" name="csrf_token" value="<?= $_SESSION["csrf_token"] ?>">
                                                <input type="hidden" name="id" value="<?= $customer->id ?>">
                                                <a href="/admin/users-customer?id=<?= $customer->id ?>" class="text-light">
                                                    <button type="submit" class="btn-icon btn btn-danger btn-rounded">
                                                        <i class="mdi mdi-delete-forever"></i>
                                                    </button>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                <?php $i++; endforeach ?>
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