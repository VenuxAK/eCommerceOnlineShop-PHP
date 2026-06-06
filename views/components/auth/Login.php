<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="<?= BASE_URL ?>/views/assets/img/login.jpg" alt="">
                    <div class="hover">
                        <h4>New to our website?</h4>
                        <p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                        <a class="primary-btn" href="/register">Create an Account</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Log in to enter</h3>
                    <form class="row login_form" action="/login" method="post" id="contactForm" novalidate="novalidate">
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                        <p class="card-description text-danger font-weight-bolder">
                            <?php if(isset($errorMsg)) echo $errorMsg ?>
                        </p>
                        <div class="col-md-12 form-group">
                            <input type="text" name="email"
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
                            <div class="creat_account">
                                <input type="checkbox" id="f-option2" name="selector">
                                <label for="f-option2">Keep me logged in</label>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="primary-btn">Log In</button>
                            <a href="#">Forgot Password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->