@extends('layouts.app')

@section('content')
    <section id="card-single-item">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                        <div>
                            <img src="https://i.imgur.com/dYcYQ7E.png"/>
                            <div>
                                <img src="{{ $menu->cover }}">
                            </div>
                            <div>
                                <h3>Menu name:{{ $menu->name }}</h3>
                                <p>Description: {{ $menu->description }}</p>
                                <p>Category: {{ $menu->category->name }} </p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
@endsection
