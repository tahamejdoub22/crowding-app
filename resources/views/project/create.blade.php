@extends('project/layout')

@section('content')
<div class="container">
    <br><br>
    <h2>Add a project</h2>
<hr>



    <form action="{{ url('project') }}" method="post">        {{ csrf_field() }}
        <div class="form-group row">
            <label for="project_nameid" class="col-sm-3 col-form-label">project Title</label>
            <div class="col-sm-9">
                <input name="project_name" type="text" class="form-control" id="project_nameid" placeholder="project_name">
            </div>
        </div>
        <div class="form-group row">
            <label for="project_locationid" class="col-sm-3 col-form-label">project location</label>
            <div class="col-sm-9">
                <input name="project_location" type="text" class="form-control" id="project_locationid"
                       placeholder="project_location">
            </div>
        </div>
        <div class="form-group row">
            <label for="start_dateid" class="col-sm-3 col-form-label">start date</label>
            <div class="col-sm-9">
                <input name="start_date" type="date" class="form-control" id="start_dateid"
                       placeholder="start_date">
            </div>
        </div>
        <div class="form-group row">
            <label for="end_dateid" class="col-sm-3 col-form-label">end date</label>
            <div class="col-sm-9">
                <input name="end_date" type="date" class="form-control" id="end_dateid"
                       placeholder="end_date">
            </div>
        </div>
        <div class="form-group row">
            <label for="project_descriptionid" class="col-sm-3 col-form-label">project description</label>
            <div class="col-sm-9">
                <input name="project_description" type="text" class="form-control" id="project_description"
                       placeholder="project_description">
            </div>
        </div>
        <div class="form-group row">
            <label for="imageid" class="col-sm-3 col-form-label"> Image</label>
            <div class="col-sm-9">
                <input name="image" type="file" id="imageid" class="custom-file-input">
                <span style="margin-left: 15px; width: 480px;" class="custom-file-control"></span>
            </div> </div>
            <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">list user</label>
                <!-- <input type="text" id='Trainer_id' name='Trainer_id' class='form-control'> -->
                <div class="col-sm-9">

                <select id='user_id' name='user_id' class='form-control'>

                <option value="" selected disabled>Select user</option>
                    @foreach($user as $tr)
                    
                            <option value="{{$tr->id}}">{{$tr->name}}</option>
                    @endforeach
                </select>
            </div>
              </div>
       
        <div class="form-group row">
            <label for="goalid" class="col-sm-3 col-form-label">goal </label>
            <div class="col-sm-9">
                <input name="goal" type="text" class="form-control" id="goal"
                       placeholder="goal">
            </div>
        </div>

        <div class="form-group row">
            <label for="pledgedid" class="col-sm-3 col-form-label">pledged</label>
            <div class="col-sm-9">
                <input name="pledged" type="text" class="form-control" id="pledged"
                       placeholder="pledged">
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Submit project</button>
            </div>
        </div>
    </form>
</div>
@endsection
