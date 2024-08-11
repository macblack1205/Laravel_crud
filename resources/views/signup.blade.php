<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Kle Academy</title>
    <link rel="stylesheet" href="style-signup.css">
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
                <h1>Sign up</h1>
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif
                <form action="{{route('registerUser')}}" method="post">  {{--from web.php action registerUser is posted and send through custAuthcntrller to validate --}}
                    @csrf
                    <div class="passfield">
                    <input type="text" placeholder="Name" name="first" value ="{{old('first')}}"  autocomplete="off" required>
                    <span class="text-danger">@error('name'){{$message}} @enderror </span>
                    <input type="text" placeholder="Last Name" name="last" value ="{{old('last')}}" autocomplete="off" required>
                    <span class="text-danger">@error('last'){{$message}} @enderror </span>
                    </div>  
                    <input type="email" placeholder="Email" name="email" value ="{{old('email')}}"  autocomplete="off" required>
                    <span class="text-danger">@error('email'){{$message}} @enderror </span>
                    <div class="passfield">
                        <input type="password" placeholder="Password" name="password"  autocomplete="off" required>
                        <input type="password" placeholder="Password repeat" name="password_confirmation"  autocomplete="off" required>  
                    </div>        
                    <span class="text-danger">@error('password'){{$message}} @enderror </span> 
                    <span class="text-danger">@error('password_confirmation'){{$message}} @enderror </span>             
                    <p>Already a member? <a href="login">Login here</a></p>
                    <button type="submit">Sign up</button>
                </form>
            </div>
        </div>
        <div class="right-container">
        </div>
    </main>
</body>
</html>


