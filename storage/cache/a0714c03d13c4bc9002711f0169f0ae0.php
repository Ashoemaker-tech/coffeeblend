
  <?php $__env->startSection('content'); ?>
    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">
                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Product Detail</h1>
                        <p class="breadcrumbs">
                            <span class="mr-2"><a href="/">Home</a></span> 
                            <span>Product Detail</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="images/menu-2.jpg" class="image-popup"><img src="images/<?php echo e($product['image']); ?>"
                            class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3><?php echo e($product['name']); ?></h3>
                    <p class="price"><span><?php echo e($product['price']); ?></span></p>
                    <p><?php echo e($product['description']); ?></p>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group d-flex">
                                <div class="select-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="" id="" class="form-control">
                                        <option value="Small">Small</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Large">Large</option>
                                        <option value="Extra Large">Extra Large</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="input-group col-md-6 d-flex mb-3">
                            <span class="input-group-btn mr-2">
                                <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                    <i class="icon-minus"></i>
                                </button>
                            </span>
                            <input type="text" id="quantity" name="quantity" class="form-control input-number"
                                value="1" min="1" max="100">
                            <span class="input-group-btn ml-2">
                                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                    <i class="icon-plus"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <!-- Add To Cart -->
                    <form action="/cart" method="POST">
                        <input type="hidden" name="name" value="<?php echo e($product['name']); ?>">
                        <input type="hidden" name="image" value="<?php echo e($product['image']); ?>">
                        <input type="hidden" name="description" value="<?php echo e($product['description']); ?>">
                        <input type="hidden" name="price" value="<?php echo e($product['price']); ?>">
                        <button type="submit" class="btn btn-primary py-3 px-5">Add to Cart</button>
                    </form>
                </div>
            </div>
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
                <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3">
                        <div class="menu-entry">
                            <a href="/product?id=<?php echo e($relatedProduct['id']); ?>" class="img"
                                style="background-image: url(images/<?php echo e($relatedProduct['image']); ?>);">
                            </a>
                            <div class="text text-center pt-4">
                                <h3>
                                    <a href="/product?id=<?php echo e($relatedProduct['id']); ?>"><?php echo e($relatedProduct['name']); ?></a>
                                </h3>
                                <p><?php echo e($relatedProduct['description']); ?></p>
                                <p class="price"><span><?php echo e($relatedProduct['price']); ?></span></p>
                                <p>
                                    <a href="/product/<?php echo e($relatedProduct['id']); ?>"
                                        class="btn btn-primary btn-outline-primary">View Options
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\coffeblend\views/product/index.blade.php ENDPATH**/ ?>