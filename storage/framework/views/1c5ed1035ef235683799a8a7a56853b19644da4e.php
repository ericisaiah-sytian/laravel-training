<?php 

use Illuminate\Validation\ValidationException;
use App\Models\Category;

?>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.layout','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <section class="login-section">
        <div class = "container">
            <h2>Edit Product</h2>
            <form method="POST" action="/admin/products/edit-product/<?php echo e($products[0]->id); ?>" class = "mt-5" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class = "form-wrapper grid grid-cols-6">
                    
                    <input class = "col-span-6 mt-5" type="text" name = "name" placeholder = "Product Name" required value = "<?php echo e($products[0]->name); ?>">
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-2"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <input class = "col-span-6 mt-5" type="text" name = "slug" placeholder = "Slug" required value = "<?php echo e($products[0]->slug); ?>">
                    <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-2"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <div class = "form-group category-input pt-5" style = "width: 100%; max-width: 400px; text-align: left;">
                        <h4 class = "mb-2">Categories:</h4>
                        <?php
                            $categories = Category::where('parent_id', null)->get();
                            $childCategories = DB::table('categories')->get();

                            $categoryProduct = DB::table('category_product')->get();
                            
                        ?>
                        <?php foreach ($categories as $category): ?>
                            <!-- check current cat starts here -->
                            <?php 
                            $currentCat = array();
                            foreach ($categoryProduct as $catprod):
                                if($catprod->product_id == $products[0]->id):
                                    array_push($currentCat,$catprod->category_id);
                                endif;
                            endforeach; ?>
                            <!-- check current cat ends here -->

                            <ul class = "parent">
                                <li>
                                    <?php if(in_array($category->id, $currentCat)): ?>
                                        <label class = "mr-2"><input class = "mr-1" type="checkbox" name="product-category[]" value="<?php echo e($category->id); ?>" checked><?php echo e($category->name); ?></label>
                                    <?php else: ?>
                                        <label class = "mr-2"><input class = "mr-1" type="checkbox" name="product-category[]" value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></label>
                                    <?php endif; ?>
                                    <ul class= "sub-category" style = "padding-left: 12px;">
                                    <?php foreach ($childCategories as $childCategory): ?>

                                        <!-- check current cat starts here -->
                                        <?php 
                                        $childcurrentCat = array();
                                        foreach ($categoryProduct as $childcatprod):
                                            if($childcatprod->product_id == $products[0]->id):
                                                array_push($childcurrentCat,$childcatprod->category_id);
                                            endif;
                                        endforeach; ?>
                                        <!-- check current cat ends here -->

                                    
                                        <?php if($category->id == $childCategory->parent_id): ?>
                                            <?php if(in_array($childCategory->id, $childcurrentCat)): ?>
                                                <li><label class = "mr-2"><input class = "mr-1" type="checkbox" name="product-category[]" value="<?php echo e($childCategory->id); ?>" checked><?php echo e($childCategory->name); ?></label></li>
                                            <?php else: ?>
                                                <li><label class = "mr-2"><input class = "mr-1" type="checkbox" name="product-category[]" value="<?php echo e($childCategory->id); ?>"><?php echo e($childCategory->name); ?></label></li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    </ul>
                                </li>
                            </ul>
                        <?php endforeach; ?>
                    </div>

                    <?php
                        $brands = DB::table('brands')->get();
                    ?>
                    <label for="brand_id" class = "mt-5">Brand:</label>
                    <select name="brand_id">
                        <option selected disabled>Choose Brand</option>
                        <?php foreach ($brands as $brand): ?>
                            <?php 
                                $currentBrand = $products[0]->brand_id;
                                $optionBrand = $brand->id;

                                if($currentBrand == $optionBrand): ?>
                                    <option value = "<?php echo $brand->id; ?>" selected><?php echo $brand->name; ?></option>
                                <?php else: ?>
                                    <option value = "<?php echo $brand->id; ?>"><?php echo $brand->name; ?></option>
                                <?php endif; ?>    
                        <?php endforeach; ?>
                    </select>
                    <textarea class = "col-span-6 mt-5" type="text" name = "excerpt" placeholder = "Type in excerpt here..." required><?php echo e($products[0]->excerpt); ?></textarea>
                    <?php $__errorArgs = ['excerpt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-2"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    
                    <input class = "col-span-6 mt-5" type="submit" value = "Edit Product">
                </div>
            </form>
        </div>
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

<?php /**PATH F:\xampp\htdocs\laravel\laravel-training\resources\views/admin/products/edit-product.blade.php ENDPATH**/ ?>