<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account-settings-variant"></i>        
            </span>
            Edit Customer
        </h3>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-11 col-lg-10 grid-margin">
            <div class="card">
                <div class="card-body">
                    <!-- <h4 class="card-title"></h4> -->
                    <form action="" method="POST" class="forms-sample">
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION["csrf_token"] ?>">
                        <div class="form-group">
                            <label for="#editUsername">Username</label>
                            <input type="text" name="name"
                                   class="form-control" id="editUsername" placeholder="Username"
                                   value="<?= $user->name ?>"
                            >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email"
                                   class="form-control" id="exampleInputEmail1" placeholder="Email"
                                   value="<?= $user->email ?>"
                            >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="number" name="phone"
                                   class="form-control" id="exampleInputEmail1" placeholder="Phone"
                                   value="<?= $user->phone ?>"       
                            >
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Address</label>
                            <textarea name="address"
                                      class="form-control" placeholder="Address" id="exampleTextarea1" rows="4"
                            ><?= $user->address ?></textarea>
                        </div>
                        
                        <!-- <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Normal Admin Access
                            </label>
                        </div> -->
                        <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                        <a href="/admin/users-customer" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>