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
            <h2>Add Product</h2>
            <form method="POST" action="/admin/products/add-product" class = "mt-5" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class = "form-wrapper grid grid-cols-6">
                    <input class = "col-span-6 mt-5" type="file" name = "thumbnail" required>
                    <?php $__errorArgs = ['thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-2"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <input class = "col-span-6 mt-5" type="text" name = "name" placeholder = "Product Name" required>
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
                    <input class = "col-span-6 mt-5" type="text" name = "slug" placeholder = "Slug" required>
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
                            
                        ?>
                        <?php foreach ($categories as $category): ?>
                            <ul class = "parent">
                                <li>    
                                    <label class = "mr-2"><input class = "mr-1" type="checkbox" name="product-category[]" value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></label>
                                    <ul class= "sub-category" style = "padding-left: 12px;">
                                    <?php foreach ($childCategories as $childCategory): ?>
                                        <?php if($category->id == $childCategory->parent_id): ?>
                                            <li><label class = "mr-2"><input class = "mr-1" type="checkbox" name="product-category[]" value="<?php echo e($childCategory->id); ?>"><?php echo e($childCategory->name); ?></label></li>
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
                    <div class = "form-group mt-5" style = "text-align: left; max-width: 400px; width: 100%;">
                        <label for="brand_id">Brand:</label>
                        <select name="brand_id">
                            <option selected disabled>Choose Brand</option>
                            <?php foreach ($brands as $brand): ?>
                                <option value = "<?php echo $brand->id; ?>"><?php echo $brand->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php $__errorArgs = ['brand_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-2"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <textarea class = "col-span-6 mt-5" type="text" name = "excerpt" placeholder = "Type in excerpt here..." required></textarea>
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
                    
                    <input class = "col-span-6 mt-5" type="submit" value = "Add Product">
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

<?php /**PATH F:\xampp\htdocs\laravel\laravel-training\resources\views/admin/products/add-product.blade.php ENDPATH**/ ?>