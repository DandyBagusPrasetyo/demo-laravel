@extends('layouts.auth', ['title' => 'Confirm Password'])

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Confirm Password</h4>
        </div>
        <div class="card-body">
            <div class="text-center">
                @if (session('status'))

                    <div class="badge badge-warning">{{ session('status') }}</div>
                    <br>
                @endif
                <form action="{{ route('password.confirm') }}" method="POST">
                    @csrf
                    <input type="password" name="password" id="password"
                        class="@error('password') is-invalid @enderror form-control">
                    @error('password')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    <br>
                    <button type="submit" class="btn btn-primary">CONFIRM PASSWORD</button>
                </form>
            </div>
        </div>
    </div>
@endsection
