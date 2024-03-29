@extends("adminPage")
@section("home")
<div class="introduction">
    <div class="intro">
        <div class="intro-text">
            <h1>Welcome Admin</h1>
            <h2>Create, Read, Delete and Update Product</h2>
        </div>
        <form method="POST" action="{{ route('logout') }}" class="form-logout">
          @csrf
          <x-dropdown-link :href="route('logout')"
                  onclick="event.preventDefault();
                              this.closest('form').submit();" class="logout">
              {{ __('Log Out') }}
          </x-dropdown-link>
      </form>
    </div>
  </div>
@endsection