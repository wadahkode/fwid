@extends('layouts.admin')

@section('title', 'Administrator | Wadahkode')

@section('main')
  <div>
    <form action="/admin/signin" method="post">
      <div><input type="email" name="email" placeholder="input your email" required></div>
      <div><input type="password" name="password" placeholder="input your password" required></div>
      <div>
        <button type="submit">Signin</button>
      </div>
    </form>
  </div>
@endsection