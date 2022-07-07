<style>
    .admin-menu ul li a.categories-menu {
        border-bottom: 1px solid #fb503b;
    }
</style>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.layout','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php $categories = DB::table('categories')->get(); ?>
    <?php $parentcategories = DB::table('categories')->get(); ?>


    <section class="admin-section">
        <div class = "container">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.products-menu','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('products-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <h2 class = "mt-5">Categories</h2>
            <div class = "py-5 text-right">
                <a class = "add-admin-btn" href = "/admin/categories/add-category">Add Category</a>
            </div>
            <div class = "table-wrapper mt-5">
                <table>
                    <tr>
                        <th>Category Name</th>
                        <th>Parent Category</th>
                        <th>Slug</th>
                        <th>Actions</th>
                    <tr>
                    <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?php echo $category->name; ?></td>
                        <td>
                            <?php if($category->parent_id): ?>
                                <?php foreach ($parentcategories as $parentcategory): ?>
                                    <?php if($parentcategory->id == $category->parent_id): ?>
                                        <?php echo $parentcategory->name; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                N/A
                            <?php endif; ?>
                        </td>
                        <td><?php echo $category->slug; ?></td>
                        <td>
                            <a class = "text-xs text-gray-400" href = '/admin/categories/edit-category/<?php echo e($category->id); ?>'>Edit</a>
                            <form method="POST" action="/admin/categories/delete-category/<?php echo e($category->id); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button class="text-xs text-gray-400" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php /**PATH F:\xampp\htdocs\laravel\laravel-training\resources\views/admin/categories/categories.blade.php ENDPATH**/ ?>