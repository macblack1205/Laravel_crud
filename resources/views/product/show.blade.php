<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show - Kle product</title>
</head>
<body>  

    @section('content')
        <div class="container">
            <h1>{{ $product->name }}</h1>
            <p>Price: ${{ $product->price }}</p>
            <p>Description: {{ $product->description }}</p>
            <p>By: {{ $product->user->first }} {{ $product->user->last }}</p>
            <a href="{{ route('product.edit', $product->id) }}">Edit</a>
            <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
            <a href="{{ route('product.index') }}">Back to Products</a>
        </div>
    @endsection

</body>
</html>