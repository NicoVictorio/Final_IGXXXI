@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <body>
        <div class="container">
            {{-- Logo IG --}}
            <div class="row">
                <div class="col-12 mt-3 d-flex flex-wrap justify-content-center">
                    <img class="fix-image headline" src="{{ asset('assets') }}/ig-logo.png"
                        style="max-height: 250px;">
                </div>
            </div>
            {{-- End Of Logo IG --}}
            <br><br>
            <div class="row justify-content-center">
                <div class="login-box">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h2>Login</h2>
                        @if ($errors->any())
                            <div class="alert-box">
                                <div class="alert alert-danger" role="alert">
                                    <p class="mb-0"><strong>Oops!</strong></p>
                                    @foreach ($errors->all() as $error)
                                        <p class="mt-0 mb-1 fs-5">{{ $error }}</p>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="input-box">
                            <span class="icon"><ion-icon name="mail"></ion-icon></span>
                            <input name="username" required>
                            <label>Username</label>
                        </div>
                        <div class="input-box">
                            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                            <input type="password" name="password" required>
                            <label>Password</label>
                        </div>
                        <button type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </body>

@endsection
