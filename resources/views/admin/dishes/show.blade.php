@extends('layouts.app')

@section('content')

    @include('layouts.partials.dashnav')

    <section id="card-single-item">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center align-items-center">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('storage/' . $dishes->cover)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title text-capitalize">Nome: {{$dishes->name}}</h3>
                            <p class="card-text mb-3">Descrizione:{{$dishes->description}}</p>
                            <p class="card-text mb-3">Ingredienti: {{$dishes->ingredients}}</p>
                            <p class="card-text mb-3">Prezzo: {{$dishes->price}}</p>
                            <a href="{{route('admin.dish.edit', ['dish' => $dishes->slug])}}"
                               class="btn btn-primary">Modifica</a>
                            <form method="POST" class="d-inline-block"
                                  action="{{route('admin.dish.destroy', ['dish' => $dishes->id])}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    Elimina
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

