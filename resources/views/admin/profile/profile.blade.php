@extends('admin.master')
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12 ">
            <div class="card mt-3">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="card-body">
                    <h3 class="text-center">Update Information</h3>
                    <form class="form-horizontal" action="{{ route('update.profile') }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Name</label>
                                <input type="text" class="form-control" rows="5" name="name"
                                    value="{{ $user->name }}" id="name" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="email" class="form-control" rows="5" name="email"
                                    value="{{ $user->email }}" id="email" placeholder="Email">
                            </div>

                            <div class="form-group col-md-6">
                                <label>New Password</label>
                                <input type="text" class="form-control" rows="5" name="new_password" id="youtube"
                                    placeholder="new password">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                                <img src="{{ $user->image ?? null }}" height="100" width="100" alt="">
                            </div>
                        </div>
                        @if (auth()->user()->is_admin == 1)
                            <label>Admin Description</label>
                            <textarea type="text" id="description" class="form-control" rows="5" name="details"
                                placeholder="Wtite from here...">{!! $user->details ?? null !!}</textarea>
                        @endif
                        <div class="table-responsive mt-2">
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <style>
        .ck.ck-editor__main>.ck-editor__editable {
            min-height: 300px;
        }
    </style>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
