@extends('admin.master')

@section('title', 'Users Manager')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Users Manager
                    </h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">User:</div>
                            <a class="dropdown-item" href="{{ route('register') }}">Create new user</a>
                            <!--<a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>-->
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('user.update') }}">
                            @csrf
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Grade</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr class="{{ $user->is_admin? "border-left-info" : "border-left-success" }}">
                                        <td><input type="checkbox" name="users[]" value="{{ $user->id }}"></td>
                                        <td><img alt="{{ $user->name }}" src="{{ 'https://www.gravatar.com/avatar/' .md5($user->email) .'?s=32&d=mm&r=g' }}" class="img-profile rounded-circle">  {{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->is_admin ? "Admin" : "Editor" }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="4">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <select class="form-control" name="role">
                                                        <option value="0">Editor</option>
                                                        <option value="1">Admin</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <button type="submit" class="btn btn-primary form-control">Change</button>
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