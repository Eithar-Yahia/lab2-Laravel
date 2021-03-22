@extends('layouts.app')

@section('title')Single Post @endsection

@section('content')
<div class="card" style="text-align:left; max-width:80%;">
    <div class="card-header">
      Post Info
    </div>
    <div class="card-body">
      <h5 class="card-title">Title:</h5>
      <p class="card-text">{{ $post['title'] }}</p>
      <h5 class="card-title">Description:</h5>
      <p class="card-text">{{ $post['description'] }}</p>
    </div>
</div>
<hr>
<div class="card" style="text-align:left; max-width:80%;">
    <div class="card-header">
      User Info
    </div>
    <div class="card-body">
      <h5 class="card-title">Name:</h5>
      <p class="card-text">{{ $user['name'] }}</p>
      <h5 class="card-title">Email:</h5>
      <p class="card-text">{{ $user['email'] }}</p>
    </div>
</div>
@endsection