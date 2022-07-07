@if (session()->has('success'))
<div class = "success-wrapper mt-10">
    <div class = "container">
            <p class = "success">{{ session('success') }}</p>
    </div>
</div>
@endif