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
            <h2>Edit Category</h2>

            <form method="POST" action="/admin/categories/edit-category/<?php echo e($categories[0]->id); ?>" class = "mt-5">
                <?php echo csrf_field(); ?>
                <div class = "form-wrapper grid grid-cols-6">
                    <input class = "col-span-6 mt-5" type="text" name = "name" placeholder = "Category Name" required value = "<?php echo e($categories[0]->name); ?>">
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
                    
                    <?php
                        $allcategories = DB::table('categories')->get();
                    ?>
                    <label for="parent_id" class = "mt-5 text-left">Parent Category:</label>
                    <select name="parent_id">
                        <option selected disabled>Choose Parent Category</option>
                        <?php foreach ($allcategories as $category): ?>
                            <?php if($category->id == $categories[0]->id): ?>

                            <?php else: ?>
                                <?php if($categories[0]->parent_id && $categories[0]->parent_id == $category->id): ?>
                                    <option value = "<?php echo $category->id; ?>" selected><?php echo $category->name; ?></option>
                                <?php else: ?>
                                    <option value = "<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <?php $__errorArgs = ['parent-category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-2"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <input class = "col-span-6 mt-5" type="text" name = "slug" placeholder = "Slug" required value = "<?php echo e($categories[0]->slug); ?>">
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
                    <input class = "col-span-6 mt-5" type="submit" value = "Edit Category">
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

<?php /**PATH F:\xampp\htdocs\laravel\laravel-training\resources\views/admin/categories/edit-category.blade.php ENDPATH**/ ?>