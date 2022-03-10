@extends('layouts.auth', ['title' => 'Reset Password'])

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Reset Password</h4>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="text-center">
                    <div class="badge badge-warning">
                        {{ session('status') }}
                    </div>
                </div>
            @endif
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="@error('email') is-invalid @enderror form-control" name="email"
                        value="{{ $request->email ?? old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input id="password" type="password" class="@error('password') is-invalid @enderror form-control"
                        name=" password">
                    @error('password')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" type="password"
                        class="@error('password') is-invalid @enderror form-control" name="password_confirmation">
                    @error('password')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        UPDATE PASSWORD
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
