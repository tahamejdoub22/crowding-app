@extends('project/layout')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-16">
                <div class="card">
                    <div class="card-header">list rewards</div>
                    <div class="card-body">
                        <a href="{{ url('/reward/create') }}" class="btn btn-success btn-sm" title="Add New reward">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
                                        <th>description</th>
                                        <th>project name</th>
                                        <th>discount</th>


                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($reward as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->project->project_name }}</td>

                                        <td>{{ $item->discount }}</td>
                                           <td> <a href="{{ url('/reward/' . $item->id) }}" title="View reward"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/reward/' . $item->id . '/edit') }}" title="Edit reward"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/reward' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
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
