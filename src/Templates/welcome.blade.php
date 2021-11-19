@extends('layouts.app')

@section('title', $title)

@section('header')
  <nav class="py-6">
    <div class="lg:container lg:mx-auto mx-6 flex items-center gap-x-6">
      <h1 class="lg:text-3xl text-2xl font-semibold text-white">
        <a href="/">Wadahkode</a>
      </h1>

      <ul class="ml-auto text-white gap-x-6 hidden lg:inline-flex md:inline-flex items-center">
        <li><a href="/">Beranda</a></li>
        <li><a href="contact">Kontak kami</a></li>
        <li><a href="about">Tentang kami</a></li>
      </ul>
    </div>
  </nav>
@endsection

@section('cover')
  <div class="cover flex items-center h-screen">
    <div class="lg:container lg:mx-auto mx-6">
      <h1 class="lg:text-4xl text-3xl font-semibold text-white">Selamat datang di wadahkode</h1>
      <p class="lg:text-xl text-lg my-12 text-white break-words lg:w-1/2 min-w-min">Sarana untuk saling berbagi ilmu mengenai teknologi dan sebagai wadah untuk saling berdiskusi.</p>
      <a href="about" class="px-3 pt-3 pb-2 bg-blue-700 hover:bg-blue-800 rounded-md text-white font-semibold antialiased inline-flex items-center gap-x-2 text-md">
        <i class="pb-1">Lihat selengkapnya</i>
        <i class="fa fa-arrow-right"></i>
      </a>
    </div>
  </div>
@endsection