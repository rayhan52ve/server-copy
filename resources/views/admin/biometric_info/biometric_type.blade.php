@extends('admin.master')
@section('body')
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3>বায়োমেট্রিক টাইপ</h3>
                    <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#createModal">Create
                        Biometric Type</button>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="" class="table display table-striped border no-wrap">
                        <thead>
                            <tr>
                                <th>সিরিয়াল</th>
                                <th>নাম</th>
                                <th>মূল্য(টাকা)</th>
                                <th>মূল্য(Premium)</th>
                                <th>অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($biometricType as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name ?? null }}</td>
                                    <td>{{ $item->price ?? null }}</td>
                                    <td>{{ $item->premium_price ?? null }}</td>
                                    <td>
                                        <button type="button" class="btn brn-sm btn-info m-2" data-toggle="modal"
                                            data-target="#editModal{{ $item->id }}">Edit</button>

                                        <form action="{{ route('admin.biometric-type.destroy', $item->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger" title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this?')">
                                                <i class="icon-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="uploadModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="uploadModalLabel">বায়োমেট্রিক টাইপ</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.biometric-type.update', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group col-md-10">
                                                        <label for="file" class="form-label">নাম</label>
                                                        <input type="text" class="form-control" id="file"
                                                            value="{{ $item->name }}" name="name" required>
                                                        <label for="file" class="form-label">মূল্য(টাকা)</label>
                                                        <input type="number" class="form-control"
                                                            value="{{ $item->price }}" id="file" name="price"
                                                            required>
                                                        <label for="file" class="form-label">মূল্য(Premium)</label>
                                                        <input type="number" class="form-control"
                                                            value="{{ $item->premium_price }}" id="file" name="premium_price">
                                                    </div>
                                                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <!-- Store Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadModalLabel">বায়োমেট্রিক টাইপ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.biometric-type.store') }}" method="POST">
                            @csrf
                            <div class="form-group col-md-10">
                                <label for="file" class="form-label">নাম</label>
                                <input type="text" class="form-control" id="file" name="name" required>
                                <label for="file" class="form-label">মূল্য(টাকা)</label>
                                <input type="number" class="form-control" id="file" name="price" required>
                                <label for="file" class="form-label">মূল্য(Premium)</label>
                                <input type="number" class="form-control" id="file" name="premium_price">
                            </div>
                            <button type="submit" class="btn btn-success btn-sm">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
