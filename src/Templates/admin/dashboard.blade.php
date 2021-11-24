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
    <div id="main-content">
      main content
    </div>

    <div id="post-content" class="hidden">
      post content
    </div>
  </main>
@endsection