<?php 

use Illuminate\Validation\ValidationException;

?>

<x-layout>
    <section class="login-section">
        <div class = "container">
            <h2>Edit User</h2>
            <form method="POST" action="/admin/users/edit-user/{{$users[0]->id}}" class = "mt-5">
                @csrf
                <div class = "form-wrapper grid grid-cols-6">
                    <input class = "col-span-6 mt-5" type="text" name = "name" placeholder = "Full Name" required value = "{{$users[0]->name}}">
                    @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <input class = "col-span-6 mt-5" type="text" name = "username" placeholder = "Username" required value = "{{$users[0]->username}}">
                    @error('username')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <input class = "col-span-6 mt-5" type="email" name = "email" placeholder = "Email Address" required value = "{{$users[0]->email}}">
                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <input class = "col-span-6 mt-5" type="password" name = "password" placeholder = "Password" required>
                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <input class = "col-span-6 mt-5" type="submit" value = "Edit User">
                </div>
            </form>
        </div>
    </section>
</x-layout>

