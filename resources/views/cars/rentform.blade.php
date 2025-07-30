<div>
    <h1> Rent Car </h1>
    <h2> Selected car: {{ $rental->car_id }} </h2>
    <form method="POST" action="{{ route('cars.rent', $rental->car_id) }}">
        @csrf
        <input type="hidden" id="car_id" name="car_id" value="{{ $rental->car_id }}">
        <input type="hidden" id="user_id" name="user_id" value="{{ $rental->user_id }}">
        <input type="text" name="end_date" id="end_date" placeholder="YYYY-MM-DD" required>
        <input type="number" name="kilometers" id="kilometers" required>KM
        <button type="submit">Rent</button>
    </form>
</div>
