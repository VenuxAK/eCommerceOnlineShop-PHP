<div class="container">
    <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
            <div class="sidebar-categories">
                <div class="head">Browse Categories</div> 
                <ul class="main-categories">
                    <?php $i = 1; foreach ($categories as $category): ?>
                        <li class="main-nav-list">
                            <a data-toggle="collapse" href="#fruitsVegetable<?= $i ?>" aria-expanded="false" aria-controls="fruitsVegetable<?= $i ?>">
                                <span class="lnr lnr-arrow-right"></span>
                                <?= escape($category->name) ?>
                                <span class="number">(53)</span>
                            </a>
                            <ul class="collapse" id="fruitsVegetable<?= $i ?>" data-toggle="collapse" aria-expanded="false" aria-controls="fruitsVegetable<?= $i ?>">
                                <?php
                                    $categoryProducts = array_filter($products, function($product) use ($category) {
                                        return $product->category_id === $category->id;
                                    });
                                ?>
                                <?php foreach($categoryProducts as $categoryProduct) : ?>
                                    <li class="main-nav-list child">
                                        <a href="#">
                                            <?= $categoryProduct->name ?>
                                            <span class="number">(<?= $categoryProduct->quantity ?>)</span>
                                        </a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </li>
                    <?php $i++; endforeach ?>
                </ul>

            </div>
        </div>
        