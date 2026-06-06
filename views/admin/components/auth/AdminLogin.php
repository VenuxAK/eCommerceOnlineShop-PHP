<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
            <div class="col-lg-5 col-md-6 col-sm-8 col-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="brand-logo">
                            <img src="<?= BASE_URL ?>/views/admin/assets/images/logo.svg">
                        </div>
                        <p class="card-description">
                            Sign in to containue
                        </p>
                        <p class="card-description text-danger font-weight-bolder">
                            <?php if(isset($errorMsg)) echo $errorMsg ?>
                        </p>
                        <form action="/admin/login" method="POST" class="forms-sample">
                            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                            <div class="form-group">
                                <label for="#adminLoginEmail">Email address</label>
                                <input type="email" name="email"
                                       class="form-control" id="adminLoginEmail" placeholder="Email"
                                       value="<?php if(isset($_POST['email']))  echo $_POST['email'] ?>"
                                >
                                <small class="d-block text-danger font-weight-bold">
                                    <?php 
                                        if(isset($emailErr)) {
                                            echo $emailErr;
                                        }
                                    ?>
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="#adminLoginPassword">Password</label>
                                <input type="password" name="password"
                                class="form-control" id="adminLoginPassword" placeholder="Password"
                                value="<?php if(isset($_POST['password']))  echo $_POST['password'] ?>"
                                >
                                <small class="d-block text-danger font-weight-bold">
                                    <?php 
                                        if(isset($passwordErr)) {
                                            echo $passwordErr;
                                        }
                                    ?>
                                </small>
                            </div>
                            <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Remember me
                            </label>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>