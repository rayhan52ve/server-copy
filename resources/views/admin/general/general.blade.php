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
                            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-footer" type="button" role="tab"
                                aria-controls="v-pills-settings" aria-selected="false">Footer</button>
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
                                                            <input class="form-check-input" onclick="submitHideUnhideForm()"
                                                                value="1" name="server_copy" type="checkbox"
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
                                                            <input class="form-check-input" onclick="submitHideUnhideForm()"
                                                                value="1" name="id_card" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$hideUnhide->id_card == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        বায়োমেট্রিক তথ্য
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$hideUnhide->biometric == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="biometric" value="0">
                                                            <input class="form-check-input" onclick="submitHideUnhideForm()"
                                                                value="1" name="biometric" type="checkbox"
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
                                                            <input class="form-check-input" onclick="submitHideUnhideForm()"
                                                                value="1" name="old_nid" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$hideUnhide->old_nid == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        নতুন নিবন্ধন
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$hideUnhide->birth == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="birth" value="0">
                                                            <input class="form-check-input" onclick="submitHideUnhideForm()"
                                                                value="1" name="birth" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$hideUnhide->birth == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        সার্ভার কপি (Unofficial)
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$hideUnhide->server_unofficial == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="server_unofficial"
                                                                value="0">
                                                            <input class="form-check-input" onclick="submitHideUnhideForm()"
                                                                value="1" name="server_unofficial" type="checkbox"
                                                                id="flexSwitchCheckChecked2"
                                                                {{ @$hideUnhide->server_unofficial == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <div class="form-group py-2">
                                                        সাইন টু সার্ভার কপি
                                                        <div class="form-check form-switch">
                                                            <label class="form-check-label" for="flexSwitchCheckChecked2">
                                                                {{ @$hideUnhide->sign_to_server == 1 ? 'ON' : 'OFF' }}</label>
                                                            <input type="hidden" name="sign_to_server" value="0">
                                                            <input class="form-check-input" onclick="submitHideUnhideForm()"
                                                                value="1" name="sign_to_server" type="checkbox"
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
                                                            <input class="form-check-input" onclick="submitHideUnhideForm()"
                                                                value="1" name="premium" type="checkbox"
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
                                                            <input class="form-check-input" onclick="submitHideUnhideForm()"
                                                                value="1" name="admin" type="checkbox"
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
                                                            <input class="form-check-input" onclick="submitHideUnhideForm()"
                                                                value="1" name="video" type="checkbox"
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
                                                            <input class="form-check-input" onclick="submitHideUnhideForm()"
                                                                value="1" name="recharge" type="checkbox"
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
                                                            <input class="form-check-input" onclick="submitHideUnhideForm()"
                                                                value="1" name="recharge_bkash" type="checkbox"
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
                                                        নতুন নিবন্ধন
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
                                                        সার্ভার কপি (Unofficial)
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
                                                        সাইন টু সার্ভার কপি
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
@endsection