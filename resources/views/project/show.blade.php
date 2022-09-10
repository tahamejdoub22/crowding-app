@extends('project/layout')
@section('content')
<div class="container">

  <div class="card-header">Contactus Page</div>
  <div class="card-body">

        <div class="card-body">
        <h5 class="card-title">project name : {{ $project->project_name }}</h5>
        <p class="card-text">project location : {{ $project->project_location }}</p>
        <p class="card-text">project description : {{ $project->project_description }}</p>
        <p class="card-text">user name : {{ $project->user->name }}</p>

        <p class="card-text">start_date : {{ $project->start_date }}</p>
        <p class="card-text">end_date : {{ $project->end_date }}</p>
        <p class="card-text">goal: {{ $project->goal }}</p>
        <p class="card-text">pledged : {{ $project->pledged }}</p>
        <p class="card-text">investors : {{ $project->investors }}</p>
        <p class="card-text">image: {{ $project->image }}</p>
  </div>


</div>
</div>
@endsection
