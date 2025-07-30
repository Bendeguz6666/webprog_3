<div>
    <h1> Confirm Reservation </h1>
    <li> {{ $rental->car_id }} </li>
    {{-- <li> {{ $rental->id }} </li> --}}
    <li> {{ $rental->start_date }} - {{ $rental->end_date }} </li>
    <li> Total days: {{ (strtotime($rental->end_date) - strtotime($rental->start_date)) / (60 * 60 * 24) }} </li>
    <li> {{(strtotime($rental->end_date) - strtotime($rental->start_date)) / (60 * 60 * 24) * $price}}  Huf</li>
    {{-- <li> {{ $price }} </li> --}}
    <form method="POST" action="{{ route('cars.reserveconfirm', $rental->car_id) }}">
        @csrf
        <input type="hidden" id="rental" name="rental" value="{{ $rental }}">
        <div>
            <button type="submit">Confirm</button>
            <button onclick="window.history.back();">Back</button>
        </div>
    </form>
</div>
