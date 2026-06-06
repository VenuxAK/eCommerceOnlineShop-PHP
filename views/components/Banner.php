<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>
                    <?php
                        if(isLoggedIn())
                        {
                            echo "Welcome" . " " . escape($_SESSION["username"]);
                        } else {
                            echo "Welcome Customer";
                        }
                    ?>
                </h1>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->