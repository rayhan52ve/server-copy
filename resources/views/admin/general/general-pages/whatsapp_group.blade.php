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
                        <label>Whatsapp Group Link</label>
                        <input type="text" class="form-control" value="{{ $links->whatsapp_group_link }}" name="whatsapp_group_link">
                        
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

