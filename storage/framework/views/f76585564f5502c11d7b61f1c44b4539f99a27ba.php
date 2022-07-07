<?php //$categories = DB::table('categories')->get(); ?>
<?php $brands = DB::table('brands')->get(); ?>
<?php $categoryProduct = DB::table('category_product')->get(); ?>

<section class="admin-section">
    <div class = "container">
        <div class = "products-wrapper grid grid-cols-1 md:grid-cols-4 gap-4">

                <?php if($products->count()): ?>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class = "product-wrapper">
                    <img src='<?php echo e(asset('storage/' .$product->thumbnail)); ?>' alt='Featured Image' style = 'width: 80%'>

                    <!-- Category Starts Here -->
                    <p class = "categories">Categories: 
                        
                        <?php if($categories->count()): ?>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php 
                        $currentCat = array();
                        foreach ($categoryProduct as $catprod):
                            if($catprod->product_id == $product->id):
                                array_push($currentCat,$catprod->category_id);
                            endif;
                        endforeach; ?>
                        
                        <?php if(in_array($category->id, $currentCat)): ?>
                            <span><?php echo e($category->name); ?>, </span>
                        <?php endif; ?>
    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </p>
                    <!-- Category Ends Here -->

                    <h3 class = "title"><?php echo $product->name; ?></h3>

                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($product->brand_id == $brand->id): ?>
                            <p class = "brand">Brand: <?php echo $brand->name; ?></p>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <p class = "excerpt"><?php echo $product->excerpt; ?></p>
                </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>  
                    <p>No Products Found.</p>
                <?php endif; ?>
            </table>
        </div>
    </div>
</section>
<?php /**PATH F:\xampp\htdocs\laravel\laravel-training\resources\views/components/products.blade.php ENDPATH**/ ?>