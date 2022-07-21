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
    <div class="lg:grid grid-cols-4 flex flex-col gap-6">
      <div class="col-auto">
        <picture class="inline-grid items-center w-full">
          <img src="https://avatars.githubusercontent.com/u/61302674?v=4" class="object-cover w-full" alt="...">
        </picture>

        <div class="mt-2">
          <h2 class="capitalize font-semibold text-gray-800 text-2xl -mb-2">{{$data->firstName . " " . $data->lastName}}</h2>
          <h3 class="text-gray-600 text-lg">{{$data->displayName}}</h3>
        </div>
      </div>
      <div class="col-span-3">
        <div class="bg-white rounded-md p-4 shadow-lg">
          <h2 class="font-semibold tracking-wides text-2xl text-gray-800">Biodata</h2>

          <hr class="my-3">

          <form class="flex flex-col gap-2" action="#" method="POST">
            <div class="inline-flex flex-col">
              <label for="firstName">Firstname</label>
              <input type="text" name="firstName" id="firstName" class="w-full px-3 py-2 border border-gray-300 rounded" value="{{$data->firstName}}">
            </div>
            <div class="inline-flex flex-col">
              <label for="lastName">Lastname</label>
              <input type="text" name="lastName" id="lastName" class="w-full px-3 py-2 border border-gray-300 rounded" value="{{$data->lastName}}">
            </div>
            <div class="inline-flex flex-col">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded" value="{{$data->email}}">
            </div>
            <div class="inline-flex flex-col">
              <label for="foto">Foto profil</label>
              <input type="file" name="foto" id="foto">
            </div>
            <div class="mt-2">
              <button type="submit" class="bg-blue-500 px-3 py-2 rounded text-white">Perbarui</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection