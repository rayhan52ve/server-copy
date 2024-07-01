@extends('admin.master')
@section('body')
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3>মেসেজ সেটিংস</h3>

                </div>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('admin.message.store') }}" method="POST">
                    @csrf
                    <div class="form-group py-2">
                        <div class="row">
                            <div class="col-md-8">
                                <label>সাইন কপি</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->sign_copy ?? null }}" name="sign_copy" placeholder="সাইন কপি মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>সাইন কপি মূল্য</label>
                                <input type="number" class="form-control" rows="5"
                                    value="{{ $message->sign_copy_price ?? null }}" name="sign_copy_price"
                                    placeholder="0">
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-md-8">
                                <label>সাইন কপি (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_sign_copy ?? null }}" name="premium_sign_copy" placeholder="সাইন কপি মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>সাইন কপি মূল্য (Premium)</label>
                                <input type="number" class="form-control" rows="5"
                                    value="{{ $message->premium_sign_copy_price ?? null }}" name="premium_sign_copy_price"
                                    placeholder="0">
                            </div>
                        </div>
                    </div>
                    <div class="form-group py-2">
                        <div class="row">
                            <div class="col-md-8">
                                <label>সার্ভার কপি</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->server_copy ?? null }}" name="server_copy"
                                    placeholder="সার্ভার কপি মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>সার্ভার কপি মূল্য</label>
                                <input type="number" class="form-control" rows="5"
                                    value="{{ $message->server_copy_price ?? null }}" name="server_copy_price"
                                    placeholder="0">
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-md-8">
                                <label>সার্ভার কপি (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_server_copy ?? null }}" name="premium_server_copy"
                                    placeholder="সার্ভার কপি মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>সার্ভার কপি মূল্য (Premium)</label>
                                <input type="number" class="form-control" rows="5"
                                    value="{{ $message->premium_server_copy_price ?? null }}" name="premium_server_copy_price"
                                    placeholder="0">
                            </div>
                        </div>

                    </div>
                    <div class="form-group py-2">
                        <div class="row">
                            <div class="col-md-8">
                                <label>আইডি কার্ড</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->id_card ?? null }}" name="id_card" placeholder="আইডি কার্ড মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>আইডি কার্ড মূল্য</label>
                                <input type="number" class="form-control" rows="5"
                                    value="{{ $message->id_card_price ?? null }}" name="id_card_price"
                                    placeholder="0">
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-md-8">
                                <label>আইডি কার্ড (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_id_card ?? null }}" name="premium_id_card" placeholder="আইডি কার্ড মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>আইডি কার্ড মূল্য (Premium)</label>
                                <input type="number" class="form-control" rows="5"
                                    value="{{ $message->premium_id_card_price ?? null }}" name="premium_id_card_price"
                                    placeholder="0">
                            </div>
                        </div>

                    </div>
                    {{-- <div class="form-group py-2">
                        <div class="row">
                            <div class="col-md-8">
                                <label>বায়োমেট্রিক তথ্য</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->biometric ?? null }}" name="biometric"
                                    placeholder="বায়োমেট্রিক তথ্য মেসেজ">
                        </div>
                        <div class="row pt-1">
                            <div class="col-md-8">
                                <label>বায়োমেট্রিক তথ্য (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_biometric ?? null }}" name="premium_biometric"
                                    placeholder="বায়োমেট্রিক তথ্য মেসেজ">
                            </div>

                        </div>

                    </div> --}}
                    {{-- <div class="form-group py-2">
                        <div class="row">
                            <div class="col-md-8">
                                <label>নতুন এনআইডি</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->new_nid ?? null }}" name="new_nid" placeholder="নতুন এনআইডি মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>নতুন এনআইডি মূল্য</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->new_nid_price ?? null }}" name="new_nid_price"
                                    placeholder="0">
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-md-8">
                                <label>নতুন এনআইডি (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_new_nid ?? null }}" name="premium_new_nid" placeholder="নতুন এনআইডি মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>নতুন এনআইডি মূল্য (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_new_nid_price ?? null }}" name="premium_new_nid_price"
                                    placeholder="0">
                            </div>
                        </div>

                    </div> --}}
                    <div class="form-group py-2">
                        <div class="row">
                            <div class="col-md-8">
                                <label>এনআইডি মেক</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->old_nid ?? null }}" name="old_nid"
                                    placeholder="এনআইডি মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>এনআইডি মেক মূল্য</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->old_nid_price ?? null }}" name="old_nid_price"
                                    placeholder="0">
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-md-8">
                                <label>এনআইডি মেক (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_old_nid ?? null }}" name="premium_old_nid"
                                    placeholder="এনআইডি মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>এনআইডি মেক মূল্য (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_old_nid_price ?? null }}" name="premium_old_nid_price"
                                    placeholder="0">
                            </div>
                        </div>

                    </div>
                    <div class="form-group py-2">
                        <div class="row">
                            <div class="col-md-8">
                                <label>নতুন নিবন্ধন</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->birth ?? null }}" name="birth"
                                    placeholder="নতুন নিবন্ধন মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>নতুন নিবন্ধন মূল্য</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->birth_price ?? null }}" name="birth_price"
                                    placeholder="0">
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-md-8">
                                <label>নতুন নিবন্ধন (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_birth ?? null }}" name="premium_birth"
                                    placeholder="নতুন নিবন্ধন মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>নতুন নিবন্ধন মূল্য (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_birth_price ?? null }}" name="premium_birth_price"
                                    placeholder="0">
                            </div>
                        </div>

                    </div>
                    <div class="form-group py-2">
                        <div class="row">
                            <div class="col-md-8">
                                <label>Server Copy Unofficial</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->server_unofficial ?? null }}" name="server_unofficial"
                                    placeholder="Server Copy Unofficial">
                            </div>
                            <div class="col-md-4">
                                <label>Server Copy Unofficial Price</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->server_unofficial_price ?? null }}" name="server_unofficial_price"
                                    placeholder="0">
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-md-8">
                                <label>Server Copy Unofficial (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_server_unofficial ?? null }}" name="premium_server_unofficial"
                                    placeholder="Server Copy Unofficial">
                            </div>
                            <div class="col-md-4">
                                <label>Server Copy Unofficial Price (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_server_unofficial_price ?? null }}" name="premium_server_unofficial_price"
                                    placeholder="0">
                            </div>
                        </div>

                    </div>
                    <div class="form-group py-2">
                        <div class="row">
                            <div class="col-md-8">
                                <label>Sign To Server Copy</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->sign_to_server ?? null }}" name="sign_to_server"
                                    placeholder="Sign To Server Copy">
                            </div>
                            <div class="col-md-4">
                                <label>Sign To Server Copy Price</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->sign_to_server_price ?? null }}" name="sign_to_server_price"
                                    placeholder="0">
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-md-8">
                                <label>Sign To Server Copy (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_sign_to_server ?? null }}" name="premium_sign_to_server"
                                    placeholder="Sign To Server Copy">
                            </div>
                            <div class="col-md-4">
                                <label>Sign To Server Copy Price (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_sign_to_server_price ?? null }}" name="premium_sign_to_server_price"
                                    placeholder="0">
                            </div>
                        </div>

                    </div>
                    <div class="form-group py-2">
                        <div class="row">
                            <div class="col-md-8">
                                <label>সর্বনিম্ন রিচার্জ মূল্য(Bkash)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->recharge_bkash ?? null }}" name="recharge_bkash"
                                    placeholder="সর্বনিম্ন রিচার্জ মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>সর্বনিম্ন রিচার্জ মূল্য(Bkash)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->recharge_bkash_price ?? null }}" name="recharge_bkash_price"
                                    placeholder="0">
                            </div>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <button type="submit" class="btn btn-info form-control">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
