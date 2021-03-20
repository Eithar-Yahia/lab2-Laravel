@extends('layouts.app')

@section('title')Index Page @endsection

@section('content')
<x-buttons.button href="{{ route('posts.create') }}" type="success" name="Create Post" />

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
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
        <td>{{ $post['posted_by'] }}</td>
        <td>{{ $post['created_at'] }}</td>
        <td>
        
          <x-buttons.button href="{{  route('posts.show',['postId' => $post['id']]) }}" type="primary" name="View" />

          <x-buttons.button href="{{  route('posts.edit',['postId' => $post['id']]) }}" type="secondary" name="Edit" />

         <x-buttons.button  href="" type="danger" name="Delete" />
        </td>
      </tr>
    @endforeach
    </tbody>
</table>
@endsection