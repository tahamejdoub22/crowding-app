@extends('project/layout')

@section('content')
<div class="container">
    <br><br>

    <h2>Add a team</h2>
<hr>



    <form action="{{ url('team') }}" method="post">        {{ csrf_field() }}
        <div class="form-group row">
            <label for="nameid" class="col-sm-3 col-form-label">name</label>
            <div class="col-sm-9">
                <input name="name" type="text" class="form-control" id="nameid" placeholder="name">
            </div>
        </div>
        <div class="form-group row">
            <label for="displaynameid" class="col-sm-3 col-form-label">displayname</label>
            <div class="col-sm-9">
                <input name="displayname" type="text" class="form-control" id="displaynameid"
                       placeholder="displayname">
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
            <div class="offset-sm-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Submit reward</button>
            </div>
        </div>
    </form>
</div>
@endsection
