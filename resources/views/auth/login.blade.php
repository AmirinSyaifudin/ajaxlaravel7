@extends('frontend.templates.eshopper')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <h2 class="title text-center">LOGIN</h2>

            <div class="col-sm-6 col-sm-offset-3">
                <div class="login-form"><!--login form-->


                    <form method="POST" action="{{ route('login') }}">
                        @csrf

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
                        <span>
                            <input type="checkbox" class="checkbox">
                            Keep me signed in
                        </span>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
            </div>



        </div>
    </div>

@endsection
