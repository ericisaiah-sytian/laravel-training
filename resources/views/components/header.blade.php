<?php 
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;
?>

<header class = "main-header">
    <div class = "container">
        <div class = "grid grid-cols-6 gap-4">
            <div class = "col-span-6 md:col-span-3">
                <a href = "/"><img class = "company-logo" src="{{url('/images/laravel-logo.png')}}" alt="Laravel Logo"/></a>
            </div>
        
            <!-- If Login -->
            <?php if (Auth::check()): ?>
            <div class = "col-span-6 md:col-span-3">
                <ul class = "text-right">
                    <li>Hi, <?php echo auth()->user()->name ?>!</li>
                    <li><a href = "/admin/users">Admin Dashboard</a></li>
                    <li><a href = "/logout">Log Out</a></li>
                </ul>
            </div>
        
            <?php else: ?>
                <!-- If Not Login -->
                <div class = "col-span-6 md:col-span-3">
                    <ul class = "text-right">
                        <li><a href = "/login">Login</a></li>
                        <li><a href = "/register">Register</a></li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>