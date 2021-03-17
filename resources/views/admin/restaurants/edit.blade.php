@extends('layouts.app')

@section('content')

     @include('layouts.partials.dashnav')

    <div class="container" id="register-dash-user">
        <div class="row justify-content-center">
            <div class="col-lg-8 mx-auto">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Modifica Ristorante: {{ $restaurant->name }} </h1>
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
                <form action="{{ route('admin.restaurant.update', ['restaurant' => $restaurant->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nome Ristorante</label>
                        <input type="text" name="name" class="form-control"
                               placeholder="Restaurant name" value="{{ old('name', $restaurant->name) }}" maxlength="50" minlength="1" required autocomplete="on">
                    </div>

                    <div class="form-group">
                        <p>Immagine Ristorante</p>
                        @if ($restaurant->cover)
                            <img src="{{ asset('storage/' . $restaurant->cover) }}" alt="">
                        @endif
                        <label class="d-block">Upload new image</label>
                        <input type="file" class="form-control-file" name="cover">
                    </div>

                    <div class="form-group">
                        <label>Indirizzo</label>
                        <input type="text" name="address" class="form-control"
                               maxlength="50" minlength="1" autocomplete="on"
                               placeholder="Address" value="{{ old('address', $restaurant->address) }}">
                    </div>

                    <div class="form-group">
                        <label>Telefono</label>
                        <input type="number" name="phone" class="form-control"
                               maxlength="20" minlength="1" autocomplete="on"
                               placeholder="Phone" value="{{ old('phone', $restaurant->phone) }}">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control"
                               placeholder="Email" value="{{ old('email', $restaurant->email) }}" minlength="1">
                    </div>

                    <div class="form-group">
                        <label class="d-block">Categoria Ristorante</label>
                            @foreach ($catogories as $category)
                                  @if ($category->name != 'tutte')
                                    @if (old('restaurant_category_id') === null)
                                      <input type="checkbox" name="restaurant_category_id[]" value="{{ $category->id }}" {{
                                        in_array($category->id, $restaurant_categories) ? 'checked' : ''}}>
                                      @else
                                        <input type="checkbox" name="restaurant_category_id[]" value="{{ $category->id }}" {{
                                          in_array($category->id, old('restaurant_category_id')) ? 'checked' : ''}}>
                                        @endif
                                        <label class="mr-2" for="{{ $category->id }}"> {{ $category->name }} </label>
                                  @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            Salva Ristorante
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
