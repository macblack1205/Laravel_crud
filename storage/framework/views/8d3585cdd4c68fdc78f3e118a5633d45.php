<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Kle Academy</title>
    <link rel="stylesheet" href="style-editProfile.css">
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
            <div class="register-form">
                <h1>Edit profile</h1>
                <?php if(Session::has('success')): ?>
                    <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                <?php endif; ?>
                <?php if(Session::has('fail')): ?>
                    <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
                <?php endif; ?>
                <form action="<?php echo e(route('updateEdit')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="passfield">
                        <input type="text" placeholder="Name" name="first" value="<?php echo e(old('first', $user->first)); ?>" autocomplete="off" required>
                        <span class="text-danger"><?php $__errorArgs = ['first'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
                        <input type="text" placeholder="Last Name" name="last" value="<?php echo e(old('last', $user->last)); ?>" autocomplete="off" required>
                        <span class="text-danger"><?php $__errorArgs = ['last'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
                    </div>  
                    <input type="email" placeholder="Email" name="email" value="<?php echo e(old('email', $user->email)); ?>" autocomplete="off"  required>
                    <span class="text-danger"><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
                    <div class="passfield">
                        <input type="password" placeholder="Password" name="password" value="<?php echo e(old('password', $user->password)); ?>" autocomplete="off">
                        <input type="password" placeholder="Password repeat" name="password_confirmation" value="<?php echo e(old('password', $user->password)); ?>"autocomplete="off">  
                    </div>        
                    <span class="text-danger"><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span> 
                    <span class="text-danger"><?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>             
                    <button type="submit">Update</button>
                </form>
                <form action="<?php echo e(route('deleteProfile')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" id="delete" >Delete Profile</button>
                </form>
            </div>
        </div>
        <div class="right-container">
        </div>
    </main>
</body>
</html>
<?php /**PATH /var/www/resources/views/edit-profile.blade.php ENDPATH**/ ?>