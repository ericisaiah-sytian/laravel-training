<?php 

use Illuminate\Validation\ValidationException;
use App\Models\Category;

?>

<x-layout>
    <section class="login-section">
        <div class = "container">
            <h2>Edit Product</h2>
            <form method="POST" action="/admin/products/edit-product/{{$products[0]->id}}" class = "mt-5" enctype="multipart/form-data">
                @csrf
                <div class = "form-wrapper grid grid-cols-6">
                    {{-- <input class = "col-span-6 mt-5" type="file" name = "thumbnail" required>
                    @error('thumbnail')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror --}}
                    <input class = "col-span-6 mt-5" type="text" name = "name" placeholder = "Product Name" required value = "{{$products[0]->name}}">
                    @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <input class = "col-span-6 mt-5" type="text" name = "slug" placeholder = "Slug" required value = "{{$products[0]->slug}}">
                    @error('slug')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

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
                                        <label class = "mr-2"><input class = "mr-1" type="checkbox" name="product-category[]" value="{{$category->id}}" checked>{{$category->name}}</label>
                                    <?php else: ?>
                                        <label class = "mr-2"><input class = "mr-1" type="checkbox" name="product-category[]" value="{{$category->id}}">{{$category->name}}</label>
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
                                                <li><label class = "mr-2"><input class = "mr-1" type="checkbox" name="product-category[]" value="{{$childCategory->id}}" checked>{{$childCategory->name}}</label></li>
                                            <?php else: ?>
                                                <li><label class = "mr-2"><input class = "mr-1" type="checkbox" name="product-category[]" value="{{$childCategory->id}}">{{$childCategory->name}}</label></li>
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
                    <textarea class = "col-span-6 mt-5" type="text" name = "excerpt" placeholder = "Type in excerpt here..." required>{{$products[0]->excerpt}}</textarea>
                    @error('excerpt')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    
                    <input class = "col-span-6 mt-5" type="submit" value = "Edit Product">
                </div>
            </form>
        </div>
    </section>
</x-layout>

