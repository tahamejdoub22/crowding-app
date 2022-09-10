@extends('project/layout')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-16">
                <div class="card">
                    <div class="card-header">project list</div>
                    <div class="card-body">
                        <a href="{{ url('/project/create') }}" class="btn btn-success btn-sm" title="Add New Contact">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>project name</th>
                                        <th>project location</th>
                                        <th>project description</th>
                                        <th>start date</th>
                                        <th>end date</th>
                                        <th>user name</th>

                                        <th>goal</th>
                                        <th>pledged</th>
                                        <th>investors</th>
                                        <th>image</th>


                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($project as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->project_name }}</td>
                                        <td>{{ $item->project_location }}</td>
                                        <td>{{ $item->project_description }}</td>
                                        <td>{{ $item->start_date }}</td>

                                        <td>{{ $item->end_date }}</td>
                                        <td>{{ $item->user->name }}</td>

                                        <td>{{ $item->goal }}</td>
                                        <td>{{ $item->pledged }}</td>
                                        <td>{{ $item->investors }}</td>
                                        <td > <img style="max-width: 100%;
                                            max-height: 100%;" class="d-none d-sm-block" src="/Image/{{ $item->image }}" alt=""/></td>

                                        <td>
                                            <a href="{{ url('/project/' . $item->id) }}" title="View project"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/project/' . $item->id . '/edit') }}" title="Edit project"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/project' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
