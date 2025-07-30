<div>
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
    <h1> Add Car </h1>
    <form method="POST" action="{{ route('cars.add') }}">
        @csrf
        <div>
            <label for="name">Name</label>
            <input id="name" type="text" name="name" required autofocus>
        </div>
        <div>
            <label for="price">price</label>
            <input id="price" type="number" name="price" required autofocus>HUF
        </div>
        <div>
            <label for="kilometers">price</label>
            <input id="kilometers" type="number" name="kilometers" required autofocus>KM
        </div>
        <div>
            <label for="type">Type</label>
            <select name="type" id="type">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->type }}</option>
                @endforeach
            </select>

        </div>
        <div>
            <label for="category">Category</label>
            <select name="category" id="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit">Add</button>
        </div>
    </form>
    <h1> Add Category </h1>
    <form method="POST" action="{{ route('cars.addcategory') }}">
        @csrf
        <div>
            <label>AddCategory</label>
            <input id="category" type="text" name="category" required autofocus>
            <button type="submit">Add</button>
        </div>
    </form>
    <h1> Add Type </h1>
    <form method="POST" action="{{ route('cars.addtype') }}">
        @csrf
        <div>
            <label>AddType</label>
            <input id="type" type="text" name="type" required autofocus>
            <button type="submit">Add</button>
        </div>
    </form>

    <h1> Reset DB </h1>
    <form method="POST" action="{{ route('cars.reset') }}">
        @csrf
        <div>
            <button type="submit">Reset</button>
        </div>
    </form>
</div>
