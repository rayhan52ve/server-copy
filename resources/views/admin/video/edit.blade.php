@extends('admin.master')
@section('body')
    <div class="container-fluid pt-4 px-4">
        <div class="row  bg-secondary rounded justify-content-center mx-0">

            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded p-4">
                    <h6 class="mb-4">Video Update Form</h6>
                    <form action="{{ route('admin.video.update', $posts->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="category" class="form-label"> Title</label>
                            <input type="text" class="form-control" name="title" id="category"
                                value="{{ $posts->title }}" aria-describedby="category">
                        </div>
                        <div class="mb-3">
                            <label for="video" class="form-label"> Embeded video link</label>
                            {{-- <input type="hidden" name="video" class="form-control" value="{{ $posts->video }}" placeholder="Paste new embeded video link here"> --}}
                            <input type="text" name="video" class="form-control" value="" placeholder="Paste new embeded video link here">
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
                preview.style.width = "200px";
                preview.style.height = "150px";
            }
        }
    </script>
@endsection
