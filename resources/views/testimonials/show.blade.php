@extends('project/layout')
@section('content')
<div class="container">

  <div class="card-header">Contactus Page</div>
  <div class="card-body">

            <div class="card-body">
                <div class="card-body">

                    <div class="card-body">
                    <h5 class="card-title"> name : {{ $testimonials->name }}</h5>
                    <p class="card-text"> display name : {{ $testimonials->displayname }}</p>
                    <p class="card-text">texte : {{ $testimonials->text }}</p>

                    <p class="card-text">user name : {{ $testimonials->user->name }}</p>
                    <p class="card-text">image: {{ $testimonials->image }}</p>
              </div>
        
        


</div>
</div>
@endsection
