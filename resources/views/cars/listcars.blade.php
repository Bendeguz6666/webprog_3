<div>
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Kilometers</th>
                <th>Price</th>
                <th>Category</th>
                <th>Actions</th>
                @if (auth()->user() && auth()->user()->role === 'admin')
                    <a href="{{ route('cars.adduser') }}" class="btn btn-primary">Add User</a>
                    <a href="{{ route('cars.addcar') }}" class="btn btn-success">Add Car</a>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->type }}</td>
                    <td>{{ $car->kilometers }}KM</td>
                    <td>{{ $car->price }}FT</td>
                    <td>{{ $car->category }}</td>
                    <td>
                        <a href="{{ route('cars.reserveCar', $car->id) }}">Make Reservation</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
