@extends('layouts.app')

@section('content')

    @include('layouts.partials.dashnaUser')

    <section id="user-data">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto mt-5">
                    <div class="box-title text-center">
                        <h1>Azienda:{{$users->company_name}}</h1>
                    </div>
                    <div class="box-content">
                        <div class="list-group">
                            <p href="#" class="list-group-item active"><strong>Nome Proprietario:</strong> {{$users->owner_name}}</p>
                            <p href="#" class="list-group-item"><strong>Cognome Proprietario:</strong> {{$users->owner_lastname}}</p>
                            <p href="#" class="list-group-item"><strong>Città:</strong> {{$users->city}}</p>
                            <p href="#" class="list-group-item"><strong>Cap:</strong> {{$users->cap}}</p>
                            <p href="#" class="list-group-item"><strong>Telefono:</strong> {{$users->phone}}</p>
                            <p href="#" class="list-group-item"><strong>Indirizzo:</strong> {{$users->address}}</p>
                            <p href="#" class="list-group-item"><strong>Data di nascita:</strong> {{$users->dob}}</p>
                            <p href="#" class="list-group-item"><strong>Piva:</strong> {{$users->piva}}</p>
                            <p href="#" class="list-group-item"><strong>IBAN:</strong> {{$users->iban}}</p>
                            <p href="#" class="list-group-item"><strong>Email:</strong> {{$users->email}}</p>
                        </div>
                        <div class="box-btn mt-3">
                            <a href="{{route('admin.user.edit', ['user' => $users->id])}}" class="btn btn-warning">Modifica</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
