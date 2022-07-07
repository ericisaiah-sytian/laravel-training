@if (session()->has('alert'))
<div class = "alert-wrapper mt-10">
    <div class = "container">
            <p class = "alert">{{ session('alert') }}</p>
    </div>
</div>
@endif