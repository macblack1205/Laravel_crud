<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kle Academy</title>
    <link rel="stylesheet" href="style-product.css">
</head>
<body>
    <header>
        <div class="logo">Kle Academy</div>
        <nav>
            <a href="product">PRODUCTS</a>
            <a href="login">LOGIN</a>
            <a href="signup">SIGNUP</a>
        </nav>
    </header>
    
     <main>
        <div class="left-container">
            <div class="background-svg">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#AED3B0" d="M49.5,-70C60.8,-60,64.2,-41,64.8,-24.5C65.5,-8,63.4,6,58.7,18.7C54.1,31.5,46.9,43,36.6,48.1C26.4,53.2,13.2,51.8,-0.1,52C-13.5,52.2,-27,53.9,-41.1,50.1C-55.1,46.3,-69.8,36.9,-72.4,24.6C-75,12.2,-65.5,-3,-60,-19.4C-54.5,-35.8,-53.1,-53.5,-43.8,-64.1C-34.5,-74.7,-17.2,-78.2,1,-79.5C19.1,-80.8,38.3,-79.9,49.5,-70Z" transform="translate(100 100)" />
                </svg>
            </div>
             <div class="welcome-message">
                <h1>Welcome</h1>
                <p>to <b>Kle <em>Academy</em></b></p>
                <p><em><?php echo e($user->first); ?> <?php echo e($user->last); ?></em>
                    <a href="<?php echo e(route('logout')); ?>" id="here" onclick="event.preventDefault(); 
                    document.getElementById('logout-form').submit();">logout</a></p>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>

            </div>
            
            <?php if(Session::has('success')): ?>
                    <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                <?php endif; ?>
                <?php if(Session::has('fail')): ?>
                    <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
                <?php endif; ?> 

            <div class="btn">
                <button onclick="location.href='<?php echo e(route('edit-profile')); ?>'" class="editProfile">Edit Profile</button>
            </div>     
                  
        </div>

        <div class="right-container">
            
            

            <div class="create-product">
                <form action="<?php echo e(route('product.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="text" name="name" placeholder="Name" value="<?php echo e(old('name')); ?>" >
                    <?php if($errors->has('name')): ?>
                        <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                    <?php endif; ?>
                    <input type="number" step="0.01" name="price" placeholder="Price" value="<?php echo e(old('price')); ?>" >
                    <?php if($errors->has('price')): ?>
                        <span class="text-danger"><?php echo e($errors->first('price')); ?></span>
                    <?php endif; ?>
                    <input type="text" id="description" name="description" placeholder="Description" value="<?php echo e(old('description')); ?>" >
                    <?php if($errors->has('description')): ?>
                        <span class="text-danger"><?php echo e($errors->first('description')); ?></span>
                    <?php endif; ?>
                    <button type="submit">Create</button>
                </form>
            </div>


            <div class="show-product">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item-box">
                        <div class="up">
                            <strong><?php echo e($p->user->first); ?> <?php echo e($p->user->last); ?></strong>
                            <div class="up-right-buttons">
                                <a href="<?php echo e(route('product.show', $p->id)); ?>">View</a>
                                <?php if(Auth::id() === $p->user_id): ?>
                                    <a href="<?php echo e(route('product.edit', $p->id)); ?>">Edit</a>
                                    <form action="<?php echo e(route('product.destroy', $p->id)); ?>" method="POST" style="display: inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="below">
                            <div class="below-left">
                                <strong><?php echo e($p->name); ?></strong>
                                <strong>$<?php echo e($p->price); ?></strong>
                            </div>
                            <strong><?php echo e($p->description); ?></strong>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
        </div>
        
    </main>
</body>
</html>
<?php /**PATH /var/www/resources/views/product.blade.php ENDPATH**/ ?>