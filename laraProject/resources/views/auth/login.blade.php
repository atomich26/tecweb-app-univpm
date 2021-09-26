@extends('layouts.root', ['title' => 'Accedi', 'incHeader' => false, 'incFooter' => true, 'adminView' => false])

@section('page-container')
<section class="login-container">
    <div class="row flex-v-center">
        <div class="col" style="margin: 0 250px">
            <div class="login-card">
                <div class="card-header">
                    <h2 class="login-title">Accedi a <br> Electrohm <span>Helpdesk</span></h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user-login') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="username" type="text" placeholder="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Ricordami') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" class="button">
                                    {{ __('Accedi') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <p style="margin-top:20px">Per informazioni sull'accesso ai servizi di helpdesk <a href="{{ route('chi-siamo') }}#lavora-con-noi">clicca qui</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
