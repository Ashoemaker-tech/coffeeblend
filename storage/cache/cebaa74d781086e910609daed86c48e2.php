<?php $__env->startSection('content'); ?>
<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">
        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Cart</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-cart">
  <div class="container">
    <div class="row">
      <div class="col-md-12 ftco-animate">
        <div class="cart-list">
          <?php if($cart_items): ?>
          <table class="table">
            <thead class="thead-primary">
              <tr class="text-center">
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $cart_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr class="text-center">
                <td class="product-remove">
                  <form action="/remove-item" method="POST">
                    <input type="hidden" value="<?php echo e($item['product_id']); ?>" name="product_id" />
                    <button type="submit" name="submit" class="icon-close"></button>
                  </form>
                </td>
                <td class="image-prod">
                  <div class="img" style="background-image:url(images/<?php echo e($item['image']); ?>);"></div>
                </td>
                <td class="product-name">
                  <h3><?php echo e($item['name']); ?></h3>
                </td>
                <td class="price">$<?php echo e($item['price']); ?></td>
                <td>
                  <div class="input-group mb-3">
                    <input disabled type="text" name="quantity" class="quantity form-control input-number" value="<?php echo e($item['quantity']); ?>" min="1" max="10">
                  </div>
                </td>
                <td class="total">$<?php echo e($item['quantity'] * $item['price']); ?></td>
              </tr><!-- END TR-->
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
          </table>
          <?php else: ?>
          <h3>You have no items in your cart</h3>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php if($cart_items): ?>
    <div class="row justify-content-end">
      <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
        <div class="cart-total mb-3">
          <h3>Cart Totals</h3>
          <p class="d-flex">
            <span>Subtotal</span>
            <span>$<?php echo e($cart_subtotals); ?></span>
          </p>
          <p class="d-flex">
            <span>Delivery Fee</span>
            <span>$0.00</span>
          </p>
          <p class="d-flex">
            <span>Discount</span>
            <span>$3.00</span>
          </p>
          <hr>
          <p class="d-flex total-price">
            <span>Total</span>
            <span>$<?php echo e($cart_subtotals - 3); ?></span>
          </p>
        </div>
        <form action="/checkout" method="POST">
          <p class="text-center">
            <!-- TODO complete functionality -->
            <input type="hidden" name="checkout_totals" value="<?php echo e($cart_subtotals - 3); ?>" />
            <button type="submit" id="checkout-btn" class="btn btn-primary py-3 px-4">Proceed to Checkout</button>
        </form>
        </p>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">
        <span class="subheading">Discover</span>
        <h2 class="mb-4">Related products</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
          the blind texts.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="menu-entry">
          <a href="#" class="img" style="background-image: url(images/menu-1.jpg);"></a>
          <div class="text text-center pt-4">
            <h3><a href="#">Coffee Capuccino</a></h3>
            <p>A small river named Duden flows by their place and supplies</p>
            <p class="price"><span>$5.90</span></p>
            <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="menu-entry">
          <a href="#" class="img" style="background-image: url(images/menu-2.jpg);"></a>
          <div class="text text-center pt-4">
            <h3><a href="#">Coffee Capuccino</a></h3>
            <p>A small river named Duden flows by their place and supplies</p>
            <p class="price"><span>$5.90</span></p>
            <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="menu-entry">
          <a href="#" class="img" style="background-image: url(images/menu-3.jpg);"></a>
          <div class="text text-center pt-4">
            <h3><a href="#">Coffee Capuccino</a></h3>
            <p>A small river named Duden flows by their place and supplies</p>
            <p class="price"><span>$5.90</span></p>
            <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="menu-entry">
          <a href="#" class="img" style="background-image: url(images/menu-4.jpg);"></a>
          <div class="text text-center pt-4">
            <h3><a href="#">Coffee Capuccino</a></h3>
            <p>A small river named Duden flows by their place and supplies</p>
            <p class="price"><span>$5.90</span></p>
            <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\coffeblend\views/cart.blade.php ENDPATH**/ ?>