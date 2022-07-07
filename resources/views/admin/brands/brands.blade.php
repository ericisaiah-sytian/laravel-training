<style>
    .admin-menu ul li a.brands-menu {
        border-bottom: 1px solid #fb503b;
    }
</style>

<x-layout>
    <?php $brands = DB::table('brands')->get(); ?>

    <section class="admin-section">
        <div class = "container">
            <x-products-menu/>
            <h2 class = "mt-5">Brands</h2>
            <div class = "py-5 text-right">
                <a class = "add-admin-btn" href = "/admin/brands/add-brand">Add Brand</a>
            </div>
            <div class = "table-wrapper mt-5">
                <table>
                    <tr>
                        <th>Brand Name</th>
                        <th>Slug</th>
                        <th>Actions</th>
                    <tr>
                    <?php foreach ($brands as $brand): ?>
                    <tr>
                        <td><?php echo $brand->name; ?></td>
                        <td><?php echo $brand->slug; ?></td>
                        <td>
                            <a class = "text-xs text-gray-400" href = '/admin/brands/edit-brand/{{ $brand->id }}'>Edit</a>
                            <form method="POST" action="/admin/brands/delete-brand/{{ $brand->id }}">
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