<?php include "views/components/PaginateHomeProducts.php" ?>
<!-- Start Best Seller -->
<section class="lattest-product-area pb-40 category-list">
    <div class="row">
        <?php $i = 1; foreach($products as $product) : ?>
        <!-- single product -->
        <div class="col-lg-4 col-md-6">
            <div class="single-product">
                <a href="products/product-detail?id=<?= $product->id ?>">
                    <img class="img-fluid" style="height: 300px; object-fit: cover"
                         src="<?= BASE_URL ?>/views/uploads/images/<?= $product->images ?>" alt=""
                    >
                </a>
                <div class="product-details">
                    <h6><?= escape(substr($product->description,0,20)) . "..." ?></h6>
                    <div class="price">
                        <h6><?= escape($product->price) . " Kyats" ?></h6>
                        <!-- <h6 class="l-through">$210.00</h6> -->
                    </div>
                    <div class="prd-bottom">

                        <a href="" class="social-info">
                            <span class="ti-bag"></span>
                            <p class="hover-text">add to bag</p>
                        </a>
                        <a href="products/product-detail?id=<?= $product->id ?>" class="social-info">
                            <span class="lnr lnr-move"></span>
                            <p class="hover-text">view more</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</section>
<!-- End Best Seller -->
</div>
</div>
</div>