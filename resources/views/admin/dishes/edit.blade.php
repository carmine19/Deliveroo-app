@extends('layouts.app')

@section('content')


    @include('layouts.partials.dashnav')


    <div class="container" id="register-dash-user">
        <div class="row justify-content-center">
            <div class="col-lg-8 mx-auto">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Modifica piatto: {{ $dishes->name }}</h1>
                </div>
                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <form action="{{route('admin.dish.update', ['dish' => $dishes->id])}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Titolo</label>
                        <input type="text" name="name" class="form-control"
                               placeholder="Inserisci il titolo" value="{{ old('name', $dishes->name) }}" required>
                    </div>

                    <div class="form-group">
                        <p>Store cover image</p>
                        @if ($dishes->cover)
                            <img src="{{ asset('storage/' . $dishes->cover) }}" alt="{{$dishes->name}}">
                        @endif
                        <label class="d-block">Upload new image</label>
                        <input type="file" class="form-control-file" name="cover">
                    </div>

                    <div class="form-group">
                        <label>Descrizione</label>
                        <textarea name="description" class="form-control"
                                  rows="10" placeholder="Inizia a scrivere qualcosa..."
                                  autocomplete="on"
                                  required>{{ old('description', $dishes->description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Ingredienti</label>
                        <input type="text" name="ingredients" class="form-control"
                               maxlength="50" minlength="1" autocomplete="on"
                               placeholder="Ingredienti..." value="{{ old('ingredients', $dishes->ingredients) }}">
                    </div>


                    <div class="form-group">
                        <label>Categoria</label>
                        <select class="form-control" name="dish_category_id">
                            <option value="">-- seleziona categoria --</option>
                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->id }}" {{ old('dish_category_id', $category->id) == $dishes->dish_category_id ? 'selected=selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                      <div class="form-group">
                        <label>visibilità</label>
                        <select class="form-control" name="visibility">
                            <option
                                value="1" {{ $dishes->visibility == true ? 'selected=selected' : '' }}>
                                visibile
                            </option>
                            <option
                                value="0" {{ $dishes->visibility == false ? 'selected=selected' : '' }} >
                                non visibile
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Prezzo</label>
                        <input type="text" name="price" class="form-control"
                               placeholder="Prezzo..." value="{{ old('price', $dishes->price) }}" maxlength="6" minlength="1">
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            Salva piatto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

