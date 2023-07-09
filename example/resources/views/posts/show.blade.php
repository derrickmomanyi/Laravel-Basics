@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-default">Go Back</a>
    <h1>{{$post->title}}</h1>
   
    <div>
        {{$post->body}}
    </div>
    <hr/>

    {{-- @if (count($posts) > 1)
      @foreach ($posts as $post )
      <div class="well">
         <h3><a href="/posts/{{$post->$id}}">{{$post->title}}</a></h3>
        
      </div>
          
      @endforeach
        
    @else
      <p>No posts found.</p>
    @endif --}}
@endsection