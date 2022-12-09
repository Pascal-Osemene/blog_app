
@extends('layouts.auth')

@section('content')

<form action="{{route('register')}}" method="POST">
  @csrf
    <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please Register</h1>

    <x-errors />

    <div class="form-floating">
        <input value="{{old('name')}}" name="name" type="text" class="form-control" id="name" placeholder="Fullname">
        <label for="name">Full name</label>
      </div>

    <div class="form-floating">
      <input value="{{old('email')}}" name ="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <div class="form-floating">
        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Password">
        <label for="password_confirmation">Confirm Password</label>
      </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
  </form>

  @endsection('content')
