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
            <li class="breadcrumb-item active" aria-current="page">Role 1</li>
        </ol>
    </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Admins Table</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Super User</th>
                                    <th>Created_At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach ($admins as $admin) : ?>
                                    <tr class="text-dark">
                                        <td>
                                            <?= $i ?>
                                        </td>
                                        <td>
                                            <?= $admin->name ?>
                                        </td>
                                        <td> 
                                            <?= $admin->email ?>
                                        </td>
                                        <td>
                                            <?= $admin->phone ? $admin->phone : "Null" ?>
                                        </td>
                                        <td>
                                            <?= $admin->address ? substr($admin->address,0,8) . "..." : "Null" ?>
                                        </td>
                                        <td class="">
                                            <?php 
                                                if($admin->super_user) {
                                                    echo "<i class='text-danger mdi mdi-account-star'></i>";
                                                } else {
                                                    echo "";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?= $admin->created_at ?>
                                        </td>
                                    </tr>
                                <?php $i++; endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>