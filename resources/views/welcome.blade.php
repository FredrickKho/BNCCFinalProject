<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Weasel Shop</title>
        <link rel="stylesheet" href="{{ URL::asset("css/welcome.css") }}">
        <!-- Fonts -->
        
    </head>
    <body >
        <div class="header">
            <div class="logo">
                <img src="{{ URL::asset('/images/logo.png') }}" alt="" >
            </div>
            <div class="menu">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto option">
                            @if (Route::has('login'))
                                @auth
                                    @if (auth()->user()->Admin_ID != null)
                                        <a href="{{ route('adminHome') }}" class="nav-link">Dashboard</a>
                                    @else
                                        <a href="{{ route('userHome') }}" class="nav-link">Dashboard</a>
                                    @endif
                            @else
                                    <a href="{{ route('login') }}" class="nav-link">Log in</a>
            
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                                    @endif
                                @endauth
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="introduction">
            <div class="intro">
                <div class="intro-text">
                    <h1>Welcome to WeaselStore</h1>
                    <h2>Save money, Live better.</h2>
                    <h2>Product Store</h2>
                </div>
                <div class="create-link">
                    @if (Route::has('login'))
                        @auth
                        @if (auth()->user()->Admin_ID != null)
                            <a href="{{ route('adminHome') }}" class="nav-link">Go to dashboard</a>
                        @else
                            <a href="{{ route('userHome') }}" class="nav-link">Go to dashboard</a>
                    @endif

                        @endauth
                    @else
                        <a href="/login">Login</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="copyright">
                <i class="fa fa-copyright" aria-hidden="true">Copyright By Fredrick Kho (Backend Developer)</i>
                <br>
                <i class="fa fa-copyright" aria-hidden="true">PT Musang - WeaselStore</i>
            </div>
        </div>
    </body>
</html>
