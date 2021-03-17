@extends('layouts.app')

@section('content')

    @include('layouts.partials.dashnav')

    {{-- @if($restaurant->isEmpty()) --}}
        {{-- <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>Devi creare prima un ristorante</h1>
                </div>
            </div>
        </div> --}}
    {{-- @else --}}
        <section id="create-dish">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box-create mb-5">
                            <div class="text-center">
                                <a href="{{route('admin.dish.create')}}" class="btn btn-primary">Crea piatto</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="card-dash-user">
            <div class="container">
                <div class="row justify-content-center">
                    @foreach($dishes as $dish)
                        <div class="col-lg-4">
                            <div class="card mb-3">
                            <img src="{{asset('storage/' . $dish->cover)}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h3 class="card-title text-capitalize">{{$dish->name}}</h3>
                                <p class="card-text mb-3">{{$dish->description}}</p>
                                <a href="{{route('admin.dish.edit', ['dish' => $dish->slug])}}" class="btn btn-primary">Modifica</a>
                                <a href="{{route('admin.dish.show', ['dish' => $dish->slug])}}" class="btn btn-warning">Mostra</a>
                                <form method="POST" class="d-inline-block"
                                      action="{{route('admin.dish.destroy', ['dish' => $dish->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        Elimina
                                    </button>
                                </form>
                            </div>
                        </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    {{-- @endif --}}
@endsection
