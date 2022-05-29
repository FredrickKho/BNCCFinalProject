<html>
    <head>
        <title>User - WeaselStore</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ URL::asset("css/userPage.css") }}">
        <link rel="stylesheet" href="{{ URL::asset("css/userViewProduct.css") }}">
        <link rel="stylesheet" href="{{ URL::asset('css/userInvoice.css') }}">

    </head>
    <body>
      <div class="header">
        <div class="logo">
            <img src="{{ URL::asset('/images/logo.png') }}" alt="" >
        </div>
        <div class="menu">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto option">
                      <a href="{{ route('userHome') }}" class= "nav-link">Home</a>
                      <a href="{{ route('userViewProduct') }}" class= "nav-link">Lihat Product</a>
                      <a href="{{ route('userInvoice') }}" class= "nav-link">Keranjang</a>
                    </ul>
                 </div>
                 <form method="POST" action="{{ route('logout') }}" class="navbar-nav mr-auto option">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" class="nav-link" >
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
              </nav>
          </div>
        </div>
    @yield("home")
    @yield("viewProduct")
    @yield("Invoice")
    <div class="footer">
      <div class="copyright">
          <i class="fa fa-copyright" aria-hidden="true">Copyright By Fredrick Kho (Backend Developer)</i>
          <br>
          <i class="fa fa-copyright" aria-hidden="true">PT Musang - WeaselStore</i>
      </div>
    </div>
  </body>
</html>