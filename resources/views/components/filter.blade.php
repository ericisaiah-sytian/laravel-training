<!-- Filter Starts Here -->

<section class = "filter-section">
    <div class = "container">
        <form action="/" method = "get">
        <div class = "grid grid-cols-6">
            <div class = "col-span-6 md:col-span-1">

            </div>
            <div class = "filter-div col-span-6 md:col-span-1 px-2 mt-2">
                <?php
                    $brands = DB::table('brands')->get();

                ?>
                <select name="brand">
                    <option selected disabled>Choose Brand</option>
                    <?php foreach ($brands as $brand): ?>
                        <option value = "<?php echo $brand->slug; ?>"><?php echo $brand->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class = "filter-div col-span-6 md:col-span-1 px-2 mt-2">
                <?php
                    $categories = DB::table('categories')->get();

                ?>
                <select name="categories">
                    <option selected disabled>Choose Category</option>
                    <?php foreach ($categories as $category): ?>
                        <option value = "<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class = "filter-div col-span-6 md:col-span-1 px-2 mt-2">
                <input type="text" placeholder="Search" name = "search">
            </div>
            <div class = "filter-div col-span-6 md:col-span-1 px-2 mt-2">
                <input type="submit" value="Search">
            </div>
            <div class = "col-span-6 md:col-span-1">

            </div>
        </div>
        </form>
    </div>
</section>
<!-- Filter Ends Here -->
