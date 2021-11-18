@extends('layouts.app')

@section('title', $title)

@section('header')
  <nav class="py-6">
    <div class="container mx-auto">
      <h1 class="text-2xl font-semibold text-white">Wadahkode</h1>
    </div>
  </nav>
@endsection

@section('cover')
  <div class="cover flex items-center h-screen">
    <div class="container mx-auto">
      <h1 class="text-4xl font-semibold text-white">Selamat datang di wadahkode</h1>
      <p class="text-xl my-10 text-white break-words w-1/2 min-w-min">Sarana untuk saling berbagi ilmu mengenai teknologi dan sebagai wadah untuk saling berdiskusi.</p>
      <a href="about" class="bg-blue-600 px-3 py-2 rounded-md text-white font-semibold">Lihat selengkapnya</a>
    </div>
  </div>
@endsection