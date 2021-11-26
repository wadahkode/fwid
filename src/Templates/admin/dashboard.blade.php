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
    <div id="main-content" class="grid grid-cols-4 gap-4">
      <div class="bg-white shadow-lg rounded-lg p-4 flex items-center lg:gap-4 gap-2">
        <div class="text-gray-600">
          <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" class="bi bi-person w-12 h-12" viewBox="0 0 16 16">
            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
          </svg>
        </div>
        <div class="text-gray-600">
          <h2 class="font-semibold lg:text-2xl -mb-1 uppercase tracking-wides">Pengguna</h2>
          <b class="lg:text-md">Total: 0</b>
        </div>
      </div>
      <div class="bg-white shadow-lg rounded-lg p-4 flex items-center lg:gap-4 gap-2">
        <div class="text-gray-600">
          <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" class="bi bi-chat-left-quote w-10 h-10" viewBox="0 0 16 16">
            <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
            <path d="M7.066 4.76A1.665 1.665 0 0 0 4 5.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 1 0 .6.58c1.486-1.54 1.293-3.214.682-4.112zm4 0A1.665 1.665 0 0 0 8 5.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 1 0 .6.58c1.486-1.54 1.293-3.214.682-4.112z"/>
          </svg>
        </div>
        <div class="text-gray-600">
          <h2 class="font-semibold lg:text-2xl -mb-1 uppercase tracking-wides">komentar</h2>
          <b class="lg:text-md">Total: 0</b>
        </div>
      </div>
      <div class="bg-white shadow-lg rounded-lg p-4 flex items-center lg:gap-4 gap-2">
        <div class="text-gray-600">
          <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" class="bi bi-newspaper w-10 h-10" viewBox="0 0 16 16">
            <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
            <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
          </svg>
        </div>
        <div class="text-gray-600">
          <h2 class="font-semibold lg:text-2xl -mb-1 uppercase tracking-wides">postingan</h2>
          <b class="lg:text-md">Total: <b id="total-postingan">0</b></b>
        </div>
      </div>
      <div class="bg-white shadow-lg rounded-lg p-4 flex items-center lg:gap-4 gap-2">
        <div class="text-gray-600">
          <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" class="bi bi-file-earmark-text w-10 h-10" viewBox="0 0 16 16">
            <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
            <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
          </svg>
        </div>
        <div class="text-gray-600">
          <h2 class="font-semibold lg:text-2xl -mb-1 uppercase tracking-wides">halaman</h2>
          <b class="lg:text-md">Total: 0</b>
        </div>
      </div>
    </div>

    <div id="visitor-content" class="grid grid-cols-3 gap-6 mt-4">
      <div class="col-span-2 inline-grid gap-3">
        <h2 class="font-semibold text-lg text-gray-700 tracking-wides">Pengunjung</h2>

        <div class="bg-white rounded-md shadow-md p-4 relative h-auto">
          <canvas id="visitor-chart"></canvas>
        </div>
      </div>

      <div>
        <div class="bg-white rounded-md shadow-md p-4 relative h-auto mt-10">
          <canvas id="visitor-chart-pie"></canvas>
        </div>
      </div>
    </div>

    <div class="hidden flex flex-col gap-3">
      <div class="inline-flex items-center justify-between">
        <h2 class="font-semibold text-lg text-gray-700 tracking-wides">Tutorial</h2>
        <a href="dashboard/posts/newpost" class="bg-blue-500 text-white px-3 py-2 rounded shadow focus:outline-none">Buat tutorial</a>
      </div>
      <div id="post-content" class="inline-flex flex-col gap-3"></div>
    </div>
  </main>
@endsection