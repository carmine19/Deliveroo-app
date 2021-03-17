@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 mx-auto">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Edit Menu: {{ $menu->name }} </h1>
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
                <form action="{{ route('admin.menu.update', ['restaurant' => $restaurant->slug, 'menu' => $menu->slug]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Menu name</label>
                        <input type="text" name="name" class="form-control"
                               placeholder="Menu name" value="{{ old('name', $menu->name) }}" maxlength="50" minlength="1" required autocomplete="on">
                    </div>

                    <div class="form-group">
                        <p>Menu cover image</p>
                        @if ($menu->cover)
                            <img src="{{ asset('storage/' . $menu->cover) }}" alt="">
                        @endif
                        <label class="d-block">Upload new image</label>
                        <input type="file" class="form-control-file" name="cover">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="address" class="form-control" rows="10" placeholder="Address" autocomplete="on" required> {{ old('description', $menu->description) }} </textarea>
                    </div>

                    <div class="form-group">
                        <label class="d-block">Menu category</label>
                        <select name="menu_category_id">
                            <option value="defaul">-- choose category --</option>
                            @foreach ($categories as $category)
                                @if (old('menu_category_id') == null)
                                    <option value=" {{ $category->id }} " {{ $menu->menu_category_id ==  $category->id ? 'selected' : ''}}> {{ $category->name }} </option>
                                @else
                                    <option value=" {{ $category->id }} " {{ old('menu_category_id') ==  $category->id ? 'selected' : ''}}> {{ $category->name }} </option>
                                @endif
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
