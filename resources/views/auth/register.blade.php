@extends('layouts.app2')

@section('content')
    <div id="register_page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>{{ __('Register') }}</h2></div>

                    {{-- Per far funzionare i tooltips è necessario installare Popper - https://popper.js.org/ --}}
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
                            @csrf
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
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validation-tooltip-01">Company Name</label>
                                    <input type="text" class="form-control" id="validation-tooltip-01"
                                           name="company_name" value="{{ old('company_name') }}" required
                                           placeholder="Company Name" maxlength="50" minlength="1" autocomplete="on">
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
                                    <label for="validation-tooltip-02">Owner name</label>
                                    <input type="text" class="form-control" id="validation-tooltip-02" name="owner_name"
                                           value="{{ old('owner_name') }}" required placeholder="Owner Name"
                                           maxlength="50" minlength="1" autocomplete="on">
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
                                    <label for="validation-tooltip-03">Owner lastname</label>
                                    <input type="text" class="form-control" id="validation-tooltip-03"
                                           name="owner_lastname" value="{{ old('owner_lastname') }}" required
                                           placeholder="Owner lastname" maxlength="50" minlength="1" autocomplete="on">
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
                                    <label for="validation-tooltip-04">City</label>
                                    <input type="text" class="form-control" id="validation-tooltip-04" name="city"
                                           value="{{ old('city') }}" required placeholder="City" maxlength="50"
                                           minlength="1" autocomplete="on">
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
                                    <input type="text" class="form-control" id="validation-tooltip-05"
                                           value="{{ old('cap') }}" name="cap" required placeholder="CAP" maxlength="10"
                                           minlength="1" autocomplete="on">
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
                                    <label for="validation-tooltip-06">Phone number</label>
                                    <input type="number" class="form-control" id="validation-tooltip-06"
                                           value="{{ old('phone') }}" name="phone" required placeholder="Phone number"
                                           maxlength="15" minlength="1" autocomplete="on">
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
                                    <label for="validation-tooltip-07">Address</label>
                                    <input type="text" class="form-control" id="validation-tooltip-07"
                                           value="{{ old('address') }}" name="address" required placeholder="Address"
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
                                    <label for="validation-tooltip-08">Date of Birth</label>
                                    <input type="date" class="form-control" id="validation-tooltip-08"
                                           value="{{ old('dob') }}" name="dob" required placeholder="Date of Birth"
                                           autocomplete="on">
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
                                    <input type="text" class="form-control" id="validation-tooltip-09"
                                           value="{{ old('iban') }}" name="iban" required placeholder="IBAN"
                                           maxlength="50" minlength="1" autocomplete="on">
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
                                    <input type="text" class="form-control" id="validation-tooltip-10"
                                           value="{{ old('piva') }}" name="piva" required placeholder="P.IVA"
                                           maxlength="11" minlength="1">
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
                                    <input type="email" class="form-control" id="validation-tooltip-11"
                                           value="{{ old('email') }}" name="email" required placeholder="Email"
                                           maxlength="50" minlength="1" autocomplete="on">
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
                                    <input type="password" class="form-control" id="validation-tooltip-12"
                                           name="password" required placeholder="Password" maxlength="64" minlength="4">
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
                                    <label for="validation-tooltip-13">Confirm Password</label>
                                    <input type="password" class="form-control" id="validation-tooltip-13"
                                           name="password_confirmation" required placeholder="Confirm password"
                                           maxlength="64" minlength="4">
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

                            <div class="form-group row mb-0 d-flex justify-content-end mr-1">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                    </div>

                    {{-- <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="company_name" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>

                                <div class="col-md-6">
                                    <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('company_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="owner_name" class="col-md-4 col-form-label text-md-right">{{ __('Owner Name') }}</label>

                                <div class="col-md-6">
                                    <input id="owner_name" type="text" class="form-control @error('owner_name') is-invalid @enderror" name="owner_name" value="{{ old('owner_name') }}" required autocomplete="owner name" autofocus>

                                    @error('owner_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="owner_lastname" class="col-md-4 col-form-label text-md-right">{{ __('Owner Lastname') }}</label>

                                <div class="col-md-6">
                                    <input id="owner_lastname" type="text" class="form-control @error('owner_lastname') is-invalid @enderror" name="owner_lastname" value="{{ old('owner_lastname') }}" required autocomplete="owner lastname" autofocus>

                                    @error('owner_lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="CAP" class="col-md-4 col-form-label text-md-right">{{ __('CAP') }}</label>

                                <div class="col-md-6">
                                    <input id="CAP" type="text" class="form-control @error('CAP') is-invalid @enderror" name="cap" value="{{ old('CAP') }}" required autocomplete="CAP" autofocus>

                                    @error('CAP')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                                <div class="col-md-6">
                                    <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>

                                    @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="piva" class="col-md-4 col-form-label text-md-right">{{ __('P.IVA') }}</label>

                                <div class="col-md-6">
                                    <input id="piva" type="text" class="form-control @error('piva') is-invalid @enderror" name="piva" value="{{ old('piva') }}" required autocomplete="piva" autofocus>

                                    @error('piva')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="iban" class="col-md-4 col-form-label text-md-right">{{ __('IBAN') }}</label>

                                <div class="col-md-6">
                                    <input id="iban" type="text" class="form-control @error('iban') is-invalid @enderror" name="iban" value="{{ old('iban') }}" required autocomplete="iban" autofocus>

                                    @error('iban')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form> --}}
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
