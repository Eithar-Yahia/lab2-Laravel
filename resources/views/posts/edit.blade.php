@extends('layouts.app')

@section('title')Create Page @endsection

@section('content')
<form method="POST" action="{{ route('posts.update', ['postId' => $post['id']]) }}" style="text-align:left;">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" aria-describedby="emailHelp" value="{{ $post['title'] }}">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description">{{ $post['description'] }} </textarea>
    </div>
    <div class="form-group">
      <label  for="post_creator">Post Creator</label>
      <select class="form-control" id="post_creator">
          <option>Eithar</option>
          <option>Ahmed</option>
          <option>Soha</option>
      </select>
    </div>
    <button type="submit" class="btn btn-success">Update Post</button>
  </form>

@endsection