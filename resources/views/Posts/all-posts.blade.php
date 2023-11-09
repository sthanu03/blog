<x-app-layout>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('All Posts') }}
    </h2>
  </x-slot>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">


          
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
      <tr>
        <th scope="row">{{ $post->id }}</th>
        <td>{{ $post->title }}</td>
        <td>{{ $post->description }}</td>
        <td>
          <a href="{{ route('posts.edit', ['postId' => $post->id]) }}" class="btn btn-sm btn-primary">Edit</a>
          <a href="{{ route('posts.delete', ['postId' => $post->id]) }}" class="btn btn-sm btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
  
  
        </div>
      </div>
    </div>
</x-app-layout>