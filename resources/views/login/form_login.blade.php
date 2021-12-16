@extends('user.dashboard')
@section('content')
    <main class="login-m">
        @if (session()->get('request_login'))
            <h3 style="color: green">{{ session()->get('request_login') }}</h3>
        @endif
        <div class="login">
            <div class="login-left">
                <div class="login-left-img">
                    <img src="{{ asset('PHP2/Asset/logo.jpeg') }}" alt="">
                </div>
            </div>
            <div class="login-right">
                <form action="{{ route('login.check') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">User name</label>
                        <input type="text" name="username" id="username" placeholder="Enter your user name"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" name="pass" id="pass" placeholder="Enter your password"
                            class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <ul class="mt-3">
                        @if (session()->get('message'))
                            <li style="color: red">{{ session()->get('message') }}</li>

                        @endif
                    </ul>
                </form>
            </div>
        </div>
    </main>
@endsection
