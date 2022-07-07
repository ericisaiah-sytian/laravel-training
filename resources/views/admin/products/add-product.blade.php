<?php 

use Illuminate\Validation\ValidationException;
use App\Models\Category;

?>

<x-layout>
    <section class="login-section">
        <div class = "container">
            <h2>Add Product</h2>
            <form method="POST" action="/admin/products/add-product" class = "mt-5" enctype="multipart/form-data">
                @csrf
                <div class = "form-wrapper grid grid-cols-6">
                    <input class = "col-span-6 mt-5" type="file" name = "thumbnail" required>
                    @error('thumbnail')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <input class = "col-span-6 mt-5" type="text" name = "name" placeholder = "Product Name" required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <input class = "col-span-6 mt-5" type="text" name = "slug" placeholder = "Slug" required>
                    @error('slug')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                   
                    <div class = "form-group category-input pt-5" style = "width: 100%; max-width: 400px; text-align: left;">
                        <h4 class = "mb-2">Categories:</h4>
                        <?php
                            $categories = Category::where('parent_id', null)->get();
                            $childCategories = DB::table('categories')->get();
                            
                        ?>
                        <?php foreach ($categories as $category): ?>
                            <ul class = "parent">
                                <li>    
                                    <label class = "mr-2"><input class = "mr-1" type="checkbox" name="product-category[]" value="{{$category->id}}">{{$category->name}}</label>
                                    <ul class= "sub-category" style = "padding-left: 12px;">
                                    <?php foreach ($childCategories as $childCategory): ?>
                                        <?php if($category->id == $childCategory->parent_id): ?>
                                            <li><label class = "mr-2"><input class = "mr-1" type="checkbox" name="product-category[]" value="{{$childCategory->id}}">{{$childCategory->name}}</label></li>
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
                        @error('brand_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <textarea class = "col-span-6 mt-5" type="text" name = "excerpt" placeholder = "Type in excerpt here..." required></textarea>
                    @error('excerpt')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    
                    <input class = "col-span-6 mt-5" type="submit" value = "Add Product">
                </div>
            </form>
        </div>
    </section>
</x-layout>

