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
                                @if (url()->current() == route('admin.manage-user.index') || url()->current() == route('admin.inactiveUser'))
                                    <th>ইউজার টাইপ</th>
                                    <th>স্ট্যাটাস</th>
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
                                    @if (url()->current() == route('admin.manage-user.index') || url()->current() == route('admin.inactiveUser'))
                                        <td>
                                            <a style="width: 70px" href="{{ route('admin.userPremiumStatus', $item->id) }}"
                                                onclick="sweetConfirmation(event)"
                                                class="btn btn-sm btn-{{ $item->premium == 2 ? 'primary' : 'success' }}">{{ $item->premium == 2 ? 'Premium' : 'Casual' }}</a>
                                        </td>
                                        <td>
                                            <a onclick="sweetConfirmation(event)"
                                                href="{{ route('admin.activeStatus', $item->id) }}"
                                                class="btn btn-sm btn-rounded btn-outline-{{ $item->status == 1 ? 'cyan' : 'danger' }}">
                                                {{ $item->status == 1 ? 'Active' : 'Inactive' }}
                                            </a>
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
                                                        <label for="number" class="form-label">ব্যালেন্স(টাকা)</label>
                                                        <input type="number" class="form-control"
                                                            value="{{ $item->balance }}" name="balance" placeholder="0">
                                                        <label for="add_balance" class="form-label">ব্যালেন্স যোগ
                                                            করুন</label>
                                                        <input type="number" class="form-control" name="add_balance"
                                                            placeholder="0">
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
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function sweetConfirmation(event) {
            event.preventDefault(); // Prevent the link from being followed immediately

            Swal.fire({
                title: 'Are you sure?',
                // text: "Change account active status.",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = event.target.href;
                }
            });
        }
    </script>
@endsection
