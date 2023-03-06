

@extends('frontend.templates.eshopper')

@section('content')

<section>
    <div class="container">
        <div class="row">

            <h2 class="title text-center">SILAHKAN REGISTRASI</h2>
            <div class="col-sm-6 col-sm-offset-3">
                {{--  <div class="signup-form"><!--sign up form-->  --}}
                    <div class="login-form"><!--sign up form-->

                        <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div>
                            <input type="text" class="@error('name') invalid @enderror" name="name" value="{{ old('name') }}"
                             placeholder="Name">
                                @error('name')
                                    <span class="helper-text" data-error="{{ $message }}"></span>
                                @enderror
                        </div>

                        <div>
                            <input type="email" class="validate @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                            placeholder="Email Address">
                                @error('email')
                                <span class="helper-text" data-error="{{ $message }}"></span>
                                @enderror
                        </div>

                        <div>
                            <input type="password" class="@error('password') invalid @enderror" name="password" value=""
                            placeholder="Password">
                                @error('password')
                                <span class="helper-text" data-error="{{ $message }}"></span>
                                @enderror
                        </div>

                        <div>
                            <input type="password" class="@error('password_confirmation') invalid @enderror" name="password_confirmation" value=""
                            placeholder="Passwor Confirmation">
                                @error('password_confirmation')
                                <span class="helper-text" data-error="{{ $message->error }}"> </span>
                                @enderror
                        </div>
                        <span>
                            <input type="checkbox" class="checkbox">
                            Keep me signed in
                        </span>
                        <button type="submit" name="" value="Register" class="btn btn-default">Signup</button>
                    </form>
                </div><!--/sign up form-->
            </div>


        </div>
    </div>

@endsection












