@extends('layouts.auth', ['title' => 'Forgot Password'])

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Forgot Password</h4>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="text-center">
                    <div class="badge badge-warning">
                        {{ session('status') }}
                    </div>
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" id="email" type="email" class="@error('email') is-invalid @enderror form-control">
                    @error('email')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        FORGOT PASSWORD
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
