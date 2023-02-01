@extends('layouts.app')

@section('content')
                {{-- <div class="card-header">{{ __('Login') }}</div> --}}

                <div class="card p-2 bg-light text-dark" >
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="row mb-3">
                            <h2 class="text-center bg-success rounded">Login</h2>
                            <label for="username" class="col-md-4 col-form-label">{{ __('Username :') }}</label>

                            <div class="col-md-12">
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <p class="text-danger m-0 p-0 mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label">{{ __('Password :') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
</div>
@endsection
