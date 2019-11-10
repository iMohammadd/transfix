@extends('admin.master')

@section('title', 'Create Project')

@section('content')
    <form method="post" action="{{ route('project.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-row mb-2">
                    <div class="col">

                        <input class="form-control" type="text" name="title" id="title" placeholder="Title">
                    </div>
                    <div class="col">
                        <div class="custom-file">
                            <input type="file" name="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="driver" id="po" value="Po" checked>
                    <label class="form-check-label" for="po">
                        po file
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="driver" id="ini" value="Ini" checked>
                    <label class="form-check-label" for="ini">
                        ini file
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="driver" id="ini" value="Json" checked>
                    <label class="form-check-label" for="ini">
                        json file
                    </label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Save</button>
                </div>
            </div>
        </div>
    </form>
@stop