<style>
    .admin-menu ul li a.users-menu {
        border-bottom: 1px solid #fb503b;
    }
</style>

<x-layout>
    <?php $users = DB::table('users')->get(); ?>

    <section class="admin-section">
        <div class = "container">
            <x-products-menu/>
            <h2 class = "mt-5">Users</h2>
            <div class = "py-5 text-right">
                <a class = "add-admin-btn" href = "/admin/users/add-user">Add User</a>
            </div>
            <div class = "table-wrapper mt-5">
                <table>
                    <tr>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Actions</th>
                    <tr>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user->username; ?></td>
                        <td><?php echo $user->name; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td>
                            <a class = "text-xs text-gray-400" href = '/admin/users/edit-user/{{ $user->id }}'>Edit</a>
                            <form method="POST" action="/admin/users/delete-user/{{ $user->id }}">
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