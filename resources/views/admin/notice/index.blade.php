@extends('admin.master')
@section('body')
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3>নোটিশ সেটিংস</h3>

                </div>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('admin.notice.store') }}" method="POST">
                    @csrf
                    <div class="form-group py-2">
                        <label>ড্যাশবোর্ড নোটিশ</label>
                        <input type="text" class="form-control" rows="5" value="{{ $notice->dashboard ?? null }}"
                            name="dashboard" placeholder="ড্যাশবোর্ড নোটিশ">
                    </div>
                    <div class="form-group py-2">
                        <label>সাইন কপি</label>
                        <input type="text" class="form-control" rows="5" value="{{ $notice->sign_copy ?? null }}"
                            name="sign_copy" placeholder="সাইন কপি নোটিশ">
                    </div>
                    <div class="form-group py-2">
                        <label>সার্ভার কপি</label>
                        <input type="text" class="form-control" rows="5" value="{{ $notice->server_copy ?? null }}"
                            name="server_copy" placeholder="সার্ভার কপি নোটিশ">
                    </div>
                    <div class="form-group py-2">
                        <label>আইডি কার্ড</label>
                        <input type="text" class="form-control" rows="5" value="{{ $notice->id_card ?? null }}"
                            name="id_card" placeholder="আইডি কার্ড নোটিশ">
                    </div>
                    <div class="form-group py-2">
                        <label>বায়োমেট্রিক তথ্য</label>
                        <input type="text" class="form-control" rows="5" value="{{ $notice->biometric ?? null }}"
                            name="biometric" placeholder="বায়োমেট্রিক তথ্য নোটিশ">
                    </div>
                    {{-- <div class="form-group py-2">
                        <label>নতুন এনআইডি</label>
                        <input type="text" class="form-control" rows="5" value="{{ $notice->new_nid ?? null }}"
                            name="new_nid" placeholder="নতুন এনআইডি নোটিশ">
                    </div> --}}
                    <div class="form-group py-2">
                        <label>এনআইডি মেক</label>
                        <input type="text" class="form-control" rows="5" value="{{ $notice->old_nid ?? null }}"
                            name="old_nid" placeholder=" নআইডি নোটিশ">
                    </div>
                    <div class="form-group py-2">
                        <label>নতুন নিবন্ধন</label>
                        <input type="text" class="form-control" rows="5" value="{{ $notice->birth ?? null }}"
                            name="birth" placeholder="নতুন নিবন্ধন নোটিশ">
                    </div>
                    <div class="form-group py-2">
                        <label>সার্ভার কপি (Unofficial) </label>
                        <input type="text" class="form-control" rows="5" value="{{ $notice->server_unofficial ?? null }}"
                            name="server_unofficial" placeholder="">
                    </div>
                    <div class="form-group py-2">
                        <label>সাইন টু সার্ভার কপি </label>
                        <input type="text" class="form-control" rows="5" value="{{ $notice->sign_to_server ?? null }}"
                            name="sign_to_server" placeholder="">
                    </div>
                    <div class="form-group py-2">
                        <label>ম্যানুয়াল রিচার্জ </label>
                        <input type="text" class="form-control" rows="5" value="{{ $notice->recharge ?? null }}"
                            name="recharge" placeholder="">
                    </div>
                    <div class="form-group py-2">
                        <label>অটো রিচার্জ(Bkash) </label>
                        <input type="text" class="form-control" rows="5" value="{{ $notice->recharge_bkash ?? null }}"
                            name="recharge_bkash" placeholder="">
                    </div>

                    <div class="table-responsive">
                        <button type="submit" class="btn btn-info form-control">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection