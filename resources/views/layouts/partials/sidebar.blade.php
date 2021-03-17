{{-- Descrizione -- Bello (da completare per il 16/02 sia HTML che CSS che JS) --}}
{{-- Da completare la sidebar verticale Publica sia chiusa che aperta con interazione la JS --}}


<div class="sidebar-top">
  {{--<div class="close-sidebar">
    <i class="fas fa-times"></i>
  </div>--}}
  <div class="sidebar-link">
    <div class="hamburger-button">
      <i class="fas fa-bars"></i>
    </div>
    <ul>
      <li><a href="{{ route('home') }}"><i class="icon fas fa-home"></i><p class="text">Homepage</p></a></li>
      <li><a href="{{ route('contacts') }}"><i class="icon far fa-envelope"></i><p class="text">Contattaci</p></a></li>

      @if (Route::has('login'))
        @auth
          <li><a href="{{ url('/admin/user') }}"><i class="icon fas fa-user"></i> <p class="text">{{Auth::user()->company_name}}</p></a></li>
          <li><a href="{{ route('login') }}"><i class="icon fas fa-qrcode"></i> <p class="text">Dashboard</p></a></li>
          <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="icon fas fa-sign-out-alt"></i><p class="text">LogOut</p></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
           </form>
        </li>
       @else
         @if (Route::has('register'))
           <li><a href="{{ route('register') }}"><i class="icon fas fa-user-plus"></i><p class="text">Registrati</p></a></li>

         @endif
        <li><a href="{{ route('login') }}"><i class="icon fas fa-sign-in-alt"></i><p class="text">LogIn</p></a></li>
        @endauth
      @endif
    </ul>
  </div>

</div>
