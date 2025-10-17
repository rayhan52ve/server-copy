<!DOCTYPE html>
<html lang="en">

@php $logo = \App\Models\Logo::latest()->first() @endphp

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset($logo->logo_image) }}" />
    <title>{{ $logo->site_name }}</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    @include('admin.include.style')
    <script src="https://cdn.tiny.cloud/1/xp4eyn58se6am9fbdbbxgjh7cqbmfvr6jk7dtkc90050c2wb/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>



</head>

<body class="skin-blue fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">{{ $logo->site_name }}</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('admin.include.header')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('admin.include.sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                @yield('body')
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->

        <!-- Msg button Start -->
        <!-- Button -->
        <a href="javascript:void(0);" class="msg-button bounce" title="Save Transaction" data-bs-toggle="modal"
            data-bs-target="#rechargeModal">
            <i class="fa-solid fa-dollar-sign" style="color: #e6e2db;padding-top:25%"></i>
        </a>

        <!-- Modal -->
        <div class="modal fade" id="rechargeModal" tabindex="-1" aria-labelledby="rechargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header py-2">
                        <h5 class="modal-title" id="rechargeModalLabel">Save Transaction</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="rechargeForm" action="{{route('admin.pre-transaction.store')}}" method="post">
                            @csrf
                            <div class="mb-2">
                                <label class="form-label">Amount</label>
                                <input type="number" class="form-control form-control-sm" name="amount"
                                    placeholder="Enter amount">
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Transaction ID</label>
                                <input type="text" class="form-control form-control-sm" name="trx_id"
                                    placeholder="Enter TRX ID">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm w-100">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Msg button End -->

        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        @include('admin.include.footer')
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    @include('admin.include.script')

    @include('sweetalert::alert')
    {{-- @include('sweetalert::alert') --}}

    @include('admin.include.pusher')

</body>

</html>
