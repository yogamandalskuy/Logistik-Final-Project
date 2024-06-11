@extends('layouts.app')

@section('content')

    <head>
        <style>
            body {
                background: #f7f7f7;
            }

            .card {
                border-radius: 10px;
                border: none;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .card-body {
                padding: 2rem;
            }

            .btn-primary {
                background-color: #0044cc;
                border-color: #0044cc;
            }

            .btn-primary:hover {
                background-color: #0033a0;
                border-color: #0033a0;
            }

            h4 {
                font-weight: 700;
            }

            .text-muted {
                color: #6c757d !important;
            }

            .form-control {
                border-radius: 5px;
            }

            .invalid-feedback {
                font-size: 0.875em;
            }

            .container {
                max-width: 500px;
            }

            .form-floating>.form-control:focus~label {
                color: #0044cc;
            }

            .form-floating>.form-control:not(:placeholder-shown)~label {
                opacity: 0.65;
            }

            .form-floating>.form-control:-webkit-autofill~label {
                opacity: 0.65;
            }

            .form-floating>.form-control:autofill~label {
                opacity: 0.65;
            }
        </style>
    </head>
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 20%">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <h4 class="card-title">Please Login To Use Our Platform</h4>
                            <p class="text-muted">Telkom University Logistik</p>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" placeholder="Enter Email" name="email" value="{{ old('email') }}"
                                    required autocomplete="email" autofocus />
                                <label for="email">{{ __('Email Address') }}</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" placeholder="Enter Password" name="password" required
                                    autocomplete="current-password" />
                                <label for="password">{{ __('Password') }}</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">{{ __('Login') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
@endsection
