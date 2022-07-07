<?php 

use Illuminate\Validation\ValidationException;

?>

<x-layout>
    <section class="login-section">
        <div class = "container">
            <h2>Register</h2>
            <form method="POST" action="/register" class = "mt-5">
                @csrf
                <div class = "form-wrapper grid grid-cols-6">
                    <input class = "col-span-6 mt-5" type="text" name = "name" placeholder = "Full Name" required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <input class = "col-span-6 mt-5" type="text" name = "username" placeholder = "Username" required>
                    @error('username')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <input class = "col-span-6 mt-5" type="email" name = "email" placeholder = "Email Address" required>
                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <input class = "col-span-6 mt-5" type="password" name = "password" placeholder = "Password" required>
                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <input class = "col-span-6 mt-5" type="submit" value = "Register">
                </div>
            </form>
        </div>
    </section>
</x-layout>

