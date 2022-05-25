@extends('userPage');
@section("home")
<div class="introduction">
    <div class="intro">
        <div class="intro-text">
            <h1>Welcome </h1>
            <h2>User</h2>
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