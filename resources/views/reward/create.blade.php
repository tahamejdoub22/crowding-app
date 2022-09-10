@extends('project/layout')

@section('content')
<div class="container">
    <br><br>

    <h2>Add a reward</h2>
<hr>



    <form action="{{ url('reward') }}" method="post">        {{ csrf_field() }}
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
                <label for="" class="col-sm-3 col-form-label">project List</label>
                <!-- <input type="text" id='Trainer_id' name='Trainer_id' class='form-control'> -->
                <div class="col-sm-9">

                <select id='project_id' name='project_id' class='form-control'>

                <option value="" selected disabled>Select project</option>
                    @foreach($project as $tr)
                            <option value="{{$tr->id}}">{{$tr->project_name}}</option>
                    @endforeach
                </select>
            </div>
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
@endsection
