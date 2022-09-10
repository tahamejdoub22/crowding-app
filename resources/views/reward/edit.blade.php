@extends('project/layout')

@section('content')
<div class="container">

<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">

      <form action="{{ url('reward/' .$reward->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <div class="form-group row">
            <label for="nameid" class="col-sm-3 col-form-label">name</label>
            <div class="col-sm-9">
                <input name="name" type="text" class="form-control" id="nameid" placeholder="name">
            </div>
        </div>
        <div class="form-group row">
            <label for="descriptionid" class="col-sm-3 col-form-label">description</label>
            <div class="col-sm-9">
                <input name="description" type="text" class="form-control" id="descriptionid"
                       placeholder="description">
            </div>
        </div>
        
            <div class="form-group row">
                <label for="">user_id</label>
                <!-- <input type="text" id='Trainer_id' name='Trainer_id' class='form-control'> -->

                <select id='project_id' name='project_id' class='form-control'>

                <option value="" selected disabled>Select project</option>
                    @foreach($project as $tr)
                            <option value="{{$tr->id}}">{{$tr->project_name}}</option>
                    @endforeach
                </select>
              </div>
       
        <div class="form-group row">
            <label for="discountid" class="col-sm-3 col-form-label">discount </label>
            <div class="col-sm-9">
                <input name="discount" type="text" class="form-control" id="discount"
                       placeholder="discount">
            </div>
        </div>

       
        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Submit reward</button>
            </div>
        </div>
    </form>

  </div>
</div>
</div>
@stop
