@extends('layouts.admin')

@section('title', $title)

@section('main')
  <div class="w-full h-screen inline-flex items-center justify-center cover">
    <div class="lg:w-2/6 md:w-2/4 inline-flex flex-col gap-y-3">
      <h1 class="text-2xl font-semibold tracking-wides text-white">Hai, Administrator</h1>
      <form class="bg-white shadow-lg rounded-md lg:p-8 md:p-4 inline-flex flex-col gap-y-3" action="/admin/signin" method="post">
        <div>
          <input type="email" class="px-3 py-2 w-full border border-gray-300 rounded focus:outline-none text-gray-600 text-lg" name="email" placeholder="masukan email anda" required>
        </div>
        <div>
          <input type="password" class="px-3 py-2 w-full border border-gray-300 rounded focus:outline-none text-gray-600 text-lg" name="password" placeholder="kata sandi" required>
        </div>
        <div class="inline-flex justify-between items-center">
          <div>
            <input type="checkbox" class="text-gray-600" name="remember"/> ingat saya
          </div>
          <div>
            <a href="" class="text-blue-600">Lupa kata sandi?</a>
          </div>
        </div>
        <div>
          <hr>
          <button type="submit" class="bg-green-600 mt-3 px-3 py-2 rounded text-white font-600 tracking-wides">Masuk</button>
        </div>
      </form>

      <div>
        <p class="text-white">Belum punya akun ? <a href="/admin/register" class="text-blue-600">Daftar sekarang</a></p>
      </div>
    </div>
  </div>
@endsection