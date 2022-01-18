@extends('layouts.auth.auth')
@section('title') Регистрация @endsection
@section('content')

    @isset($status)
        @if ($status )

            <div class="alert alert-primary" role="alert">
                <a href="{{route('home')}}">  {{$result}} </a>
            </div>
        @else
            <div class="alert alert-danger" role="alert">
                <a href="{{route('home')}}">  {{$result}} </a>
            </div>
        @endif
    @endisset
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Регистрация</b></a>
            </div>
            <div class="card-body">
                <form action="{{ route('register-post') }}" method="post">
                    <div class="input-group mb-3">
                        @csrf
                        <input type="text" class="form-control" placeholder="Логин" name="login" id="login"
                               value="{{ old('login') }}">
                        <div class=" input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('login')
                        <span id="exampleInputEmail1-error" class="error invalid-feedback" style="display: block">
                            {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Email" name="email" id="email"
                               value="{{ old('email') }}">
                        <div class=" input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <span id="exampleInputEmail1-error" class="error invalid-feedback" style="display: block"> {{ $message }}
                </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Пароль" name="password" id="password"
                               value="{{ old('password') }}">
                        <div class=" input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                        <span id="exampleInputEmail1-error" class="error invalid-feedback" style="display: block"> {{ $message }}
        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Повторите пароль"
                               name="repeat_password"
                               id="repeat_password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('repeat_password')
                        <span id="exampleInputEmail1-error" class="error invalid-feedback" style="display: block"> {{ $message }}
        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-7 pull-right">
                            <a class="btn btn-app bg-primary" style="float: left;">
                                <i class="fab fa-vk"></i> ВКонтакте
                            </a>
                            <a class="btn btn-app bg-danger">
                                <i class="fab fa-google-plus mr-2"></i> Google
                            </a>
                        </div>
                        <!-- /.col -->
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary btn-block">Отправить</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                <a href="{{ route('login') }}" class="text-center">У меня есть аккаунт</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
@endsection
