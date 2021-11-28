@extends('layouts.dashboard')

@section('title', $title)

@section('header')
  @include('components._navbar')
@endsection

@section('sidebar')
  @include('components._sidebar')
@endsection

@section('main')
  <main id="main" class="px-5 py-2 lg:pb-12">
    <div class="flex flex-col gap-3">
      <div class="inline-flex items-center justify-between">
        <h2 class="font-semibold text-lg text-gray-700 tracking-wides">Tutorial</h2>
        <a href="posts/newpost" class="bg-blue-500 text-white px-3 py-2 rounded shadow focus:outline-none">Buat tutorial</a>
      </div>
      <div id="post-content" class="inline-flex flex-col gap-3">
        @foreach ($tutorials as $tuts)
            <article class="bg-white rounded-md shadow-md flex">
              <picture class="w-32 h-32 inline-flex items-center p-3">
                @if (empty($tuts->foto))
                  <img src="https://www.freeiconspng.com/uploads/no-image-icon-13.png" class="object-cover" alt="No image available" />
                @else
                  <img src="{{$tuts->foto}}" alt="">  
                @endif
              </picture>
              <div class="grid grid-cols-3 flex-1 p-4 text-gray-600">
                <div class="col-span-2 inline-flex flex-col gap-3">
                  <div class="mb-2">
                    <h2 class="text-lg font-semibold tracking-wides capitalize -mb-3">{{$tuts->title}}</h2>
                    <sub class="text-xs">
                      by {{$tuts->author}} - <time datetime="{{$tuts->updatedAt}}" lang="en-US" format="id-ID"></time>
                    </sub>
                  </div>

                  <p>{{strip_tags(htmlspecialchars_decode($tuts->content))}}</p>
                </div>
                
                <div class="relative">
                  <button class="absolute right-0" data-id="{{$tuts->id}}" onclick="return settingsPosts(this)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                      <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                    </svg>
                  </button>

                  <ul id="settings-posts-{{$tuts->id}}" class="absolute top-6 right-1 bg-gray-300 p-3 w-1/2 rounded-md inline-flex flex-col gap-2 hidden">
                    <li><a href="posts/edit/{{$tuts->id}}">edit</a></li>
                    <li>
                      <button type="button" data-id="{{$tuts->id}}" onclick="return deletePosts(this)">delete</button>
                    </li>
                  </ul>
                </div>
              </div>
              {{-- <picture class="w-24 h-24">
              </picture>
              <div class="mr-auto">
                <div>
                  <time datetime="{{$tuts->updatedAt}}"></time>
                </div>

              </div>
              <div class="relative ml-auto w-1/2">
                <ul class="bg-gray-300 w-2/3 absolute">
                  <li>
                    <a href="">edit</a>
                  </li>
                  <li>
                    <a href="">delete</a>
                  </li>
                </ul>
              </div> --}}
            </article>
        @endforeach
      </div>
    </div>
  </main>
@endsection