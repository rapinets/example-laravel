@extends('layout')

@section('title', 'Register')

@section('content')

<h1 class="display-4 mb-5">Register</h1>

<form method="POST" action="{{ route('register.process') }}">
  @csrf
  
  <div class="row mb-4">
    <div class="col">
      <input type="text" class="@error('first_name') is-invalid @enderror form-control" id="first_name" name="first_name" placeholder="First name" aria-label="First name">
      @error('first_name')
        <div class="alert">Fill in the field</div>
      @enderror
    </div>
    <div class="col">
      <input type="text" class="@error('last_name') is-invalid @enderror form-control" id="last_name" name="last_name" placeholder="Last name" aria-label="Last name">
      @error('last_name')
        <div class="alert">Fill in the field</div>
      @enderror
    </div>
  </div>

  <div class="row mb-4">
    <div class="col">
      <input type="email" class="@error('email') is-invalid @enderror form-control" id="email" name="email" placeholder="Email" aria-label="Email">
      @error('email')
        <div class="alert">Incorrect email address</div>
      @enderror
    </div>
    <div class="col">
      <input type="email" class="@error('email_confirmation') is-invalid @enderror form-control" id="email_confirmation" name="email_confirmation" placeholder="Email confirmation" aria-label="Email confirmation">
      @error('email_confirmation')
        <div class="alert">email addresses do not match</div>
      @enderror
    </div>
  </div>

  <div class="row">
    <div class="col">
      <input type="password" class="@error('password') is-invalid @enderror form-control" id="password" name="password" placeholder="Password" aria-label="Password">
      @error('password')
        <div class="alert">the password must consist of a min:4 and max:10 characters</div>
      @enderror
    </div>
    <div class="col">
      <input type="password" class="@error('password_confirmation') is-invalid @enderror form-control" id="password_confirmation" name="password_confirmation" placeholder="Password confirmation" aria-label="Password confirmation">
      @error('password_confirmation')
        <div class="alert">passwords do not match</div>
      @enderror
    </div>
  </div>
  
  <button type="submit" class="btn btn-dark mt-4">Save</button>
</form>
    


@endsection