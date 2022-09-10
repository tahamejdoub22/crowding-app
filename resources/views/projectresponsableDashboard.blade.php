<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard for projectresponsable') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged as project responsable!
                    <h2>Add a project</h2>

                    <form method="post" action="/project/create" enctype="multipart/form-data">
                        {{ csrf_field() }}
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
                                <button type="submit" class="btn btn-primary">Submit Game</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
