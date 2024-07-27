@extends('admin.master')
@section('body')
    @php
        $moderatorAccess = \App\Models\ModeratorAccess::where('user_id', auth()->user()->id)->first();
    @endphp
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3>{{ $pagetitle }}</h3>
                    {{-- <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#createModal">Create
                        Biometric Type</button> --}}

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="config-table" class="table display table-striped border no-wrap">
                        <thead>
                            <tr>
                                <th>সিরিয়াল</th>
                                <th>নাম</th>
                                <th>ইমেইল</th>
                                <th>ব্যালেন্স(টাকা)</th>
                                @if (url()->current() == route('admin.manage-user.index'))
                                    <th>ইউজার টাইপ</th>
                                @endif
                                <th>অ্যাকশান</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name ?? null }}</td>
                                    <td>{{ $item->email ?? null }}</td>
                                    <td>{{ $item->balance ?? 0 }}</td>
                                    @if (url()->current() == route('admin.manage-user.index'))
                                        <td>
                                            <a href="{{ route('admin.userPremiumStatus', $item->id) }}"
                                                onclick="return confirm('Are you sure?')"
                                                class="btn btn-sm btn-{{ $item->premium == 2 ? 'primary' : 'success' }}">{{ $item->premium == 2 ? 'Premium' : 'Casual' }}</a>
                                        </td>
                                    @endif
                                    <td>
                                        @if (auth()->user()->is_admin == 1 || @$moderatorAccess->user_edit == 1)
                                            @if (url()->current() == route('admin.moderatorList'))
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('admin.moderator-access.show', $item->moderatorAccess?->id) }}">Permission</a>
                                            @endif
                                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                                                data-target="#editModal{{ $item->id }}">Edit</button>

                                            <form action="{{ route('admin.manage-user.destroy', $item->id) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this user?')">
                                                    <i class="icon-trash"></i>
                                                </button>
                                            </form>
                                        @endif

                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="uploadModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="uploadModalLabel">Edit User</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.manage-user.update', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group col-md-10">
                                                        <label for="file" class="form-label">নাম</label>
                                                        <input type="text" class="form-control" id="file"
                                                            value="{{ $item->name }}" name="name" required>
                                                        <label for="file" class="form-label">ইমেইল</label>
                                                        <input type="text" class="form-control" id="file"
                                                            value="{{ $item->email }}" name="email" required>
                                                        <label for="password" class="form-label">নতুন পাসওয়ার্ড</label>
                                                        <input type="text" value="{{ $item->decryptedPassword }}"
                                                            class="form-control" id="password" name="password">
                                                        <label for="file" class="form-label">ব্যালেন্স(টাকা)</label>
                                                        <input type="number" class="form-control"
                                                            value="{{ $item->balance }}" name="balance" placeholder="0">
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
        {{-- <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel"
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
                            </div>
                            <button type="submit" class="btn btn-success btn-sm">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
