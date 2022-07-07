<?php 

use Illuminate\Validation\ValidationException;
use App\Models\Category;

?>

<x-layout>
    <section class="login-section">
        <div class = "container">
            <h2>Edit Category</h2>

            <form method="POST" action="/admin/categories/edit-category/{{$categories[0]->id}}" class = "mt-5">
                @csrf
                <div class = "form-wrapper grid grid-cols-6">
                    <input class = "col-span-6 mt-5" type="text" name = "name" placeholder = "Category Name" required value = "{{$categories[0]->name}}">
                    @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    
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
                    @error('parent-category')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                    <input class = "col-span-6 mt-5" type="text" name = "slug" placeholder = "Slug" required value = "{{$categories[0]->slug}}">
                    @error('slug')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <input class = "col-span-6 mt-5" type="submit" value = "Edit Category">
                </div>
            </form>
        </div>
    </section>
</x-layout>

