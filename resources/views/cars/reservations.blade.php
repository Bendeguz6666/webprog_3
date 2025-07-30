<div>
    <h1> Reservations </h1>
    <table>
        <thead>
    <tr>
        <th>Id </th>
        <th>Car id</th>
        <th>user id</th>
        <th>start date</th>
        <th>end date</th>
        <th>Actions</th>
    </tr>
        </thead>
        @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->car_id }}</td>
                <td>{{ $reservation->user_id }}</td>
                <td>{{ $reservation->start_date }}</td>
                <td>{{ $reservation->end_date }}</td>
                <td>
                    <a href="{{ route('cars.rentform', $reservation->id) }}">Rent</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
