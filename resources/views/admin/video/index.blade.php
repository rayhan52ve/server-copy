@extends('admin.master')
@section('body')
    <div class="container pt-4">
        <div class="row rounded justify-content-center mx-0">

            <div class="col-md-6">
                <div class="bg-secondary rounded p-4">
                    <h4 class="mb-4">Video Upload</h4>
                    <form action="{{ route('admin.video.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label"> Title</label>
                            <input type="text" class="form-control" placeholder="Video Title" name="title"
                                id="title" aria-describedby="title">
                        </div>
                        <div class="mb-3">
                            <label for="video" class="form-label"> Embeded video link</label>
                            <input type="text" name="video" class="form-control"
                                placeholder="Paste embeded video link here" required>
                        </div>
                        <div class="mb-3">
                            <img id="file-ip-1-preview">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>

            <div class="col-md-6">
                <div class="bg-secondary rounded p-4">
                    <h4 class="mb-4">Group or Video Link</h4>
                    <form action="{{ route('admin.buttonStore') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label"> Button Name</label>
                            <input type="text" class="form-control" placeholder="write a name for link button"
                                name="button_name" value="{{ $videolink->button_name ?? null }}">
                        </div>
                        <div class="mb-3">
                            <label for="video" class="form-label"> Group or video link</label>
                            <input type="text" name="link" class="form-control" value="{{ $videolink->link ?? null }}"
                                placeholder="Paste Group or video link here">
                        </div>
                        <div class="mb-3">
                            <img id="file-ip-1-preview">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Recent Sales Start -->
    <div class=" pt-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">All Videos</h6>
                {{-- <a href="">Show All</a> --}}
            </div>

            <style>
                #example_filter {
                    display: none;
                }
            </style>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0 table-striped" id=""
                    style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Video</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($posts as $item)
                            <tr>
                                <td><iframe width="500" height="250"
                                        src="https://www.youtube.com/embed/{{ $item->video }}">
                                    </iframe></td>
                                <td>{{ $item->title }}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('admin.video.edit', $item->id) }}">Edit</a>

                                    <form action="{{ route('admin.video.destroy', $item->id) }}" class="mt-1"
                                        method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-outline-danger btn-sm" title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this?')">
                                            <i class="icon-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->

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


        new DataTable('#example');
    </script>
@endsection
