@extends('layouts.auth.auth')
@section('title') Войти @endsection
@section('content')

    @if (isset($result))

        <div class="alert alert-danger" role="alert">
            <a href="{{ route('home') }}"> {{ $result }} </a>
        </div>
    @endif

    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Авторизация</b></a>
            </div>
            <div class="card-body">

                <form action="{{ route('login-post') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Логин" name="login" id="login"
                            value="{{ old('login') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('login')
                            <span id="exampleInputEmail1-error" class="error invalid-feedback" style="display: block">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Пароль" id="password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <span id="exampleInputEmail1-error" class="error invalid-feedback" style="display: block">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" {{ old('remember') == 'on' ? 'checked' : '' }}
                                    name="remember">
                                <label for="remember">
                                    Запомнить
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Войти</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <div class="row">
                    <div class="col-7 pull-right">
                        <a class="btn btn-app bg-primary" style="float: left;">
                            <i class="fab fa-vk"></i> ВКонтакте
                        </a>
                        <a class="btn btn-app bg-danger">
                            <i class="fab fa-google-plus mr-2"></i> Google
                        </a>
                    </div>

                </div>



                <!-- /.social-auth-links -->
                <div class="row" style="float: left; ">
                    <p class="mb-1 mr-3">
                        <a href="{{ route('forgot-password') }}">Забыли пароль</a>
                    </p>
                    <p class="mb-0 ">
                        <a href="{{ route('register') }}" class="text-center">Регистрация</a>
                    </p>
                </div>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
@endsection
