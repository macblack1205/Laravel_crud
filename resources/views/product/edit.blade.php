<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 80%;
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-top: 0;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        input {
            padding: 0.5rem;
            border: 1px solid #dddddd;
            border-radius: 5px;
            font-size: 1rem;
        }
        button {
            background-color: #004d4d;
            color: #ffffff;
            border: none;
            padding: 0.5rem;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }
        button:hover {
            background-color: #003333;
        }
        a {
            color: #004d4d;
            text-decoration: none;
            font-size: 1rem;
            display: block;
            margin-top: 1rem;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Product</h1>
        <form action="{{ route('product.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="name" value="{{ $product->name }}" placeholder="Enter the product name" required>
            <input type="number" step="0.01" name="price" value="{{ $product->price }}" placeholder="Price" required>
            <input type="text" name="description" value="{{ $product->description }}" placeholder="Enter the description" required>
            <button type="submit">Update</button>
        </form>
        <a href="{{ route('product') }}">Back to Products</a>
    </div>
</body>
</html>
