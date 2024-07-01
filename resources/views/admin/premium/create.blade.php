@extends('admin.master')
@section('body')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class="card-title">
                            Premium Setting
                        </h4>
                        <form class="form-horizontal" action="{{ route('admin.premium.store') }}" method="POST">
                            @csrf
                            <div class="form-group py-2">

                                <label>Premium Account Price</label>
                                <input type="text" class="form-control mb-2" rows="5"
                                    value="{{ $premium->price ?? null }}" name="price"
                                    placeholder="Premium Account Price">

                                <label>Premium Notice</label>
                                <input type="text" class="form-control mb-2" rows="5"
                                    value="{{ $premium->notice ?? null }}" name="notice" placeholder="Premium Notice">

                                <label>Premium Message</label>
                                <input type="text" class="form-control mb-2" rows="5"
                                    value="{{ $premium->message ?? null }}" name="message" placeholder="Premium Message">


                                Premium Requests
                                <div class="form-check form-switch mb-3">
                                    <label class="form-check-label" for="flexSwitchCheckChecked2">
                                        {{ @$premium->submit == 1 ? 'ON' : 'OFF' }}
                                    </label>
                                    <input type="hidden" name="submit" value="0">
                                    <input class="form-check-input" value="1" name="submit" type="checkbox"
                                        onclick="submitForm()" id="flexSwitchCheckChecked2"
                                        {{ @$premium->submit == 1 ? 'checked' : '' }}>
                                </div>

                                <label>Premium Description</label>
                                <textarea type="text" id="description" class="form-control" rows="5" name="details"
                                    >{!! $premium->details ?? null !!}</textarea>
                            </div>

                            <div class="table-responsive">
                                <button type="submit" class="btn btn-info form-control">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .ck.ck-editor__main>.ck-editor__editable {
            min-height: 500px;
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
