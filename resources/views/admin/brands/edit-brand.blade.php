<?php 

use Illuminate\Validation\ValidationException;

?>

<x-layout>
    <section class="login-section">
        <div class = "container">
            <h2>Edit Brand</h2>
            <form method="POST" action="/admin/brands/edit-brand/{{$brands[0]->id}}" class = "mt-5">
                @csrf
                <div class = "form-wrapper grid grid-cols-6">
                    <input class = "col-span-6 mt-5" type="text" name = "name" placeholder = "Brand Name" required value = "{{$brands[0]->name}}">
                    @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <input class = "col-span-6 mt-5" type="text" name = "slug" placeholder = "Slug" required value = "{{$brands[0]->slug}}">
                    @error('slug')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <input class = "col-span-6 mt-5" type="submit" value = "Edit Brand">
                </div>
            </form>
        </div>
    </section>
</x-layout>

