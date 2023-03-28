@extends('admin.layout')

@section('content')

<h1 class="display-4 mb-5">Register</h1>

<form method="post" action="{{ route('register.store') }}">
    @csrf
  
    <div class="row mb-4">
        <div class="col">
            <input type="text" class="form-control" placeholder="First name" aria-label="First name">
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="email" class="form-control" placeholder="Email" aria-label="Email">
        </div>
        <div class="col">
            <input type="password" class="form-control" placeholder="Password" aria-label="Password">
        </div>
    </div>
  
    <button type="submit" class="btn btn-dark mt-4">Save</button>
</form>
    


@endsection