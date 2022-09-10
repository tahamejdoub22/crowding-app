@extends('project/layout')
@section('content')
<div class="container">

  <div class="card-header">Contactus Page</div>
  <div class="card-body">

        <div class="card-body">
        <h5 class="card-title"> name : {{ $team->name }}</h5>
        <p class="card-text"> display name : {{ $team->displayname }}</p>
        <p class="card-text">user name : {{ $team->user->name }}</p>
        <p class="card-text">image: {{ $team->image }}</p>
  </div>


</div>
</div>
@endsection
