@extends('layouts.auth', ['title' => 'Register'])

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Register</h4>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="text-center">
                    <div class="badge badge-warning">
                        {{ session('status') }}
                    </div>
                </div>
            @endif
            <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name"
                        tabindex="1" required autofocus>
                    @error('name')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        tabindex="1" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" tabindex="2" required>
                    @error('password')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password_confirmation" class="control-label">Confirm Password</label>
                    </div>
                    <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                        name="password_confirmation" tabindex="2" required>
                    @error('password_confirmation')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Register
                    </button>
                </div>
            </form>
            <p>Silahkan login disini <a href="{{ route('register') }}">Login Account.</p>
        </div>
    </div>
@endsection
