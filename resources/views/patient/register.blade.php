@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register as a patient</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }} *</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }} *</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }} *</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }} *</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">Gender *</label>

                            <div class="col-md-6">
                                <select name="gender" id="gender" class="form-select" required>
                                    <option value="-1" disabled {{ old('gender') == -1 ?'selected':'' }}>Select Your Gender</option>
                                    <option value="1" {{ old('gender') == 1 ?'selected':'' }}>Male</option>
                                    <option value="2" {{ old('gender') == 2 ?'selected':'' }}>Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="birth_date" class="col-md-4 col-form-label text-md-end">Birth date *</label>

                            <div class="col-md-6">
                                <input id="birth_date" type="date" class="form-control" value="{{ old('birth_date') }}" name="birth_date" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">Phone *</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" value="{{ old('phone') }}" class="form-control" name="phone" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="another_phone" class="col-md-4 col-form-label text-md-end">Another Phone</label>

                            <div class="col-md-6">
                                <input id="another_phone" type="text" value="{{ old('another_phone') }}" class="form-control" name="another_phone">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="national_id" class="col-md-4 col-form-label text-md-end">National ID *</label>

                            <div class="col-md-6">
                                <input id="national_id" type="text" class="form-control" value="{{ old('national_id') }}" name="national_id" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="occupation" class="col-md-4 col-form-label text-md-end">Occupation *</label>

                            <div class="col-md-6">
                                <input id="occupation" type="text" class="form-control" value="{{ old('occupation') }}" name="occupation" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="company_name" class="col-md-4 col-form-label text-md-end">Company Name *</label>

                            <div class="col-md-6">
                                <input id="company_name" type="text" class="form-control" value="{{ old('company_name') }}" name="company_name" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="is_insured" class="col-md-4 col-form-label text-md-end">Insured?</label>

                            <div class="col-md-6">
                                <select name="is_insured" onchange="check_div()" id="is_insured" class="form-select">
                                    <option value="1" {{ old('is_insured') == 1 ? 'selected':'' }}>Yes</option>
                                    <option value="0" {{ old('is_insured') != 1 ? 'selected':'' }}>No</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3" id="insurance_provider_div">
                            <label for="insurance_provider" class="col-md-4 col-form-label text-md-end">Insurance Provider *</label>

                            <div class="col-md-6">
                                <input id="insurance_provider" type="text" class="form-control" value="{{ old('insurance_provider') }}" name="insurance_provider">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('after-scripts')
    <script>
        insurance_provider_div.style.visibility = "hidden";

        function check_div(){
            var insurance_provider_div = document.getElementById("insurance_provider_div");
            var select = document.getElementById('is_insured');
            var is_insured = select.options[select.selectedIndex].value;

            if (is_insured == 0)
                insurance_provider_div.style.visibility = "hidden";
            else
                insurance_provider_div.style.visibility = "visible";
        }
    </script>
@endsection
