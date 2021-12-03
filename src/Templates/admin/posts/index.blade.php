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
        <a href="/admin/dashboard/newpost" class="bg-blue-500 text-white px-3 py-2 rounded shadow focus:outline-none">Buat tutorial</a>
      </div>
      <div id="post-content" class="inline-flex flex-col gap-3 lg:overflow-auto overflow-hidden">
        @empty($tutorials)
          <article class="bg-white rounded-md shadow-md flex p-4 font-semibold tracking-wides">
            Belum ada postingan
          </article>
        @endempty
        @foreach ($tutorials as $tuts)
            <article class="bg-white rounded-md shadow-md flex lg:flex-row flex-col">
              <div class="lg:inline-flex items-center p-3">
                <picture class="w-32 h-32">
                  @if (empty($tuts->foto))
                    <img src="https://www.freeiconspng.com/uploads/no-image-icon-13.png" class="object-cover" width="144" height="144" alt="No image available" />
                  @else
                    <img src="{{$tuts->foto}}" class="object-cover" alt="">  
                  @endif
                </picture>
              </div>
              <div class="lg:grid grid-cols-3 flex-1 p-4 text-gray-600">
                <div class="lg:col-span-2 inline-flex flex-col gap-3">
                  <div class="mb-2">
                    <h2 class="text-lg font-semibold tracking-wides capitalize -mb-3">{{$tuts->title}}</h2>
                    <sub class="text-xs">
                      by {{$tuts->author}} - <time datetime="{{$tuts->createdAt}}" lang="en-US" format="id-ID"></time>
                      @if ($tuts->createdAt !== $tuts->updatedAt)
                        {{-- (diperbarui <time datetime="{{$tuts->updatedAt}}" lang="en-US" format="id-ID"></time>) --}}
                        (diedit)
                      @endif
                    </sub>
                  </div>

                  <p>{{strip_tags(htmlspecialchars_decode($tuts->content))}}</p>
                </div>
                
                <div class="relative hidden lg:block">
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
              <div class="lg:hidden inline-flex items-center gap-2 mb-4 ml-4">
                <a href="posts/edit/{{$tuts->id}}" class="px-3 py-2 bg-yellow-600 text-white rounded">edit</a>
                <a href="#" data-id="{{$tuts->id}}" class="px-3 py-2 bg-red-600 text-white rounded" onclick="return deletePosts(this)">delete</a>
              </div>
            </article>
        @endforeach
      </div>
    </div>
  </main>
@endsection