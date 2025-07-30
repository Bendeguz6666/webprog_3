<div>
    <h1> Rent Car </h1>
    <h2> Selected car: {{ $car->name }} </h2>
    Unavailable dates:
    <ul>
        @foreach ($rentals as $date)
            <li> {{ $date->start_date }} - {{ $date->end_date }} </li>
        @endforeach
    </ul>
    <form method="GET" action="{{ route('cars.reserve', $car->id) }}">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif
        <div>
            <input type="text" name="start_date" id="start_date" placeholder="YYYY-MM-DD" required>
            <input type="text" name="end_date" id="end_date" placeholder="YYYY-MM-DD" required>
            <button type="submit">Rent</button>
        </div>
    </form>

</div>
