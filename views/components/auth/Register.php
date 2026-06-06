<!--================Register Box Area =================-->
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="<?= BASE_URL ?>/views/assets/img/login.jpg" alt="">
                    <div class="hover">
                        <h4>New to our website?</h4>
                        <p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                        <a class="primary-btn" href="/login">Login to account</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Register to enter</h3>
                    <form class="row login_form" action="register" method="post" id="contactForm" novalidate="novalidate">
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                        <p class="card-description text-danger font-weight-bolder">
                            <?php if(isset($errorMsg)) echo $errorMsg ?>
                        </p>
                        <div class="col-md-12 form-group">
                            <input type="text" name="name" 
                                   class="form-control" id="username" placeholder="Username" 
                                   onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'"
                                   value="<?php if(isset($_POST["name"])) echo $_POST["name"] ?>"
                            >
                            <small class="d-block text-danger font-weight-bold text-left">
                                    <?php 
                                        if(isset($nameErr)) {
                                            echo $nameErr;
                                        }
                                    ?>
                            </small>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="email" name="email" 
                                   class="form-control" id="email" placeholder="Email Address" 
                                   onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'"
                                   value="<?php if(isset($_POST["email"])) echo $_POST["email"] ?>"
                            >
                            <small class="d-block text-danger font-weight-bold text-left">
                                    <?php 
                                        if(isset($emailErr)) {
                                            echo $emailErr;
                                        }
                                    ?>
                            </small>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" name="password" 
                                   class="form-control" id="password" placeholder="Password" 
                                   onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'"
                                   value="<?php if(isset($_POST["password"])) echo $_POST["password"] ?>"
                            >
                            <small class="d-block text-danger font-weight-bold text-left">
                                    <?php 
                                        if(isset($passwordErr)) {
                                            echo $passwordErr;
                                        }
                                    ?>
                            </small>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="primary-btn">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Register Box Area =================-->