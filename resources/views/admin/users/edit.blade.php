@extends('layouts.app')

@section('content')

    @include('layouts.partials.dashnaUser')

    <div class="container mt-5" id="register-dash-user">
        <div class="row justify-content-center">
            <div class="col-lg-8 mx-auto">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Modifica utente: {{ $users->owner_name }}</h1>
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

                <form action="{{route('admin.user.update', ['user' => $users->id])}}" method="post"
                      enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validation-tooltip-01">Nome Azienda</label>
                            <input type="text" class="form-control" id="validation-tooltip-01" name="company_name"
                                   value="{{ old('company_name', $users->company_name) }}" required placeholder="Company Name" maxlength="50"
                                   minlength="1" autocomplete="on">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                            <div class="invalid-tooltip">
                                @error('company_name')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validation-tooltip-02">Nome Proprietario</label>
                            <input type="text" class="form-control" id="validation-tooltip-02" name="owner_name"
                                   value="{{ old('owner_name', $users->owner_name) }}" required placeholder="Owner Name" maxlength="50"
                                   minlength="1" autocomplete="on">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                            <div class="invalid-tooltip">
                                @error('owner_name')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validation-tooltip-03">Cognome Proprietario</label>
                            <input type="text" class="form-control" id="validation-tooltip-03" name="owner_lastname"
                                   value="{{ old('owner_lastname', $users->owner_lastname) }}" required placeholder="Owner lastname"
                                   maxlength="50" minlength="1" autocomplete="on">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                            <div class="invalid-tooltip">
                                @error('owner_lastname')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validation-tooltip-04">Città</label>
                            <input type="text" class="form-control" id="validation-tooltip-04" name="city"
                                   value="{{ old('city', $users->city) }}" required placeholder="City" maxlength="50" minlength="1"
                                   autocomplete="on">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                            <div class="invalid-tooltip">
                                @error('city')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validation-tooltip-05">CAP</label>
                            <input type="text" class="form-control" id="validation-tooltip-05" value="{{ old('cap', $users->cap) }}"
                                   name="cap" required placeholder="CAP" maxlength="10" minlength="1" autocomplete="on">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                            <div class="invalid-tooltip">
                                @error('cap')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validation-tooltip-06">Telefono</label>
                            <input type="text" class="form-control" id="validation-tooltip-06"
                                   value="{{ old('phone', $users->phone) }}" name="phone" required placeholder="Phone number"
                                   maxlength="30" minlength="1" autocomplete="on">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                            <div class="invalid-tooltip">
                                @error('phone')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-8 mb-3">
                            <label for="validation-tooltip-07">Indirizzo</label>
                            <input type="text" class="form-control" id="validation-tooltip-07"
                                   value="{{ old('address', $users->address) }}" name="address" required placeholder="Address"
                                   maxlength="50" minlength="1" autocomplete="on">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                            <div class="invalid-tooltip">
                                @error('address')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validation-tooltip-08">Data di nascita</label>
                            <input type="date" class="form-control" id="validation-tooltip-08" value="{{ old('dob', $users->dob) }}"
                                   name="dob" required placeholder="Date of Birth" autocomplete="on">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                            <div class="invalid-tooltip">
                                @error('dob')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-8 mb-3">
                            <label for="validation-tooltip-09">IBAN</label>
                            <input type="text" class="form-control" id="validation-tooltip-09" value="{{ old('iban', $users->iban) }}"
                                   name="iban" required placeholder="IBAN" maxlength="50" minlength="1"
                                   autocomplete="on">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                            <div class="invalid-tooltip">
                                @error('iban')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validation-tooltip-10">P.IVA</label>
                            <input type="text" class="form-control" id="validation-tooltip-10" value="{{ old('piva', $users->piva) }}"
                                   name="piva" required placeholder="P.IVA" maxlength="11" minlength="1">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                            <div class="invalid-tooltip">
                                @error('piva')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validation-tooltip-1">Email</label>
                            <input type="text" class="form-control" id="validation-tooltip-11"
                                   value="{{ old('email', $users->email) }}" name="email"  placeholder="Email" maxlength="50"
                                   minlength="1" autocomplete="on">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                            <div class="invalid-tooltip">
                                @error('email')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validation-tooltip-12">Password</label>
                            <input type="password" class="form-control" id="validation-tooltip-12" name="password"
                                   required placeholder="Password" maxlength="64" minlength="1">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                            <div class="invalid-tooltip">
                                @error('password')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validation-tooltip-13">Conferma Password</label>
                            <input type="password" class="form-control" id="validation-tooltip-13"
                                   name="password_confirmation" required placeholder="Confirm password" maxlength="64"
                                   minlength="1">
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                            <div class="invalid-tooltip">
                                @error('password')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            Salva modifiche
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
