@extends('admin.master')

@section('body')
    <div class="row justify-content-center mt-3">
        <div class="">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        General Settings
                    </h3>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">

                            <button class="nav-link active" id="v-pills-settings-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-submit" type="button" role="tab"
                                aria-controls="v-pills-settings" aria-selected="true">Form Submit On/Off</button>

                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-logo" type="button" role="tab" aria-controls="v-pills-profile"
                                aria-selected="true">Logo Settings</button>

                            <button class="nav-link" id="v-pills-links-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-links" type="button" role="tab"
                                aria-controls="v-pills-messages" aria-selected="false">Payment Numbers</button>

                            <button class="nav-link" id="v-pills-whatsapp-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-whatsapp" type="button" role="tab"
                                aria-controls="v-pills-messages" aria-selected="false">WhatsApp Group Link</button>

                            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-footer" type="button" role="tab"
                                aria-controls="v-pills-settings" aria-selected="false">Footer</button>

                            {{-- <button class="nav-link" id="" type="button" role="tab">Clear All Order</button> --}}

                            <div class="row my-4 mb-1">
                                <div class="col-12 text-center">
                                    <button class="btn btn-lg btn-outline-danger fw-bold" style="width: 210px"
                                        id="clearOldOrders" title="This action will clear all except pending orders">
                                        <i class="fas fa-trash-alt me-2"></i> Clear All Orders
                                    </button>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 text-center">
                                    <button class="btn btn-lg btn-outline-primary fw-bold" style="width: 210px"
                                        id="clearFileListData" title="This action will clear all except pending orders">
                                        <i class="fas fa-trash-alt me-2"></i> Clear All File List
                                    </button>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 text-center">
                                    <button class="btn btn-lg btn-danger fw-bold" style="width: 210px"
                                        id="clearAllPermanently" title="This action will clear all except pending orders">
                                        <i class="fas fa-trash-alt me-2"></i> Clear All For Users
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="w-75 mx-auto">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-submit" role="tabpanel"
                                    aria-labelledby="v-pills-settings-tab">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">
                                                অপশন হাইড/আনহাইড করুন
                                                <form id="hideUnhideForm" action="{{ route('admin.hide-unhide.store') }}"
                                                    method="post">
                                                    @csrf
                                                    <div class="form-group py-2">
                                                        সাইন কপি
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked1">
                                                                {{ @$hideUnhide->sign_copy == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="sign_copy" value="0">
                                                            <input class="form-check-input" onclick="submitHideUnhideForm()"
                                                                value="1" name="sign_copy" type="checkbox"
                                                                id="flexSwitchCheckChecked1"
                                                                {{ @$hideUnhide->sign_copy == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        সার্ভার কপি
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$hideUnhide->server_copy == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="server_copy" value="0">
                                                            <input class="form-check-input"
                                                                onclick="submitHideUnhideForm()" value="1"
                                                                name="server_copy" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$hideUnhide->server_copy == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        আইডি কার্ড
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$hideUnhide->id_card == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="id_card" value="0">
                                                            <input class="form-check-input"
                                                                onclick="submitHideUnhideForm()" value="1"
                                                                name="id_card" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$hideUnhide->id_card == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        আইডি কার্ড <small><b>নাম-ঠিকানা</b></small>
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$hideUnhide->name_address_id == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="name_address_id" value="0">
                                                            <input class="form-check-input"
                                                                onclick="submitHideUnhideForm()" value="1"
                                                                name="name_address_id" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$hideUnhide->name_address_id == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        বায়োমেট্রিক তথ্য
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$hideUnhide->biometric == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="biometric" value="0">
                                                            <input class="form-check-input"
                                                                onclick="submitHideUnhideForm()" value="1"
                                                                name="biometric" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$hideUnhide->biometric == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>

                                                    {{-- <div class="form-group py-2">
                                                        নতুন এনআইডি
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$submitStatus->new_nid == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="new_nid" value="0">
                                                            <input class="form-check-input" onclick="submitHideUnhideForm()"
                                                                value="1" name="new_nid" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$submitStatus->new_nid == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div> --}}
                                                    <div class="form-group py-2">
                                                        এনআইডি মেক
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$hideUnhide->old_nid == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="old_nid" value="0">
                                                            <input class="form-check-input"
                                                                onclick="submitHideUnhideForm()" value="1"
                                                                name="old_nid" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$hideUnhide->old_nid == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        ইউজার পাসওয়ার্ড সেট <small><b>NID Card</b></small>
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$hideUnhide->user_pass_nid == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="user_pass_nid" value="0">
                                                            <input class="form-check-input"
                                                                onclick="submitHideUnhideForm()" value="1"
                                                                name="user_pass_nid" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$hideUnhide->user_pass_nid == 1 ? 'checked' : '' }}>
                                                            <br>

                                                        </div>
                                                        <div class="form-group d-flex g-1">
                                                        <input type="hidden" name="user_pass_nid_extra" value="0">
                                                        <input class="" onclick="submitHideUnhideForm()"
                                                            value="1" name="user_pass_nid_extra" type="checkbox"
                                                            id="user_pass_nid_extra"
                                                            {{ @$hideUnhide->user_pass_nid_extra == 1 ? 'checked' : '' }}>
                                                        <label for="user_pass_nid_extra"
                                                            class="px-1">Address Fields</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        এনআইডি সংশোধন ফর্ম উত্তোলন
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$hideUnhide->nid_lost_form == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="nid_lost_form" value="0">
                                                            <input class="form-check-input"
                                                                onclick="submitHideUnhideForm()" value="1"
                                                                name="nid_lost_form" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$hideUnhide->nid_lost_form == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        নতুন জন্ম নিবন্ধন
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$hideUnhide->birth_order == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="birth_order" value="0">
                                                            <input class="form-check-input"
                                                                onclick="submitHideUnhideForm()" value="1"
                                                                name="birth_order" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$hideUnhide->birth_order == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        জন্ম নিবন্ধন প্রতিলিপি
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$hideUnhide->birth == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="birth" value="0">
                                                            <input class="form-check-input"
                                                                onclick="submitHideUnhideForm()" value="1"
                                                                name="birth" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$hideUnhide->birth == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        সার্ভার কপি <small><b>Unofficial-1</b></small>
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$hideUnhide->server_unofficial == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="server_unofficial"
                                                                value="0">
                                                            <input class="form-check-input"
                                                                onclick="submitHideUnhideForm()" value="1"
                                                                name="server_unofficial" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$hideUnhide->server_unofficial == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        সার্ভার কপি <small><b>Unofficial-2 </b></small>
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$hideUnhide->voter_info == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="voter_info" value="0">
                                                            <input class="form-check-input"
                                                                onclick="submitHideUnhideForm()" value="1"
                                                                name="voter_info" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$hideUnhide->voter_info == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>

                                                    <div class="form-group py-2">
                                                        টিন সার্টিফিকেট
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$hideUnhide->sign_to_server == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="sign_to_server" value="0">
                                                            <input class="form-check-input"
                                                                onclick="submitHideUnhideForm()" value="1"
                                                                name="sign_to_server" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$hideUnhide->sign_to_server == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        প্রিমিয়াম
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$hideUnhide->premium == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="premium" value="0">
                                                            <input class="form-check-input"
                                                                onclick="submitHideUnhideForm()" value="1"
                                                                name="premium" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$hideUnhide->premium == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        অ্যাডমিন
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$hideUnhide->admin == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="admin" value="0">
                                                            <input class="form-check-input"
                                                                onclick="submitHideUnhideForm()" value="1"
                                                                name="admin" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$hideUnhide->admin == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        ভিডিও
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$hideUnhide->video == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="video" value="0">
                                                            <input class="form-check-input"
                                                                onclick="submitHideUnhideForm()" value="1"
                                                                name="video" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$hideUnhide->video == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        ম্যানুয়াল রিচার্জ
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$hideUnhide->recharge == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="recharge" value="0">
                                                            <input class="form-check-input"
                                                                onclick="submitHideUnhideForm()" value="1"
                                                                name="recharge" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$hideUnhide->recharge == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        অটো রিচার্জ(Bkash)
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$hideUnhide->recharge_bkash == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="recharge_bkash" value="0">
                                                            <input class="form-check-input"
                                                                onclick="submitHideUnhideForm()" value="1"
                                                                name="recharge_bkash" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$hideUnhide->recharge_bkash == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </form>

                                                <script>
                                                    function submitHideUnhideForm() {
                                                        document.getElementById("hideUnhideForm").submit();
                                                    }
                                                </script>
                                            </div>
                                            <hr class="d-md-none">
                                            <div class="col-md-6">
                                                ফর্ম সাবমিট অন/অফ করুন
                                                <form id="myForm" action="{{ route('admin.submit_status.store') }}"
                                                    method="post">
                                                    @csrf
                                                    <div class="form-group py-2">
                                                        সাইন কপি
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked1">
                                                                {{ @$submitStatus->sign_copy == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="sign_copy" value="0">
                                                            <input class="form-check-input" onclick="submitForm()"
                                                                value="1" name="sign_copy" type="checkbox"
                                                                id="flexSwitchCheckChecked1"
                                                                {{ @$submitStatus->sign_copy == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        সার্ভার কপি
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$submitStatus->server_copy == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="server_copy" value="0">
                                                            <input class="form-check-input" onclick="submitForm()"
                                                                value="1" name="server_copy" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$submitStatus->server_copy == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        আইডি কার্ড
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$submitStatus->id_card == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="id_card" value="0">
                                                            <input class="form-check-input" onclick="submitForm()"
                                                                value="1" name="id_card" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$submitStatus->id_card == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        আইডি কার্ড <small><b>নাম-ঠিকানা</b></small>
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$submitStatus->name_address_id == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="name_address_id" value="0">
                                                            <input class="form-check-input" onclick="submitForm()"
                                                                value="1" name="name_address_id" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$submitStatus->name_address_id == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        বায়োমেট্রিক তথ্য
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$submitStatus->biometric == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="biometric" value="0">
                                                            <input class="form-check-input" onclick="submitForm()"
                                                                value="1" name="biometric" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$submitStatus->biometric == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>

                                                    {{-- <div class="form-group py-2">
                                                    নতুন এনআইডি
                                                    <div class="form-check form-switch">
                                                        <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                            {{ @$submitStatus->new_nid == 1 ? 'ON' : 'OFF' }}</label>
                                                        <input type="hidden" name="new_nid" value="0">
                                                        <input class="form-check-input" onclick="submitForm()"
                                                            value="1" name="new_nid" type="checkbox"
                                                            id="flexSwitchCheckChecked2"
                                                            {{ @$submitStatus->new_nid == 1 ? 'checked' : '' }}>
                                                    </div>
                                                </div> --}}
                                                    <div class="form-group py-2">
                                                        এনআইডি মেক
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$submitStatus->old_nid == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="old_nid" value="0">
                                                            <input class="form-check-input" onclick="submitForm()"
                                                                value="1" name="old_nid" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$submitStatus->old_nid == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        ইউজার পাসওয়ার্ড সেট <small><b>NID Card</b></small>
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$submitStatus->user_pass_nid == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="user_pass_nid" value="0">
                                                            <input class="form-check-input" onclick="submitForm()"
                                                                value="1" name="user_pass_nid" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$submitStatus->user_pass_nid == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        এনআইডি সংশোধন ফর্ম উত্তোলন
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$submitStatus->nid_lost_form == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="nid_lost_form" value="0">
                                                            <input class="form-check-input" onclick="submitForm()"
                                                                value="1" name="nid_lost_form" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$submitStatus->nid_lost_form == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        নতুন জন্ম নিবন্ধন
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$submitStatus->birth_order == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="birth_order" value="0">
                                                            <input class="form-check-input" onclick="submitForm()"
                                                                value="1" name="birth_order" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$submitStatus->birth_order == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        জন্ম নিবন্ধন প্রতিলিপি
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$submitStatus->birth == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="birth" value="0">
                                                            <input class="form-check-input" onclick="submitForm()"
                                                                value="1" name="birth" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$submitStatus->birth == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        সার্ভার কপি <small><b>Unofficial-1</b></small>
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$submitStatus->server_unofficial == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="server_unofficial"
                                                                value="0">
                                                            <input class="form-check-input" onclick="submitForm()"
                                                                value="1" name="server_unofficial" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$submitStatus->server_unofficial == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        সার্ভার কপি <small><b>Unofficial-2 </b></small>
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$submitStatus->voter_info == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="voter_info" value="0">
                                                            <input class="form-check-input" onclick="submitForm()"
                                                                value="1" name="voter_info" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$submitStatus->voter_info == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        টিন সার্টিফিকেট
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$submitStatus->sign_to_server == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="sign_to_server" value="0">
                                                            <input class="form-check-input" onclick="submitForm()"
                                                                value="1" name="sign_to_server" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$submitStatus->sign_to_server == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        ইউজার রেজিস্ট্রেশন
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$submitStatus->registration == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="registration" value="0">
                                                            <input class="form-check-input" onclick="submitForm()"
                                                                value="1" name="registration" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$submitStatus->registration == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        ইউজার লগইন
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$submitStatus->login == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="login" value="0">
                                                            <input class="form-check-input" onclick="submitForm()"
                                                                value="1" name="login" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$submitStatus->login == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        রিচার্জ
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$submitStatus->recharge == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="recharge" value="0">
                                                            <input class="form-check-input" onclick="submitForm()"
                                                                value="1" name="recharge" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$submitStatus->recharge == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        অ্যাকাউন্ট অ্যাক্টিভেশন
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$submitStatus->active_status == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="active_status" value="0">
                                                            <input class="form-check-input" onclick="submitForm()"
                                                                value="1" name="active_status" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$submitStatus->active_status == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </form>

                                                <script>
                                                    function submitForm() {
                                                        document.getElementById("myForm").submit();
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="tab-pane fade show active" id="v-pills-banner-title" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                @include('admin.general.general-pages.banner_title')
                            </div> --}}
                                <div class="tab-pane fade" id="v-pills-logo" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab">
                                    @include('admin.general.general-pages.logo_settings')
                                </div>
                                <div class="tab-pane fade" id="v-pills-links" role="tabpanel"
                                    aria-labelledby="v-pills-messages-tab">
                                    @include('admin.general.general-pages.website_links')
                                </div>
                                <div class="tab-pane fade" id="v-pills-whatsapp" role="tabpanel"
                                    aria-labelledby="v-pills-whatsapp-tab">
                                    @include('admin.general.general-pages.whatsapp_group')
                                </div>
                                <div class="tab-pane fade" id="v-pills-footer" role="tabpanel"
                                    aria-labelledby="v-pills-settings-tab">
                                    @include('admin.general.general-pages.footer')
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div> <!-- col -->


    </div> <!-- .row -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('clearOldOrders').addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "All the completed odrers and files will be cleared only for admin!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, clear it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('admin.clearOldOrders') }}";
                }
            });
        });

        document.getElementById('clearFileListData').addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "All the datas from file list will be cleared only for admin!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, clear it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('admin.clearFileListData') }}";
                }
            });
        });

        document.getElementById('clearAllPermanently').addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "All the datas and related files will be cleared permanently!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, clear it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('admin.clearAllPermanently') }}";
                }
            });
        });
    </script>
@endsection
