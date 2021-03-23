@extends('layouts.app')

@section('title')Index Page @endsection

@section('content')
<x-buttons.button href="{{ route('posts.create') }}" type="success" name="Create Post" />

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Slug</th>
        <th scope="col">Posted By</th>
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
      <tr>
        <th scope="row">{{ $post['id'] }}</th>
        <td>{{ $post['title'] }}</td>
        <td>{{ $post['slug'] }}</td>
        <td>{{ $post->user ? $post->user->name : 'user not found' }}</td>
        <td>{{ substr($post['created_at'], 0, 10) }}</td>
        <td>
        
          <x-buttons.button href="{{  route('posts.show',['post' => $post['id']]) }}" type="primary" name="View" />

          <x-buttons.button href="{{  route('posts.edit',['post' => $post['id']]) }}" type="secondary" name="Edit" />
      <form  style="display:inline-block;" action="{{ route('posts.destroy', ['post' => $post['id']]) }}" method="post">
      @csrf
      @method('DELETE')
      <button class="btn btn-danger" style="margin-bottom:20px;" type="submit"  onClick="return confirm('Are you sure to delete this post? ')">Delete</button>
    
      </form>
     
        </td>
      </tr>
    @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">
{{ $posts->links() }}
</div>


@endsection