<style>
    .admin-menu ul li a.categories-menu {
        border-bottom: 1px solid #fb503b;
    }
</style>

<x-layout>
    <?php $categories = DB::table('categories')->get(); ?>
    <?php $parentcategories = DB::table('categories')->get(); ?>


    <section class="admin-section">
        <div class = "container">
            <x-products-menu/>
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
                            <a class = "text-xs text-gray-400" href = '/admin/categories/edit-category/{{ $category->id }}'>Edit</a>
                            <form method="POST" action="/admin/categories/delete-category/{{ $category->id }}">
                                @csrf
                                @method('DELETE')

                                <button class="text-xs text-gray-400" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </section>
</x-layout>