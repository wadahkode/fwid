@extends('layouts.app')

@section('title', $title)

@section('header')
  <nav class="bg-gray-900 py-3">
    <div class="lg:container lg:mx-auto mx-6 flex items-center gap-x-6">
      <div class="inline-flex items-center gap-x-3">
        <button id="btn-menu" class="text-white lg:hidden md:hidden sm:hidden">
          <i class="fas fa-bars fa-lg"></i>
        </button>
        <h1 class="lg:text-3xl text-2xl font-semibold text-white">
          <a href="/">Wadahkode</a>
        </h1>
      </div>

      <ul class="ml-auto text-white gap-x-6 hidden lg:inline-flex md:inline-flex items-center">
        <li><a href="/">Beranda</a></li>
        <li><a href="tutorial">Tutorial</a></li>
        <li><a href="contact">Kontak kami</a></li>
        <li><a href="about">Tentang kami</a></li>
      </ul>
    </div>
  </nav>
@endsection

@section('main')
  <div class="lg:grid lg:grid-cols-3 lg:gap-12 flex flex-col gap-6 mt-20 container mx-auto lg:p-0 px-5">
    <div class="col-span-2 inline-grid gap-y-3">
      <h1 class="text-2xl font-semibold">Tutorial terbaru</h1>
      @foreach ($posts as $post)
        <article class="bg-gray-100 shadow-md p-4 flex rounded-md">
          <picture>
            <img src="{{$post->foto}}" alt="">
          </picture>
          <div class="inline-flex flex-col gap-y-3">
            <div>
              <h3 class="text-xl tracking-wides">{{ucwords($post->title)}}</h3>
              <p class="text-xs">
                by <i>{{$post->author}}</i> -
                <time datetime="{{$post->updatedAt}}">
                  {{$post->updatedAt}}
                </time>
              </p>
            </div>
  
            <div>
              {{strip_tags(htmlspecialchars_decode($post->content))}}
            </div>
          </div>
        </article>
      @endforeach
    </div>
    <div>kolom</div>
  </div>
@endsection