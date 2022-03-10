@extends('layouts.auth', ['title' => 'Two Factor Challange'])

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>TWO FACTOR CHALLANGE</h4>
        </div>
        <div class="card-body">
            <div class="text-center">
                @if (session('status'))

                    <div class="badge badge-warning">{{ session('status') }}</div>
                    <br>
                @endif
                <form action="{{ url('/two-factor-challenge') }}" method="POST">
                    @csrf
                    <label>Token Code</label>
                    <input type="text" name="code" id="code" value="{{ old('email') }}"
                        class="@error('email') is-invalid @enderror form-control">
                    @error('email')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    <p class="text-gray-600">
                        <i>Atau Anda dapat memasukkan salah satu recovery code.</i>
                    </p>
                    <label>Recovery Code</label>
                    <input type="text" name="recovery_code" id="recovery_code" value="{{ old('recovery_code') }}"
                        class="@error('password') is-invalid @enderror form-control">
                    @error('password')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    <br>
                    <button type="submit" class="btn btn-primary">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
@endsection
