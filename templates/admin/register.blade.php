@extends('layouts.app')

@section('title', $title)

@section('header')
  <nav class="py-4 bg-gray-800">
    <div class="lg:container lg:mx-auto mx-6 flex items-center gap-x-6">
      <div class="inline-flex items-center gap-x-3">
        <button id="btn-menu" class="text-white lg:hidden md:hidden sm:hidden">
          <i class="fas fa-bars fa-lg"></i>
        </button>
        <h1 class="lg:text-3xl text-2xl font-semibold text-white">
          <a href="/">Wadahkode</a>
        </h1>
      </div>

      <ul class="ml-auto text-white gap-x-6 hidden lg:inline-flex md:inline-flex items-center capitalize">
        <li><a href="/">Beranda</a></li>
        <li><a href="/tutorial">Tutorial</a></li>
        <li><a href="/contact">Kontak kami</a></li>
        <li><a href="/about">Tentang kami</a></li>
      </ul>
    </div>
  </nav>
@endsection

@section('main')
  <div class="w-full h-screen flex lg:items-start md:items-start items-center _cover">
    <div class="lg:container lg:mx-auto lg:mt-24 md:container md:mx-6 md:mt-24 mx-6">
      <div class="lg:w-1/2 md:1/2 w-full text-gray-700">
        <h2 class="text-2xl font-semibold tracking-wides text-gray-700">Register</h2>

        <p class="mt-3">Untuk mendaftar sebagai bagian dari administrator silahkan hubungi kontak dibawah ini :</p>

        <table class="mt-3">
          <tbody>
            <tr>
              <td class="w-24">Email</td>
              <td>:&nbsp;</td>
              <td><a href="mailto:mvp.dedefilaras@gmail.com" class="text-blue-600">mvp.dedefilaras@gmail.com</a></td>
            </tr>
            <tr>
              <td>Whatsapp</td>
              <td>:&nbsp;</td>
              <td><a href="https://wa.me/+628979320749" class="text-blue-600">+628979320749</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection