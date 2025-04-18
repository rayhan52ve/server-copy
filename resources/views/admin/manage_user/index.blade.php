@extends('admin.master')
@section('body')
    @php
        $moderatorAccess = \App\Models\ModeratorAccess::where('user_id', auth()->user()->id)->first();
        $now = \Carbon\Carbon::now();
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
                                <th><input name="all_checked" type="checkbox"></th>
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
                                    <td><input name="checked[]" value="{{ $item->id }}" type="checkbox"></td>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name ?? null }}</td>
                                    <td>{{ $item->email ?? null }}</td>
                                    <td>{{ $item->balance ?? 0 }}</td>
                                    @if (url()->current() == route('admin.manage-user.index') || url()->current() == route('admin.inactiveUser'))
                                        <td>
                                            @if ($item->premium == 2 && $now < $item->premium_end)
                                                <a style="width: 70px" href="" data-toggle="modal"
                                                    data-target="#makeCasualModal{{ $item->id }}"
                                                    class="btn btn-sm btn-primary">Premium</a>
                                            @else
                                                <a style="width: 70px" href="" data-toggle="modal"
                                                    data-target="#makePremiumModal{{ $item->id }}"
                                                    class="btn btn-sm btn-success">Casual</a>
                                            @endif
                                        </td>
                                        <td>
                                            {{-- <a onclick="sweetConfirmation(event)"
                                                href="{{ route('admin.activeStatus', $item->id) }}"
                                                class="btn btn-sm btn-rounded btn-outline-{{ $item->status == 1 ? 'cyan' : 'danger' }}">
                                                {{ $item->status == 1 ? 'Active' : 'Inactive' }}
                                            </a> --}}
                                            <button type="button"
                                                class="btn btn-sm btn-rounded btn-outline-{{ $item->status == 1 ? 'cyan' : 'danger' }} change-selected-status">
                                                {{ $item->status == 1 ? 'Active' : 'Inactive' }}
                                            </button>
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
                                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                                data-target="#popupMessageModal{{ $item->id }}"><i
                                                    class="fa-regular fa-comment"></i></button>

                                            {{-- <form id="{{ 'form_' . $item->id }}"
                                                    action="{{ route('admin.manage-user.destroy', $item->id) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="button" class="btn btn-sm btn-danger delete"
                                                        title="Delete" data-id="{{ $item->id }}">
                                                        <i class="icon-trash"></i>
                                                    </button>
                                                </form> --}}
                                            <button type="button" class="btn btn-sm btn-danger delete-selected">
                                                <i class="icon-trash"></i>
                                            </button>
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
                                <!--Make popupMessageModal Modal -->
                                <div class="modal fade" id="popupMessageModal{{ $item->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="uploadModalLabel">Popup Message Box </h4><br>

                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <small class="text-success">To: {{ $item->name ?? null }}</small>
                                                <form action="{{ route('admin.popupMessage') }}" method="POST">
                                                    @csrf
                                                    <div class="form-group ">
                                                        {{-- <label for="file" class="form-label">Write a message</label> --}}
                                                        <textarea name="message" class="form-control" placeholder="Write a message" id="" cols="30"
                                                            rows="4" required></textarea>
                                                    </div>
                                                    <input type="hidden" name="user_id" value="{{ $item->id }}">
                                                    <div class="text-center">
                                                        <button type="submit"
                                                            class="btn btn-outline-success w-100">Send</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Make Premium Modal -->
                                <div class="modal fade" id="makePremiumModal{{ $item->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="uploadModalLabel"></h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h3 class="text-center">Make this user Premium?</h3>
                                                <form action="{{ route('admin.userPremiumStatus', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group text-center">
                                                        <label for="file" class="form-label">Select
                                                            Duration (Days)</label>
                                                        <input type="text" class="form-control text-center"
                                                            id="file" placeholder="Select Account Duration"
                                                            value="{{ App\Models\Premium::first()->subscription_days }}"
                                                            name="manual_subscription_days" required>
                                                        <input type="hidden" name="is_premium" value="1">
                                                    </div>
                                                    <div class="d-flex justify-content-center mt-3">
                                                        <button type="submit" class="btn btn-success mx-1">Yes</button>
                                                        <button type="button" class="btn btn-danger mx-1"
                                                            data-dismiss="modal">NO</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Make Casual Modal -->
                                <div class="modal fade" id="makeCasualModal{{ $item->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="makeCasualModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="makeCasualModalLabel">
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h3 class="text-center my-3">Make this user Casual?</h3>
                                                <form action="{{ route('admin.userPremiumStatus', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="is_premium" value="0">
                                                    <div class="d-flex justify-content-center mt-5">
                                                        <button type="submit" class="btn btn-success mx-1">Yes</button>
                                                        <button type="button" class="btn btn-danger mx-1"
                                                            data-dismiss="modal">NO</button>
                                                    </div>
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
        <!-- Status Selection Modal -->
        <div class="modal fade" id="statusSelectionModal" tabindex="-1" role="dialog"
            aria-labelledby="statusSelectionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadModalLabel">Are you sure?</h5>
                        <button type="button" class="close" onclick="closeModal()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-center">Select Status</h3>
                        <div class="form-group text-center">
                            <select class="form-control text-center" id="statusSelect">
                                <option value="1"
                                    {{ url()->current() == route('admin.inactiveUser') ? 'selected' : '' }}>Active</option>
                                <option value="0"
                                    {{ url()->current() != route('admin.inactiveUser') ? 'selected' : '' }}>Inactive
                                </option>

                            </select>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <button type="button" class="btn btn-secondary mx-1" onclick="closeModal()">Close</button>
                            <button type="submit" class="btn btn-success mx-1" id="confirmStatusChange">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function closeModal() {
                $('#statusSelectionModal').modal('hide');
            }
        </script>


        <!-- Multiple Status form -->
        <form id="multipleStatusform" action="{{ route('admin.multipleStatus') }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="checked_user_ids[]" id="checked_user_ids">
            <input type="hidden" name="status" id="statusInput">
        </form>
    </div>
    {{-- multiple deletion form --}}
    <form id="multipleDeleteform" onsubmit="return false;" action="{{ route('admin.multipleDelete') }}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="checked_user_ids[]" id="checked_user_ids">
    </form>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function sweetConfirmation(event) {
            event.preventDefault();

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


        $('.delete').on('click', function() {
            let id = $(this).attr('data-id')

            Swal.fire({
                title: 'Are you sure you want to delete?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(`#form_${id}`).submit()

                }
            })
        })
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".delete-selected").forEach(button => {
                button.addEventListener("click", function() {
                    let selectedUsers = document.querySelectorAll(
                        'input[name="checked[]"]:checked');
                    let selectedUserIds = Array.from(selectedUsers).map(checkbox => checkbox.value);

                    if (selectedUserIds.length === 0) {
                        Swal.fire({
                            title: "No user is selected!",
                            text: "Please select at least one user to delete.",
                            icon: "warning",
                            confirmButtonText: "OK"
                        });
                        return;
                    }

                    Swal.fire({
                        title: 'Are you sure to delete?',
                        text: "All the selected users will be deleted permanently.",
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes',
                        cancelButtonText: 'No'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            let statusForm = document.querySelector("#multipleDeleteform");
                            let inputContainer = document.createElement("div");

                            // Remove old inputs to prevent duplication
                            document.querySelectorAll("input[name='checked_user_ids[]']")
                                .forEach(el => el.remove());

                            // Create hidden input fields for each selected ID
                            selectedUserIds.forEach(id => {
                                let input = document.createElement("input");
                                input.type = "hidden";
                                input.name = "checked_user_ids[]";
                                input.value = id;
                                inputContainer.appendChild(input);
                            });

                            statusForm.appendChild(inputContainer);
                            statusForm.submit();
                        }
                    });
                });
            });

            document.addEventListener("click", function(event) {
                if (event.target.classList.contains("change-selected-status")) {
                    let selectedUsers = document.querySelectorAll('input[name="checked[]"]:checked');
                    let selectedUserIds = Array.from(selectedUsers).map(checkbox => checkbox.value);

                    if (selectedUserIds.length === 0) {
                        Swal.fire({
                            title: "No user is selected!",
                            text: "Please select at least one user to change status.",
                            icon: "warning",
                            confirmButtonText: "OK"
                        });
                        return;
                    }

                    // Store the selected user IDs in a data attribute
                    $('#statusSelectionModal').data('selectedUserIds', selectedUserIds);

                    // Show the Bootstrap modal
                    $('#statusSelectionModal').modal('show');
                }
            });


            // Handle the confirm button in the modal
            document.getElementById('confirmStatusChange').addEventListener('click', function() {
                let form = document.querySelector("#multipleStatusform");
                let selectedUserIds = $('#statusSelectionModal').data('selectedUserIds');
                let selectedStatus = document.getElementById('statusSelect').value;

                // Clear any existing hidden inputs
                document.querySelectorAll("input[name='checked_user_ids[]']").forEach(el => {
                    if (el.id !== 'checked_user_ids') el.remove();
                });

                // Add the status to the form
                document.getElementById('statusInput').value = selectedStatus;

                // Create hidden inputs for each selected user ID
                selectedUserIds.forEach(id => {
                    let input = document.createElement("input");
                    input.type = "hidden";
                    input.name = "checked_user_ids[]";
                    input.value = id;
                    form.appendChild(input);
                });

                // Submit the form
                form.submit();

                // Hide the modal
                $('#statusSelectionModal').modal('hide');
            });

            const allChecked = document.querySelector("input[name='all_checked']");
            const checkboxes = document.querySelectorAll("input[name='checked[]']");

            if (allChecked) {
                allChecked.addEventListener("change", function() {
                    checkboxes.forEach(checkbox => {
                        checkbox.checked = allChecked.checked;
                    });
                });
            }

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener("change", function() {
                    if (!this.checked) {
                        allChecked.checked = false;
                    } else {
                        allChecked.checked = [...checkboxes].every(chk => chk.checked);
                    }
                });
            });
        });
    </script>
@endsection
