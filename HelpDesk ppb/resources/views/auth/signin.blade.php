@extends("templates.layout")

@section('content')
<style>
    body {
        background-color: #2F4AA3;
        font-family: Arial, sans-serif;
    }


    .login-title {
        text-align: center;
        color: #2F4AA3;
        font-weight: bold;
        margin-bottom: 20px;
        font-size: 24px;
    }

    .btn-primary {
        width: 100%;
        background-color: #2F4AA3;
        border: none;
        border-radius: 10px;
    }

    .btn-primary:hover {
        background-color: #FFFFFF;
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

<div class="login-container">
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
    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">email :</label>
            <input type="email" class="form-control" id="email" name="email" required autofocus>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">password :</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">MASUK</button>
    </form>
    <div class="register-text">
        tidak memiliki akun? <a href="/signup">DAFTAR DISINI</a>
    </div>
</div>
@endsection
