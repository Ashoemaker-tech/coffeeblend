<?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-md-3">
        <div class="menu-entry">
          <a href="/product?id=<?php echo e($relatedProduct['id']); ?>" class="img" style="background-image: url(images/<?php echo e($relatedProduct['image']); ?>);">
          </a>
          <div class="text text-center pt-4">
            <h3>
              <a href="/product?id=<?php echo e($relatedProduct['id']); ?>"><?php echo e($relatedProduct['name']); ?></a>
            </h3>
            <p><?php echo e($relatedProduct['description']); ?></p>
            <p class="price"><span><?php echo e($relatedProduct['price']); ?></span></p>
            <p>
              <a href="/product?id=<?php echo e($relatedProduct['id']); ?>" class="btn btn-primary btn-outline-primary">View Options
              </a>
            </p>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\Users\Andrew\Desktop\sites\coffeeblend\views/partials/relatedproducts.blade.php ENDPATH**/ ?>