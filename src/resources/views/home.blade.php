{{-- use Illuminate/Support/Facades/Auth; --}}

@component('layouts.master')
  <div id="content_container">
    <section id="user_info">
      <div class="">
        @auth
        <div id="auth-user-home">
          <img src="#" alt="">
          <div class="name-and-club-text">
            <span>@php
              $user = Auth::user()['name'];
              echo $user;
            @endphp</span>
            <h4>Mornington Roslyn</h4>
          </div>
          {{-- <a href="{{ route('logout') }}" class="dotted">Logout</a> --}}
          <form action="/logout" method="POST">
            @csrf
            <input type="submit" value="Logout">
          </form>
        </div>
        @else
          <div id="auth-prompt">
            <div>
            <a href="{{ route('login') }}" class="">Login</a>
            </div>
            @if (Route::has('register'))
              <div>
                <a href="{{ route('register') }}" class="">Register</a>
              </div>
            @endif
          </div>
        @endauth
      </div>
    </section>
    <section id="item_list">
      @include('components.listings')
    </section>
  </div>
@endcomponent