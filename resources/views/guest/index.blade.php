@extends('layouts.home')

@section('title', 'Home')

@section('content')
    <div id="appTwo">
      {{-- @if (Route::has('login')) --}}

            @auth
              <homepage :flag_register="false" :categories="{{$restaurant_categories}}"/>
            {{-- @else --}}

            @else

            <homepage :flag_register="true" :categories="{{$restaurant_categories}}"/>
            {{-- @endif --}}

            @endauth
    </div>
@endsection()
