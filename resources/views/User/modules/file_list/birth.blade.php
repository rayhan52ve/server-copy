@extends('User.layout.master')
@section('user')
    <style>
        .card-header {
            background-color: #007bff;
            color: #fff;
        }
    </style>
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h1 class="h3">File List</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="" class="table display table-striped border no-wrap">
                                <h3 class="text-center">জন্ম নিবন্ধন লিস্ট</h3>
                                <thead>
                                    <tr>
                                        <th>সিরিয়াল</th>
                                        <th>নাম</th>
                                        <th>পিতার নাম</th>
                                        <th>মাতার নাম</th>
                                        <th>জন্ম তারিখ</th>
                                        <th>ক্রিয়েটেড</th>
                                        <th>ডাউনলোড</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($new_regs as $key => $item)
                                        <tr>
                                            <td>{{  $key + 1 }}</td>
                                            <td>{{ $item->name ?? null }}</td>
                                            <td>{{ $item->fatherName ?? null }}</td>
                                            <td>{{ $item->motherName ?? null }}</td>
                                            <td>{{ $item->dob ?? null }}</td>
                                            <td>{{ @$item->created_at->toDayDateTimeString() }}</td>
                                            <td>
                                                <a href="{{ route('print.savedBirth', $item->id) }}"
                                                    class="btn btn-success btn-sm printBirth">
                                                    <i class="fa-solid fa-download"></i>
                                                    Print
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Pagination for NIDs -->
                            <div class="d-flex justify-content-center">
                                {{ $new_regs->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
        $birthPriceAlert = $message->birth_remake;
    @endphp
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {

            $('.printBirth').on('click', function(event) {
                event.preventDefault(); // Prevent the default form submission triggered by the button click
                let url = $(this).attr('href');

                Swal.fire({
                    title: 'এনআইডি',
                    text: "এই কার্ডটি প্রিন্ট করার জন্য আপনার অ্যাকাউন্ট থেকে {{ $birthPriceAlert }} টাকা কর্তন করা হবে।",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'হ্যাঁ, জমা দিন!',
                    cancelButtonText: 'না, বাতিল করুন!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url; // Redirect to the link's URL
                    }
                });
            });
        });
    </script>
@endsection
