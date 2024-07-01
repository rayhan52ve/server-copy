@extends('admin.master')
@section('body')
<div class="container-fluid">
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title">
                @if (session()->get('language') == 'bangla')
                    .
                @else
                    ADD NEW USER
                @endif
            </h4>
            <form class="form-horizontal p-t-20" action="{{ route('admin.manage-user.store') }}" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group row">
                    <div class="col-6 col-md-6 col-lg-6 mt-2">
                        <label for="uname1" class="col-sm-12 control-label mb-2">User Name </label>
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control" id="uname1" name="name"
                                    placeholder="User Name">
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-6 mt-2">
                        <label for="uname1" class="col-sm-12 control-label mb-2">User Type</label>
                        <div class="col-sm-12">
                            <div class="input-group">
                                <select type="select" class="form-control" id="uname1" name="is_admin"
                                    placeholder="User Type" required>
                                    <option selected disabled>Select User Type</option>
                                    <option value="2">Moderator</option>
                                    <option value="0">User</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-6 mt-2">
                        <label for="uname1" class="col-sm-12 control-label mb-2">Email</label>
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control" name="email" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-6 mt-2">
                        <label for="uname1" class="col-sm-12 control-label mb-2">Password</label>
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control" name="password" placeholder="Password">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-group row m-b-0">
                    <div class="col-sm-12 mt-2">
                        <button type="submit" class="btn btn-success waves-effect waves-light text-white">
                                Create
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection