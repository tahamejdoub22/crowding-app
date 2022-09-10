@extends('project/layout')
@section('content')
<div class="container">

  <div class="card-header">Contactus Page</div>
  <div class="card-body">

        <div class="card-body">
        <h5 class="card-title"> name : {{ $reward->name }}</h5>
        <p class="card-text"> description : {{ $reward->description }}</p>
        <p class="card-text">discount : {{ $reward->discount }}</p>
  </div>


</div>
</div>
@endsection
