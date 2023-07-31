@extends('layouts.app')

@section('title', 'Blog Posts')

@section('content')

@if($people->isEmpty())
<div class="text-center" style="margin: 20%">
    <h1>No person was found!</h1>
</div>
@endif
<div class="row row-cols-1 row-cols-md-3">
    @foreach ($people as $person)
      <div class="col mb-4">
        <div class="card">
          <img src="{{$person->image_url ? url($person->image_url) : asset('images/no_image_person.jpg')}}" width="{{$person->width}}" height="{{$person->height}}" class="card-img-top">
          <a href="{{route('data.details', ['type' => $type, 'id' => $person->id])}}" class="content">
            <div class="text">See more details</div>
          </a>
          <div class="card-body">
            <h5 class="card-title text-center">{{$person->name}}</h5>
          </div>
        </div>
      </div>
    @endforeach
</div>
    {!! $people->links() !!}
@endsection
