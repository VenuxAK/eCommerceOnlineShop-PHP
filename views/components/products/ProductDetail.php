<!--================Single Product Area =================-->
<div class="product_image_area pt-0">
  <div class="container">
    <div class="row s_product_inner">
      <div class="col-lg-6">
        <!-- <div class="s_Product_carousel">
          <div class="single-prd-item">
            <img class="img-fluid" src="<?php // echo BASE_URL ?>/views/assets/img/category/s-p1.jpg" alt="">
          </div>
          <div class="single-prd-item">
            <img class="img-fluid" src="<?php // echo BASE_URL ?>/views/assets/img/category/s-p1.jpg" alt="">
          </div>
        </div> -->
        <div>
          <img class="img-fluid" src="<?= BASE_URL ?>/views/uploads/images/<?= escape($product->images) ?>" alt="">
        </div>
      </div>
      <div class="col-lg-5 offset-lg-1">
        <div class="s_product_text">
          <h3><?= escape($product->name) ?></h3>
          <h2><?= escape($product->price) . " Kyats" ?></h2>
          <ul class="list">
            <?php 
              $category = App::get("db")->query("SELECT * FROM categories WHERE id=$product->category_id")->getOne();
            ?>
            <li><a class="active" href="#"><span>Category</span> : <?= escape($category->name) ?></a></li>
            <li><a href="#"><span>Availibility</span> : In Stock</a></li>
          </ul>
          <p> <?= escape($product->description) ?> </p>
            <div class="product_count">
              <label for="qty">Quantity:</label>
              <input type="text" name="qty" id="qty" maxlength="12" value="1" title="Quantity:" class="input-text qty">
              <button class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
              <button class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
            </div>
          <div class="card_area d-flex align-items-center">
            <a class="primary-btn" href="#">Add to Cart</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><br>
<!--================End Single Product Area =================-->
<script>
  const qtyInput = document.getElementById('qty');
  const increaseBtn = document.querySelector('.increase');
  const reduceBtn = document.querySelector('.reduced');
  
  increaseBtn.addEventListener('click', () => {
    let qty = parseInt(qtyInput.value);
    if (!isNaN(qty)) {
      qty++;
      qtyInput.value = qty;
    }
  });
  
  reduceBtn.addEventListener('click', () => {
    let qty = parseInt(qtyInput.value);
    if (!isNaN(qty) && qty > 1) {
      qty--;
      qtyInput.value = qty;
    }
  });
</script>
