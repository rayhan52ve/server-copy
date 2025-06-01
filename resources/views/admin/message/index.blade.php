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
                        <div class="row pt-1">
                            <div class="col-md-8">
                                <label>আইডি কার্ড ফাইল নোট</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->id_card_file_note ?? null }}" name="id_card_file_note" placeholder="আইডি কার্ড ফাইল আপলোড নোট">
                            </div>
                            
                        </div>

                    </div>
                    <div class="form-group py-2">
                        <div class="row">
                            <div class="col-md-8">
                                <label>আইডি কার্ড <small><b>নাম-ঠিকানা</b></small></label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->name_address_id ?? null }}" name="name_address_id" placeholder="আইডি কার্ড মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>আইডি কার্ড মূল্য <small><b>নাম-ঠিকানা</b></small></label>
                                <input type="number" class="form-control" rows="5"
                                    value="{{ $message->name_address_id_price ?? null }}" name="name_address_id_price"
                                    placeholder="0">
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-md-8">
                                <label>আইডি কার্ড <small><b>নাম-ঠিকানা</b></small> (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_name_address_id ?? null }}" name="premium_name_address_id" placeholder="আইডি কার্ড মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>আইডি কার্ড মূল্য <small><b>নাম-ঠিকানা</b></small> (Premium)</label>
                                <input type="number" class="form-control" rows="5"
                                    value="{{ $message->premium_name_address_id_price ?? null }}" name="premium_name_address_id_price"
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
                                <label>ভ্যাক্সিনেশন সার্টিফিকেট</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->vaccin ?? null }}" name="vaccin"
                                    placeholder="ভ্যাক্সিনেশন সার্টিফিকেট মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>ভ্যাক্সিনেশন সার্টিফিকেট মূল্য</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->vaccin_price ?? null }}" name="vaccin_price"
                                    placeholder="0">
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-md-8">
                                <label>ভ্যাক্সিনেশন সার্টিফিকেট (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_vaccin ?? null }}" name="premium_vaccin"
                                    placeholder="ভ্যাক্সিনেশন সার্টিফিকেট মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>ভ্যাক্সিনেশন সার্টিফিকেট মূল্য (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_vaccin_price ?? null }}" name="premium_vaccin_price"
                                    placeholder="0">

                                <label>ভ্যাক্সিনেশন সার্টিফিকেট মূল্য (Remake)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->vaccin_remake_price ?? null }}" name="vaccin_remake_price"
                                    placeholder="0">
                            </div>
                        </div>

                    </div>

                    <div class="form-group py-2">
                        <div class="row">
                            <div class="col-md-8">
                                <label>এনআইডি <small class=""><b>Auto</b></small></label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->nid_auto ?? null }}" name="nid_auto"
                                    placeholder="এনআইডি Auto মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>এনআইডি <small class=""><b>Auto</b></small> মূল্য</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->nid_auto_price ?? null }}" name="nid_auto_price"
                                    placeholder="0">
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-md-8">
                                <label>এনআইডি <small class=""><b>Auto</b></small> (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_nid_auto ?? null }}" name="premium_nid_auto"
                                    placeholder="এনআইডি Auto মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>এনআইডি <small class=""><b>Auto</b></small> মূল্য (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_nid_auto_price ?? null }}" name="premium_nid_auto_price"
                                    placeholder="0">
                                <label>এনআইডি <small class=""><b>Auto Search</b></small> মূল্য</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->nid_auto_search_price ?? null }}" name="nid_auto_search_price"
                                    placeholder="0">

                                {{-- <label>এনআইডি মেক মূল্য (Remake)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->nid_remake ?? null }}" name="nid_remake"
                                    placeholder="0"> --}}
                            </div>
                        </div>

                    </div>

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

                                <label>এনআইডি মেক মূল্য (Remake)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->nid_remake ?? null }}" name="nid_remake"
                                    placeholder="0">
                            </div>
                        </div>

                    </div>

                    <div class="form-group py-2">
                        <div class="row">
                            <div class="col-md-8">
                                <label>ইউজার পাসওয়ার্ড সেট <small><b>NID Card</b></small></label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->user_pass_nid ?? null }}" name="user_pass_nid" placeholder="ইউজার পাসওয়ার্ড সেট (NID Card) মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>ইউজার পাসওয়ার্ড সেট মূল্য<small><b>NID Card</b></small></label>
                                <input type="number" class="form-control" rows="5"
                                    value="{{ $message->user_pass_nid_price ?? null }}" name="user_pass_nid_price"
                                    placeholder="0">
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-md-8">
                                <label>ইউজার পাসওয়ার্ড সেট <small><b>NID Card</b></small> (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_user_pass_nid ?? null }}" name="premium_user_pass_nid" placeholder="ইউজার পাসওয়ার্ড সেট (NID Card) মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>ইউজার পাসওয়ার্ড সেট মূল্য <small><b>NID Card</b></small> (Premium)</label>
                                <input type="number" class="form-control" rows="5"
                                    value="{{ $message->premium_user_pass_nid_price ?? null }}" name="premium_user_pass_nid_price"
                                    placeholder="0">
                            </div>
                        </div>

                    </div>

                    <div class="form-group py-2">
                        <div class="row">
                            <div class="col-md-8">
                                <label>এনআইডি সংশোধন ফর্ম উত্তোলন</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->nid_lost_form ?? null }}" name="nid_lost_form" placeholder="ইউজার পাসওয়ার্ড সেট (NID Card) মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>এনআইডি সংশোধন ফর্ম উত্তোলন মূল্য</label>
                                <input type="number" class="form-control" rows="5"
                                    value="{{ $message->nid_lost_form_price ?? null }}" name="nid_lost_form_price"
                                    placeholder="0">
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-md-8">
                                <label>এনআইডি সংশোধন ফর্ম উত্তোলন (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_nid_lost_form ?? null }}" name="premium_nid_lost_form" placeholder="ইউজার পাসওয়ার্ড সেট (NID Card) মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>এনআইডি সংশোধন ফর্ম উত্তোলন (Premium)</label>
                                <input type="number" class="form-control" rows="5"
                                    value="{{ $message->premium_nid_lost_form_price ?? null }}" name="premium_nid_lost_form_price"
                                    placeholder="0">
                            </div>
                        </div>

                    </div>
                    <div class="form-group py-2">
                        <div class="row">
                            <div class="col-md-8">
                                <label>নতুন জন্ম নিবন্ধন</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->birth_order ?? null }}" name="birth_order"
                                    placeholder="নতুন জন্ম নিবন্ধন মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>নতুন জন্ম নিবন্ধন মূল্য</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->birth_order_price ?? null }}" name="birth_order_price"
                                    placeholder="0">
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-md-8">
                                <label>নতুন জন্ম নিবন্ধন (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->birth_order_premium ?? null }}" name="birth_order_premium"
                                    placeholder="জন্ম নিবন্ধন মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>নতুন জন্ম নিবন্ধন মূল্য (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->birth_order_premium_price ?? null }}" name="birth_order_premium_price"
                                    placeholder="0">
                            </div>
                        </div>
                        {{-- <div class="row pt-1">
                            <div class="col-md-8">
                                
                            </div>
                            <div class="col-md-4">
                                <label>নতুন জন্ম নিবন্ধন মূল্য (Remake)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->birth_order_remake ?? null }}" name="birth_order_remake"
                                    placeholder="0">
                            </div>
                        </div> --}}

                    </div>
                    <div class="form-group py-2">
                        <div class="row">
                            <div class="col-md-8">
                                <label>জন্ম নিবন্ধন প্রতিলিপি</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->birth ?? null }}" name="birth"
                                    placeholder="জন্ম নিবন্ধন মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>জন্ম নিবন্ধন প্রতিলিপি মূল্য</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->birth_price ?? null }}" name="birth_price"
                                    placeholder="0">
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-md-8">
                                <label>জন্ম নিবন্ধন প্রতিলিপি (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_birth ?? null }}" name="premium_birth"
                                    placeholder="জন্ম নিবন্ধন মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>জন্ম নিবন্ধন প্রতিলিপি মূল্য (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_birth_price ?? null }}" name="premium_birth_price"
                                    placeholder="0">
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-md-8">
                                
                            </div>
                            <div class="col-md-4">
                                <label>জন্ম নিবন্ধন প্রতিলিপি মূল্য (Remake)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->birth_remake ?? null }}" name="birth_remake"
                                    placeholder="0">
                            </div>
                        </div>

                    </div>
                    <div class="form-group py-2">
                        <div class="row">
                            <div class="col-md-8">
                                <label>সার্ভার কপি <small><b>Unofficial-1 </b></small></label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->server_unofficial ?? null }}" name="server_unofficial"
                                    placeholder="Server Copy Unofficial">
                            </div>
                            <div class="col-md-4">
                                <label>সার্ভার কপি <small><b>Unofficial-1 </b></small> মূল্য</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->server_unofficial_price ?? null }}" name="server_unofficial_price"
                                    placeholder="0">
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-md-8">
                                <label>সার্ভার কপি <small><b>Unofficial-1 </b></small>(Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_server_unofficial ?? null }}" name="premium_server_unofficial"
                                    placeholder="Server Copy Unofficial">
                            </div>
                            <div class="col-md-4">
                                <label>সার্ভার কপি <small><b>Unofficial-1 </b></small> মূল্য (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_server_unofficial_price ?? null }}" name="premium_server_unofficial_price"
                                    placeholder="0">
                                <label>সার্ভার কপি <small><b>Unofficial-1 </b></small> মূল্য (Remake)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->servercopy_remake ?? null }}" name="servercopy_remake"
                                    placeholder="0">
                            </div>
                        </div>

                    </div>
                    <div class="form-group py-2">
                        <div class="row">
                            <div class="col-md-8">
                                <label>সার্ভার কপি <small><b>Unofficial-2 </b></small></label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->voter_info ?? null }}" name="voter_info"
                                    placeholder="Voter Info">
                            </div>
                            <div class="col-md-4">
                                <label>সার্ভার কপি <small><b>Unofficial-2 </b></small> মূল্য</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->voter_info_price ?? null }}" name="voter_info_price"
                                    placeholder="0">
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-md-8">
                                <label>সার্ভার কপি <small><b>Unofficial-2 </b></small> (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->voter_info_premium ?? null }}" name="voter_info_premium"
                                    placeholder="Voter Info">
                            </div>
                            <div class="col-md-4">
                                <label>সার্ভার কপি <small><b>Unofficial-2 </b></small> মূল্য (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->voter_info_premium_price ?? null }}" name="voter_info_premium_price"
                                    placeholder="0">
                                {{-- <label>সার্ভার কপি <small><b>Unofficial-2 </b></small> মূল্য (Remake)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->voter_info_remake_price ?? null }}" name="	voter_info_remake_price"
                                    placeholder="0"> --}}
                            </div>
                        </div>

                    </div>
                    <div class="form-group py-2">
                        <div class="row">
                            <div class="col-md-8">
                                <label>টিন সার্টিফিকেট</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->sign_to_server ?? null }}" name="sign_to_server"
                                    placeholder="টিন সার্টিফিকেট">
                            </div>
                            <div class="col-md-4">
                                <label>টিন সার্টিফিকেট মূল্য</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->sign_to_server_price ?? null }}" name="sign_to_server_price"
                                    placeholder="0">
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-md-8">
                                <label>টিন সার্টিফিকেট (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_sign_to_server ?? null }}" name="premium_sign_to_server"
                                    placeholder="টিন সার্টিফিকেট">
                            </div>
                            <div class="col-md-4">
                                <label>টিন সার্টিফিকেট মূল্য (Premium)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->premium_sign_to_server_price ?? null }}" name="premium_sign_to_server_price"
                                    placeholder="0">
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-md-8">
                            </div>
                            <div class="col-md-4">
                                <label>টিন সার্টিফিকেট মূল্য (Remake)</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->sign_to_server_remake ?? null }}" name="sign_to_server_remake"
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

                    <div class="form-group py-2">
                        <div class="row">
                            <div class="col-md-8">
                                <label>অ্যাকাউন্ট অ্যাকটিভেশন</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->active_status ?? null }}" name="active_status"
                                    placeholder="অ্যাকাউন্ট অ্যাকটিভেশন মেসেজ">
                            </div>
                            <div class="col-md-4">
                                <label>অ্যাকাউন্ট অ্যাকটিভেশন মূল্য</label>
                                <input type="text" class="form-control" rows="5"
                                    value="{{ $message->active_status_price ?? null }}" name="active_status_price"
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
