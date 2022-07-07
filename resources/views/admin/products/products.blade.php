<style>
    .admin-menu ul li a.products-menu {
        border-bottom: 1px solid #fb503b;
    }
</style>

<x-layout>
    <?php $products = DB::table('products')->get(); ?>

    <section class="admin-section">
        <div class = "container">
            <x-products-menu/>
            <h2 class = "mt-5">Products</h2>
            <div class = "py-5 text-right">
                <a class = "add-admin-btn" href = "/admin/products/add-product">Add Products</a>
            </div>
            <div class = "table-wrapper mt-5">
                <table>
                    <tr>
                        <th>Thumbnails</th>
                        <th>Product Name</th>
                        <th>Slug</th>
                        <th>Actions</th>
                    <tr>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><img src='{{  asset('storage/' .$product->thumbnail) }}' alt='Featured Image' style = 'width: 220px;'></td>
                        <td><?php echo $product->name; ?></td>
                        <td><?php echo $product->slug; ?></td>
                        <td>
                            <a class = "text-xs text-gray-400" href = '/admin/products/edit-product/{{ $product->id }}'>Edit</a>
                            <form method="POST" action="/admin/products/delete-product/{{ $product->id }}">
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