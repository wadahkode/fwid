@extends('layouts.dashboard')

@section('title', $title)

@section('header')
  @include('components._navbar')
@endsection

@section('sidebar')
  @include('components._sidebar')
@endsection

@section('main')
  <main id="main" class="px-5 py-2">
    <div class="flex flex-col gap-3">
      <div class="inline-flex items-center justify-between">
        <h2 class="font-semibold text-lg text-gray-700 tracking-wides">Tutorial</h2>
        <a href="posts/newpost" class="bg-blue-500 text-white px-3 py-2 rounded shadow focus:outline-none">Buat tutorial</a>
      </div>
      <div id="post-content" class="inline-flex flex-col gap-3">
        @foreach ($tutorials as $tuts)
            <article class="bg-white p-4 rounded-md shadow-md">
              <div>
                <h2>{{$tuts->title}}</h2>
              </div>
            </article>
        @endforeach
      </div>
    </div>
  </main>
@endsection