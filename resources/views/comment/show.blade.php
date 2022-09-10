@extends('project/layout')
@section('content')
<div class="container">

  <div class="card-header">Contactus Page</div>
  <div class="card-body">

        <div class="card-body">
          <h5 class="card-title">project name : {{ $comment->name }}</h5>
          <p class="card-text">project location : {{ $comment->text }}</p>
          <p class="card-text">project description : {{ $comment->user->name }}</p>
          <p class="card-text">start_date : {{ $comment->project->project_name }}</p>
          <p class="card-text">image: {{ $comment->image }}</p>
    </div>


</div>
</div>
@endsection
