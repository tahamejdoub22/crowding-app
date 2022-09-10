@extends('project/layout')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-16">
                <div class="card">
                    <div class="card-header">Contacts</div>
                    <div class="card-body">
                        <a href="{{ url('/testimonials/create') }}" class="btn btn-success btn-sm" title="Add New Contact">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> name</th>
                                        <th>display name</th>
                                        <th>texte</th>
                                        <th>user name</th>

                                        <th>image</th>


                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($testimonials as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->displayname }}</td>
                                        <td>{{ $item->text }}</td>

                                        <td>{{ $item->user->name }}</td>
                                        <td > <img style="max-width: 40%;
                                            max-height: 40%;" class="d-none d-sm-block" src="/Image/{{ $item->image }}" alt=""/></td>

                                        <td>
                                        
                                            <a href="{{ url('/testimonials/' . $item->id) }}" title="View testimonials"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/testimonials/' . $item->id . '/edit') }}" title="Edit testimonials"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/testimonials' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
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
