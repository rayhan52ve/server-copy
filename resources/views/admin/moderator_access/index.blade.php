@extends('admin.master')

@section('body')
    <div class="row justify-content-center mt-3">
        <div class="">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title d-flex justify-content-between">
                        Permission Settings for {{ $moderatorAccess->user->name ?? null }}
                        <a class="btn btn-success" href="{{route('admin.moderatorList')}}"><i class="fa-solid fa-left-long"></i> Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    মডারেটর অ্যাক্সেস অন/অফ করুন
                    <form id="myForm" action="{{ route('admin.moderator-access.store') }}" method="post">
                        @csrf
                        <div class="d-flex p-3">
                            <div class="container">
                                <input type="hidden" name="moderator_access_id" value="{{ $moderatorAccess->id ?? null }}">
                                <div class="form-group py-2">
                                    সাইন কপি
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckChecked1">
                                            {{ @$moderatorAccess->sign_copy == 1 ? 'ON' : 'OFF' }}</label>
                                        <input type="hidden" name="sign_copy" value="0">
                                        <input class="form-check-input" onclick="submitForm()" value="1"
                                            name="sign_copy" type="checkbox" id="flexSwitchCheckChecked1"
                                            {{ @$moderatorAccess->sign_copy == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="form-group py-2">
                                    সার্ভার কপি
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckChecked2">
                                            {{ @$moderatorAccess->server_copy == 1 ? 'ON' : 'OFF' }}</label>
                                        <input type="hidden" name="server_copy" value="0">
                                        <input class="form-check-input" onclick="submitForm()" value="1"
                                            name="server_copy" type="checkbox" id="flexSwitchCheckChecked2"
                                            {{ @$moderatorAccess->server_copy == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="form-group py-2">
                                    আইডি কার্ড
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckChecked2">
                                            {{ @$moderatorAccess->id_card == 1 ? 'ON' : 'OFF' }}</label>
                                        <input type="hidden" name="id_card" value="0">
                                        <input class="form-check-input" onclick="submitForm()" value="1" name="id_card"
                                            type="checkbox" id="flexSwitchCheckChecked2"
                                            {{ @$moderatorAccess->id_card == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="form-group py-2">
                                    আইডি কার্ড <small><b>নাম-ঠিকানা</b></small>
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckChecked2">
                                            {{ @$moderatorAccess->name_address_id == 1 ? 'ON' : 'OFF' }}</label>
                                        <input type="hidden" name="name_address_id" value="0">
                                        <input class="form-check-input" onclick="submitForm()" value="1" name="name_address_id"
                                            type="checkbox" id="flexSwitchCheckChecked2"
                                            {{ @$moderatorAccess->name_address_id == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="form-group py-2">
                                    বায়োমেট্রিক তথ্য
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckChecked2">
                                            {{ @$moderatorAccess->biometric == 1 ? 'ON' : 'OFF' }}</label>
                                        <input type="hidden" name="biometric" value="0">
                                        <input class="form-check-input" onclick="submitForm()" value="1"
                                            name="biometric" type="checkbox" id="flexSwitchCheckChecked2"
                                            {{ @$moderatorAccess->biometric == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="form-group py-2">
                                    বায়োমেট্রিক টাইপ
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckChecked2">
                                            {{ @$moderatorAccess->biometric_type == 1 ? 'ON' : 'OFF' }}</label>
                                        <input type="hidden" name="biometric_type" value="0">
                                        <input class="form-check-input" onclick="submitForm()" value="1"
                                            name="biometric_type" type="checkbox" id="flexSwitchCheckChecked2"
                                            {{ @$moderatorAccess->biometric_type == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="form-group py-2">
                                    রিচার্জ
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckChecked2">
                                            {{ @$moderatorAccess->recharge == 1 ? 'ON' : 'OFF' }}</label>
                                        <input type="hidden" name="recharge" value="0">
                                        <input class="form-check-input" onclick="submitForm()" value="1"
                                            name="recharge" type="checkbox" id="flexSwitchCheckChecked2"
                                            {{ @$moderatorAccess->recharge == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="form-group py-2">
                                    ভিডিও
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckChecked2">
                                            {{ @$moderatorAccess->video == 1 ? 'ON' : 'OFF' }}</label>
                                        <input type="hidden" name="video" value="0">
                                        <input class="form-check-input" onclick="submitForm()" value="1"
                                            name="video" type="checkbox" id="flexSwitchCheckChecked2"
                                            {{ @$moderatorAccess->video == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="form-group py-2">
                                    ইউজার লিস্ট
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckChecked2">
                                            {{ @$moderatorAccess->user_list == 1 ? 'ON' : 'OFF' }}</label>
                                        <input type="hidden" name="user_list" value="0">
                                        <input class="form-check-input" onclick="submitForm()" value="1"
                                            name="user_list" type="checkbox" id="flexSwitchCheckChecked2"
                                            {{ @$moderatorAccess->user_list == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="form-group py-2">
                                    ইউজার এডিট
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckChecked2">
                                            {{ @$moderatorAccess->user_edit == 1 ? 'ON' : 'OFF' }}</label>
                                        <input type="hidden" name="user_edit" value="0">
                                        <input class="form-check-input" onclick="submitForm()" value="1"
                                            name="user_edit" type="checkbox" id="flexSwitchCheckChecked2"
                                            {{ @$moderatorAccess->user_edit == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="form-group py-2">
                                    জেনারেল সেটিংস
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckChecked2">
                                            {{ @$moderatorAccess->general_settings == 1 ? 'ON' : 'OFF' }}</label>
                                        <input type="hidden" name="general_settings" value="0">
                                        <input class="form-check-input" onclick="submitForm()" value="1"
                                            name="general_settings" type="checkbox" id="flexSwitchCheckChecked2"
                                            {{ @$moderatorAccess->general_settings == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="form-group py-2">
                                    নোটিশ সেটিংস
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckChecked2">
                                            {{ @$moderatorAccess->notice_settings == 1 ? 'ON' : 'OFF' }}</label>
                                        <input type="hidden" name="notice_settings" value="0">
                                        <input class="form-check-input" onclick="submitForm()" value="1"
                                            name="notice_settings" type="checkbox" id="flexSwitchCheckChecked2"
                                            {{ @$moderatorAccess->notice_settings == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="form-group py-2">
                                    মেসেজ ও মূল্য নির্ধারণ
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckChecked2">
                                            {{ @$moderatorAccess->message_settings == 1 ? 'ON' : 'OFF' }}</label>
                                        <input type="hidden" name="message_settings" value="0">
                                        <input class="form-check-input" onclick="submitForm()" value="1"
                                            name="message_settings" type="checkbox" id="flexSwitchCheckChecked2"
                                            {{ @$moderatorAccess->message_settings == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="form-group py-2">
                                    প্রিমিয়াম রিকুয়েস্ট
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckChecked2">
                                            {{ @$moderatorAccess->premium_request == 1 ? 'ON' : 'OFF' }}</label>
                                        <input type="hidden" name="premium_request" value="0">
                                        <input class="form-check-input" onclick="submitForm()" value="1"
                                            name="premium_request" type="checkbox" id="flexSwitchCheckChecked2"
                                            {{ @$moderatorAccess->premium_request == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="form-group py-2">
                                    প্রিমিয়াম সেটিংস
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckChecked2">
                                            {{ @$moderatorAccess->premium_settings == 1 ? 'ON' : 'OFF' }}</label>
                                        <input type="hidden" name="premium_settings" value="0">
                                        <input class="form-check-input" onclick="submitForm()" value="1"
                                            name="premium_settings" type="checkbox" id="flexSwitchCheckChecked2"
                                            {{ @$moderatorAccess->premium_settings == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>

                                <div class="form-group py-2">
                                    এনআইডি মেক
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckChecked2">
                                            {{ @$moderatorAccess->nid_make == 1 ? 'ON' : 'OFF' }}</label>
                                        <input type="hidden" name="nid_make" value="0">
                                        <input class="form-check-input" onclick="submitForm()" value="1"
                                            name="nid_make" type="checkbox" id="flexSwitchCheckChecked2"
                                            {{ @$moderatorAccess->nid_make == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>

                                <div class="form-group py-2">
                                    সার্ভার কপি <small><b>Unofficial-1 </b></small>
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckChecked2">
                                            {{ @$moderatorAccess->server_copy1 == 1 ? 'ON' : 'OFF' }}</label>
                                        <input type="hidden" name="server_copy1" value="0">
                                        <input class="form-check-input" onclick="submitForm()" value="1"
                                            name="server_copy1" type="checkbox" id="flexSwitchCheckChecked2"
                                            {{ @$moderatorAccess->server_copy1 == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>

                                <div class="form-group py-2">
                                    সার্ভার কপি <small><b>Unofficial-2 </b></small>
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckChecked2">
                                            {{ @$moderatorAccess->server_copy2 == 1 ? 'ON' : 'OFF' }}</label>
                                        <input type="hidden" name="server_copy2" value="0">
                                        <input class="form-check-input" onclick="submitForm()" value="1"
                                            name="server_copy2" type="checkbox" id="flexSwitchCheckChecked2"
                                            {{ @$moderatorAccess->server_copy2 == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>

                                <div class="form-group py-2">
                                    টিন সার্টিফিকেট
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckChecked2">
                                            {{ @$moderatorAccess->tin_cirtificate == 1 ? 'ON' : 'OFF' }}</label>
                                        <input type="hidden" name="tin_cirtificate" value="0">
                                        <input class="form-check-input" onclick="submitForm()" value="1"
                                            name="tin_cirtificate" type="checkbox" id="flexSwitchCheckChecked2"
                                            {{ @$moderatorAccess->tin_cirtificate == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

                    <script>
                        function submitForm() {
                            document.getElementById("myForm").submit();
                        }
                    </script>
                </div>
                <!-- /.card -->
            </div>
        </div> <!-- col -->


    </div> <!-- .row -->
@endsection
