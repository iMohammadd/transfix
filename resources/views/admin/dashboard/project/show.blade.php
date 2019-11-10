@extends('admin.master')

@section('title', $project->title)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card border-left-info">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        {{ $project->title }}
                    </h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Project:</div>
                            <a class="dropdown-item" href="{{ route('project.create') }}">Create new Project</a>
                            <!--<a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>-->
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('project.assign', $project) }}">
                            @csrf
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Key</th>
                                    <th>Value</th>
                                    <th>Assigned to</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($project->sentences as $sentence)
                                    <tr class="{{ $sentence->user_id == null ? "border-left-warning" : "border-left-success" }}">
                                        <td><input type="checkbox" name="id[]" value="{{ $sentence->id }}"></td>
                                        <td>{{ $sentence->key }}</td>
                                        <td>{{ $sentence->value }}</td>
                                        <td>{{ $sentence->user['name'] }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="4">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <select class="form-control" name="user">
                                                        @foreach($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <button type="submit" class="btn btn-primary form-control">Assign</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop