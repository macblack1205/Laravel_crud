<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Details</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
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
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        .buttons {
            display: flex;
            justify-content: end;
            align-items: center;
            margin: 0;
            padding: 0;
            gap: 0 1rem;
        }

        
        .header h1 {
            margin: 0;
        }
        .go-back {
            background-color: #004d4d;
            color: #ffffff;
            border: 1px solid;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            cursor: pointer;
            font-size: 15px;
            text-decoration: none;
            text-align: center;
        }
        .go-back:hover {
            background-color: #ffffff;
            color: #004d4d;
            border: 1px solid #004d4d;
        }
        .product-box {
            border-bottom: 1px solid #dddddd;
            padding: 1rem 0;
            display: flex;
            flex-direction: column;
            margin-bottom: 1rem;
        }
        .product-details {
            flex-grow: 1;
        }
        .product-details strong {
            display: block;
            margin-bottom: 0.5rem;
        }

        @media (max-width:800px) {
            .header{
                flex-direction: column;
                justify-content: start;
            }
            .header h1{
                width: 100%;
                font-size: 25px;
            }
            .buttons{
                display: inline;
                justify-content: start;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        
        <div class="header">
            <h1>Product Details</h1>
            <div class="buttons">
                <?php if(Auth::id() === $product->user_id): ?>
                <a href="<?php echo e(route('product.edit', $product->id)); ?>" class="go-back">Edit</a>
                <form action="<?php echo e(route('product.destroy', $product->id)); ?>" method="POST" style="display: inline;">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>                    
                    <button type="submit" class="go-back">Delete</button>
                </form>
            <?php endif; ?>
            <a href="<?php echo e(route('product')); ?>" class="go-back">Return</a>
            </div>            
        </div>
        <div class="product-box">
            <div class="product-details">
                <strong>Name: <?php echo e($product->name); ?></strong>
                <strong>Price: $<?php echo e($product->price); ?></strong>
                <strong>Description: <?php echo e($product->description); ?></strong>
                
            </div>
        </div>
        <strong><?php echo e($product->user->first); ?> <?php echo e($product->user->last); ?></strong>

    </div>
</body>
</html>
<?php /**PATH /var/www/resources/views/product/index.blade.php ENDPATH**/ ?>