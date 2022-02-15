@extends('layouts.app')
@section('content')

<div class="login">
    <h1>Register</h1>

   <form method="POST" action="{{ route('register') }}">
     @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required id="exampleInputEmail1">
    @error('email')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>

    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required id="exampleInputPassword1" aria-describedby="passwordHelp">
    @error('password')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    @enderror
    <div id="passwordHelp" class="form-text">Your password must be 8-20 characters.</div>
    </div>

  <div class="mb-3">
    <label for="password-confirm" class="form-label">Confirm Password</label>
   <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
 </div>


    <div class="mb-3 form-check">
    <a href="{{route("login")}}">You have a account</a>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
    </form>

</div>

@endsection
