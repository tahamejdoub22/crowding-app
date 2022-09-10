@extends('project/layout')
@section('content')
<div class="container">

  <div class="card-header">Contactus Page</div>
  <div class="card-body">

        <div class="card-body">
        <h5 class="card-title">project name : {{ $updates->name }}</h5>
        <p class="card-text">project location : {{ $updates->text }}</p>
        <p class="card-text">project description : {{ $updates->user->name }}</p>
        <p class="card-text">start_date : {{ $updates->project->project_name }}</p>
        <p class="card-text">image: {{ $updates->image }}</p>
  </div>


</div>
</div>
@endsection
