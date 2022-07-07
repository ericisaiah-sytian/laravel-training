<?php 

use Illuminate\Validation\ValidationException;

use App\Models\Category;

?>

<x-layout>
    <section class="login-section">
        <div class = "container">
            <h2>Add Category</h2>
            <form method="POST" action="/admin/categories/add-category" class = "mt-5">
                @csrf
                <div class = "form-wrapper grid grid-cols-6">
                    <input class = "col-span-6 mt-5" type="text" name = "name" placeholder = "Category Name" required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                    <?php
                        $categories = DB::table('categories')->get();
                    ?>
                    <label for="parent_id" class = "mt-5 text-left">Parent Category:</label>
                    <select name="parent_id">
                        <option selected disabled>Choose Parent Category</option>
                        <?php foreach ($categories as $category): ?>
                            <option value = "<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    @error('parent-category')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                    <input class = "col-span-6 mt-5" type="text" name = "slug" placeholder = "Slug" required>
                    @error('slug')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <input class = "col-span-6 mt-5" type="submit" value = "Add Category">
                </div>
            </form>
        </div>
    </section>
</x-layout>

