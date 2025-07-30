<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title> <!-- Default title if not defined in the child view -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Your main CSS file -->
    <!-- You can include more styles here or add extra styles in child views -->
    @stack('styles') <!-- For extra styles pushed from child views -->
</head>
<body>
    <!-- Header / Navbar -->
    <header>
        <nav>
            <div class="container">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @auth
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endauth
                </ul>
            </div>
        </nav>
    </header>

    <!-- Main Content Area -->
    <main>
        <div class="container">
            @yield('content') <!-- Content of child views will be injected here -->
        </div>
    </main>

    <!-- Footer Section -->
    <footer>
        <div class="container">
            <p>© 2024 My Application. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Scripts Section -->
    <script src="{{ asset('js/app.js') }}"></script> <!-- Link to your main JS file -->
    @stack('scripts') <!-- For extra JS pushed from child views -->
</body>
</html>