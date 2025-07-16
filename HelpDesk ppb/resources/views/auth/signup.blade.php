@extends('templates.layout')

@section('content')
    <style>
        body {
            background-color: #2F4AA3;
            font-family: Arial, sans-serif;
        }



        .btn-primary {
            width: 100%;
            background-color: #2F4AA3;
            border: none;
            border-radius: 10px;
        }

        .btn-primary:hover {
            background-color: #1e3577;
        }

        .register-text {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .register-text a {
            color: #2F4AA3;
            text-decoration: none;
        }

        .register-text a:hover {
            text-decoration: underline;
        }
    </style>
    @if ($errors->any())
        <div class="alert alert-danger w-100">
            <ul style="margin-bottom:0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success w-100">{{ session('success') }}</div>
    @endif
    <div class="login-container">
        <form method="POST" action="{{ route('register.post') }}">
            @csrf
            <label for="exampleInputEmail1" class="form-label">email :</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            <div class="mb-3">
                <label for="role" class="form-label">role :</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="mahasiswa">mahasiswa</option>
                    <option value="admin">admin</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">password :</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputConfirmPassword" class="form-label">konfirmasi :</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">DAFTAR</button>
        </form>
        <div class="register-text">
            sudah memiliki? <a href="/">LOGIN</a>
        </div>
    </div>
@endsection
