<div class="row">
    <div class="col-lg-12">
        <div class="card">

            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('store.links') }}" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    @if ($links != null)
                        <input type="hidden" name="id" value="{{ $links->id }}">
                    @endif
                    <div class="form-group">
                        <label>Bkash Number</label>
                        <input type="number" class="form-control" value="{{ $links->bkash }}" name="bkash">
                        <label>Bkash Type</label>
                        <input type="text" class="form-control" value="{{ $links->bkash_type }}" name="bkash_type">
                    </div>
                    <div class="form-group">
                        <label>Nagad Number</label>
                        <input type="number" class="form-control" value="{{ $links->nagad }}" name="nagad">
                        <label>Nagad Type</label>
                        <input type="text" class="form-control" value="{{ $links->nagad_type }}" name="nagad_type">
                    </div>
                    <div class="table-responsive">

                        @if ($links != null)
                            <button type="submit" class="btn btn-info">Update</button>
                        @else
                            <button type="submit" class="btn btn-info">Submit</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea#default'
    });
</script>
