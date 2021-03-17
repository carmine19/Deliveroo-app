@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 mx-auto">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Create Menu</h1>
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
                <form action="{{ route('admin.menu.store', ['restaurant' => $restaurant->slug]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label>Menu name</label>
                        <input type="text" name="name" class="form-control"
                               placeholder="Menu name" value="{{ old('name') }}" maxlength="50" minlength="1" required autocomplete="on">
                    </div>

                    <div class="form-group">
                        <p>Menu cover image</p>
                        <img class="w-25" src="{{ asset('images/general/no_cover.png') }}" alt="no cover">
                        <label class="d-block">Upload image</label>
                        <input type="file" class="form-control-file" name="cover">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="10" placeholder="Description" autocomplete="on" required> {{ old('description') }} </textarea>
                    </div>

                    <div class="form-group">
                        <label class="d-block">Menu category</label>
                        <select name="menu_category_id">
                            <option value="defaul">-- choose category --</option>
                            @foreach ($categories as $category)
                            <option value=" {{ old('menu_category_id', $category->id) }} " {{ old('menu_category_id') ==  $category->id ? 'selected' : ''}}> {{ $category->name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            Save menu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
