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
                        <label>আইডি কার্ড <small><b>নাম-ঠিকানা</b></small></label>
                        <input type="text" class="form-control" rows="5" value="{{ $notice->name_address_id ?? null }}"
                            name="name_address_id" placeholder="আইডি কার্ড (নাম-ঠিকানা) নোটিশ">
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
                            name="old_nid" placeholder=" এনআইডি নোটিশ">
                    </div>
                    <div class="form-group py-2">
                        <label>ইউজার পাসওয়ার্ড সেট <small><b>NID Card</b></small></label>
                        <input type="text" class="form-control" rows="5" value="{{ $notice->user_pass_nid ?? null }}"
                            name="user_pass_nid" placeholder="ইউজার পাসওয়ার্ড সেট (NID) নোটিশ">
                    </div>
                    <div class="form-group py-2">
                        <label>এনআইডি সংশোধন ফর্ম উত্তোলন</label>
                        <input type="text" class="form-control" rows="5" value="{{ $notice->nid_lost_form ?? null }}"
                            name="nid_lost_form" placeholder="এনআইডি সংশোধন ফর্ম উত্তোলন নোটিশ">
                    </div>
                    <div class="form-group py-2">
                        <label>নতুন জন্ম নিবন্ধন</label>
                        <input type="text" class="form-control" rows="5" value="{{ $notice->birth_order ?? null }}"
                            name="birth_order" placeholder="নতুন জন্ম নিবন্ধন নোটিশ">
                    </div>
                    <div class="form-group py-2">
                        <label>জন্ম নিবন্ধন প্রতিলিপি</label>
                        <input type="text" class="form-control" rows="5" value="{{ $notice->birth ?? null }}"
                            name="birth" placeholder="জন্ম নিবন্ধন প্রতিলিপি নোটিশ">
                    </div>
                    <div class="form-group py-2">
                        <label>সার্ভার কপি <small><b>Unofficial-1</b></small> </label>
                        <input type="text" class="form-control" rows="5" value="{{ $notice->server_unofficial ?? null }}"
                            name="server_unofficial" placeholder="">
                    </div>
                    <div class="form-group py-2">
                        <label>সার্ভার কপি <small><b>Unofficial-2 </b></small> </label>
                        <input type="text" class="form-control" rows="5" value="{{ $notice->voter_info ?? null }}"
                            name="voter_info" placeholder="">
                    </div>
                    <div class="form-group py-2">
                        <label>টিন সার্টিফিকেট </label>
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
                    <div class="form-group py-2">
                        <label>অ্যাকাউন্ট অ্যাকটিভেশন</label>
                        <input type="text" class="form-control" rows="5" value="{{ $notice->active_status ?? null }}"
                            name="active_status" placeholder="">
                    </div>

                    <div class="table-responsive">
                        <button type="submit" class="btn btn-info form-control">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
