<?php //$categories = DB::table('categories')->get(); ?>
<?php $brands = DB::table('brands')->get(); ?>
<?php $categoryProduct = DB::table('category_product')->get(); ?>

<section class="admin-section">
    <div class = "container">
        <div class = "products-wrapper grid grid-cols-1 md:grid-cols-4 gap-4">

                @if ($products->count())
                @foreach ($products as $product )
                <div class = "product-wrapper">
                    <img src='{{  asset('storage/' .$product->thumbnail) }}' alt='Featured Image' style = 'width: 80%'>

                    <!-- Category Starts Here -->
                    <p class = "categories">Categories: 
                        
                        @if($categories->count())
                        @foreach ($categories as $category)
                        <?php 
                        $currentCat = array();
                        foreach ($categoryProduct as $catprod):
                            if($catprod->product_id == $product->id):
                                array_push($currentCat,$catprod->category_id);
                            endif;
                        endforeach; ?>
                        
                        <?php if(in_array($category->id, $currentCat)): ?>
                            <span>{{$category->name}}, </span>
                        <?php endif; ?>
    
                        @endforeach
                        @endif
                    </p>
                    <!-- Category Ends Here -->

                    <h3 class = "title"><?php echo $product->name; ?></h3>

                    @foreach($brands as $brand)
                        @if($product->brand_id == $brand->id)
                            <p class = "brand">Brand: <?php echo $brand->name; ?></p>
                        @endif
                    @endforeach

                    <p class = "excerpt"><?php echo $product->excerpt; ?></p>
                </div>

                @endforeach
                @else  
                    <p>No Products Found.</p>
                @endif
            </table>
        </div>
    </div>
</section>
