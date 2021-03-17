@extends('layouts.app')

@section('content')
    @include('layouts.partials.dashnav')
    <section id="card-single-item">
        <div class="container">
            <div class="row">

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="box-title text-center">
                                    <h1>Azienda: <span class="text-capitalize">{{$restaurant->name}}</span></h1>
                                </div>
                                <div class="box-content">
                                    <div class="list-group">
                                        <p href="#" class="list-group-item active">
                                            <strong>Nome:</strong> {{$restaurant->name}}</p>
                                        <p href="#" class="list-group-item">
                                            <strong>Indirizzo:</strong> {{$restaurant->address}}</p>
                                        <p href="#" class="list-group-item">
                                            <strong>Telefono:</strong> {{$restaurant->phone}}</p>
                                        <p href="#" class="list-group-item">
                                            <strong>Email:</strong> {{$restaurant->email}}</p>
                                    </div>
                                    <div class="box-btn mt-3">
                                        <a href="{{route('admin.restaurant.edit', ['restaurant' => $restaurant->slug])}}"
                                           class="btn btn-warning">Modifica</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </section>
@endsection
