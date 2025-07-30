<form method="POST" action="{{ route('auth.login') }}">
    @csrf

    <div>
        <label for="email">Email</label>
        <input id="email" type="text" name="email" required autofocus>
    </div>

    <div>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        <button type="submit">Login</button></a>
    </div>
</form>
<br>

<a href="{{ route('auth.showRegistrationForm') }}" class="btn btn-secondary">Register</a>
<!-- fb -->
