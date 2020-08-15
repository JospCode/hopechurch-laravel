@extends('layouts.auths')

@section('content')
<section class="bannerlay">
    <div class="banner-layer">
        <div class="container">
        
            <div class="row justify-content-center">
                <div class="card col-md-4 cardlog">
                    <div class="card-header headcard">
                        <h3>Sign In</h3>
                        <div class="d-flex justify-content-end social_icon iconslog">
                            <span><i class="fa fa-facebook-square"></i></span>
                            <span><i class="fa fa-google-plus-square"></i></span>
                            <span><i class="fa fa-twitter-square"></i></span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="input-group form-group">
                                <div class="input-group-prepend inpgrpr">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Login" required autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend inpgrpr">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Senha" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row align-items-center remember">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn float-right logn_btn">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center links">
                            Não tem uma conta?<a href="{{ route('register') }}">Cadastre-se agora!</a>
                        </div>
                        <div class="d-flex justify-content-center">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Esqueci minha senha?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
@endsection