@extends('layouts.app')

@section('content')

    <section id="create-dish">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box-create">
                        <div>
                            <a href="{{ route('admin.menu.create', ['restaurant' => $restaurant->slug]) }}">
                                Create Menu
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="dash-restaurant-cards-container" class="p-5">
        <div class="container-fluid">
            <div class="row">
                @foreach($restaurant->menus as $menu)
                    <div class="col-lg-12" id="dash-restaurant-card">
                        <div>

                            {{-- card-left --}}
                            <div id="dash-restaurant-card-left">
                                {{-- card-top-left controls --}}
                                <div id="dash-restaurant-card-top-left">
                                    <div id="dash-restaurant-cover">
                                        @if ($menu->cover)
                                            <img src="{{ asset('storage/' . $menu->cover) }}">

                                             @else
                                                 <img src="{{ asset('general/no_cover.png') }}"/>
                                        @endif
                                    </div>
                                    <div id="dash-restaurant-card-dectails">
                                        <h2>Name: {{ $menu->name }}</h2>
                                        <p>Description: {{ $menu->description }} </p>
                                        <p>Category: {{ $menu->category->name }} </p>
                                    </div>
                                </div>
                                {{-- -- --}}

                                {{-- card-bottom-left crud controls --}}
                                <div id="dash-restaurant-crud-controls">
                                    <div>
                                        <a href="{{ route('admin.menu.edit', ['restaurant' => $restaurant->slug, 'menu' => $menu->slug]) }}">
                                            <span class="far fa-edit"></span>
                                            Edit
                                        </a>
                                    </div>
                                    <div>
                                        <form method="POST"
                                              action="{{ route('admin.menu.destroy', ['restaurant' => $restaurant->slug, 'menu' => $menu->slug]) }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="mx-3">
                                                <span class="fas fa-eraser"></span>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                    <div>
                                        <a href="{{ route('admin.menu.show', ['restaurant' => $restaurant->slug, 'menu' => $menu->slug]) }}">
                                            <span class="far fa-eye"></span>
                                            View
                                        </a>
                                    </div>
                                </div>
                                {{-- -- --}}
                            </div>
                            {{-- -- --}}

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
