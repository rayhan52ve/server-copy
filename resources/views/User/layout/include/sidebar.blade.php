@php
    $hideUnhide = \App\Models\HideUnhide::first();
    $submitStatus = \App\Models\SubmitStatus::first();
    $notification = \App\Models\UserNotification::where('user_id', auth()->user()->id)
        ->where('read_unread', 0)
        ->count();
    $whatsappGroup = \App\Models\WebsiteLinks::first()->whatsapp_group_link;
@endphp
<style>
    /* .scroll-sidebar {
        overflow-y: auto;
        max-height: calc(100vh - 100px);
        width: 235px;
    } */

    .notification-number {
        background-color: red;
        color: white;
        border-radius: 50%;
        padding: 2px 6px;
        font-size: 10px;
        position: absolute;
        top: 5px;
        right: 50px;
        line-height: 1;
    }
</style>
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav mt-3 mt-md-0">
            <ul id="sidebarnav">

                @if (auth()->user()->status == 1 || $submitStatus->active_status == 0)
                    <li> <a class="waves-effect waves-dark" href="{{ url('user/home') }}" aria-expanded="false"><i><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-house-door" viewBox="0 0 16 16">
                                    <path
                                        d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z" />
                                </svg></i><span class="hide-menu">ড্যাশবোর্ড</span></a>
                    </li>
                    {{-- <li class="d-md-none">
                        <a class="waves-effect waves-dark" href="{{ route('user.userNotification') }}"
                            aria-expanded="false" style="position: relative;">
                            <i class="fa-solid fa-bell"></i>
                            <span class="hide-menu">নোটিফিকেশান @if ($notification >= 1)
                                    <sup class="notification-number">{{ $notification }}</sup>
                                @endif
                            </span>

                        </a>
                    </li> --}}
                    @if ($hideUnhide->sign_copy == 1)
                        <li> <a class="waves-effect waves-dark" href="{{ route('user.sign-copy.index') }}"
                                aria-expanded="false"><i class="fa-solid fa-file-powerpoint"></i><span
                                    class="hide-menu">সাইন কপি
                                    অর্ডার</span></a>
                        </li>
                    @endif

                    @if ($hideUnhide->server_copy == 1)
                        <li> <a class="waves-effect waves-dark" href="{{ route('user.server-copy.index') }}"
                                aria-expanded="false"><i class="fa-solid fa-file-image"></i><span
                                    class="hide-menu">সার্ভার
                                    কপি
                                    অর্ডার</span></a>
                        </li>
                    @endif
                    @if ($hideUnhide->id_card == 1)
                        <li> <a class="waves-effect waves-dark" href="{{ route('user.id-card.index') }}"
                                aria-expanded="false"><i class="fa-solid fa-file-code"></i><span class="hide-menu">আইডি
                                    কার্ড
                                    অর্ডার</span></a>
                        </li>
                    @endif
                    @if ($hideUnhide->biometric == 1)
                        <li> <a class="waves-effect waves-dark" href="{{ route('user.biometric-info.index') }}"
                                aria-expanded="false"><i class="fa-solid fa-fingerprint"></i><span
                                    class="hide-menu">বায়োমেট্রিক
                                    তথ্য</span></a>
                        </li>
                    @endif
                    {{-- <li> <a class="waves-effect waves-dark" href="{{ route('user.new-nid.index') }}"
                        aria-expanded="false"><i class="fa-solid fa-id-card"></i><span class="hide-menu">নতুন এনআইডি</span></a>
                </li> --}}
                    {{-- @if ($hideUnhide->old_nid == 1)
                    <li> <a class="waves-effect waves-dark" href="{{ route('user.old-nid.index') }}"
                            aria-expanded="false"><i class="fa-regular fa-id-card"></i><span class="hide-menu">এনআইডি
                                মেক</span></a>
                    </li>
                @endif --}}
                    @if ($hideUnhide->old_nid == 1)
                        <li> <a class="waves-effect waves-dark" href="{{ route('user.nid-make.index') }}"
                                aria-expanded="false"><i class="fa-regular fa-id-card"></i><span
                                    class="hide-menu">এনআইডি
                                    মেক</span></a>
                        </li>
                    @endif
                    @if ($hideUnhide->birth == 1)
                        <li> <a class="waves-effect waves-dark" href="{{ route('user.new-registration.index') }}"
                                aria-expanded="false"><i class="fa-regular fa-file-lines"></i><span
                                    class="hide-menu">জন্ম
                                    নিবন্ধন প্রতিলিপি</span></a>
                        </li>
                    @endif
                    {{-- <li> <a class="waves-effect waves-dark" href="#"
                        aria-expanded="false"><i class="fa-regular fa-file-lines"></i><span class="hide-menu">পুরাতন নিবন্ধন</span></a>
                </li> --}}
                    @if ($hideUnhide->server_unofficial == 1)
                        <li> <a class="waves-effect waves-dark" href="{{ route('nid.server.copy') }}"
                                aria-expanded="false"><i class="fa-solid fa-file-contract"></i><span
                                    class="hide-menu">সার্ভার কপি <small><b>Unofficial-1</b></small></span></a>
                        </li>
                    @endif
                    @if ($hideUnhide->voter_info == 1)
                        <li> <a class="waves-effect waves-dark" href="{{ route('user.voter-info.index') }}"
                                aria-expanded="false"><i class="fa-solid fa-id-card"></i><span class="hide-menu">
                                    {{-- সার্ভার কপি <SMALL><B>UNOFFICIAL-2</B></SMALL> --}}
                                    সার্ভার কপি <small><b>Unofficial-2</b></small>
                                </span></a>
                        </li>
                    @endif
                    @if ($hideUnhide->sign_to_server == 1)
                        <li> <a class="waves-effect waves-dark" href="{{ route('user.sign-to-server.index') }}"
                                aria-expanded="false"><i class="fa-solid fa-file-import"></i><span
                                    class="hide-menu">টিন সার্টিফিকেট</span></a>
                        </li>
                    @endif
                    {{-- <li> <a class="waves-effect waves-dark" href="#"
                        aria-expanded="false"><i class="fa-solid fa-file-shield"></i><span class="hide-menu">সুরক্ষা ক্লোন</span></a>
                </li> --}}

                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="fa-solid fa-file"></i><span class="hide-menu">ফাইল
                                লিস্ট</span></a>
                        <ul aria-expanded="false" class="collapse">

                            <li><a href="{{ route('user.serverCopyUnofficialList',auth()->user()->id) }}">সার্ভার কপি <small><b>Unofficial</b></small></a>
                            </li>
                            <li><a href="{{ route('user.nidList',auth()->user()->id) }}">এনআইডি লিস্ট</a></li>
                            <li><a href="{{ route('user.birthList',auth()->user()->id) }}">জন্ম নিবন্ধন লিস্ট</a></li>


                        </ul>
                    </li>
                    @if ($hideUnhide->premium == 1)
                        <li> <a class="waves-effect waves-dark" href="{{ route('user.premium.index') }}"
                                aria-expanded="false"><i class="fa-solid fa-crown"></i><span
                                    class="hide-menu">প্রিমিয়াম</span></a>
                        </li>
                    @endif
                    @if ($hideUnhide->recharge == 1)
                        <li> <a class="waves-effect waves-dark" href="{{ route('user.recharge.create') }}"
                                aria-expanded="false"><i class="fa-solid fa-bangladeshi-taka-sign"></i><span
                                    class="hide-menu">রিচার্জ</span></a>
                        </li>
                    @endif
                    @if ($hideUnhide->recharge_bkash == 1)
                        <li> <a class="waves-effect waves-dark" href="{{ route('bkash.index') }}"
                                aria-expanded="false"><i class="fa-solid fa-bangladeshi-taka-sign"></i><span
                                    class="hide-menu">রিচার্জ</span></a>
                        </li>
                    @endif
                    @if ($hideUnhide->admin == 1)
                        <li> <a class="waves-effect waves-dark" href="{{ route('user.about_admin') }}"
                                aria-expanded="false"><i class="fa-solid fa-user"></i><span
                                    class="hide-menu">অ্যাডমিন</span></a>
                        </li>
                    @endif
                    @if ($hideUnhide->video == 1)
                        <li> <a class="waves-effect waves-dark" href="{{ route('user.video.index') }}"
                                aria-expanded="false"><i class="fa-brands fa-youtube"></i><span
                                    class="hide-menu">ভিডিও</span></a>
                        </li>
                    @endif
                    @if ($whatsappGroup)
                        <li> <a class="waves-effect waves-dark" href="{{ $whatsappGroup }}" aria-expanded="false"><i
                                    class="fa-brands fa-whatsapp"></i><span class="hide-menu">WhatsApp
                                    গ্রুপ</span></a>
                        </li>
                    @endif
                @endif


                <li class="{{ auth()->user()->status == 1 || $submitStatus->active_status == 0 ? 'd-md-none' : '' }}">
                    <a class="waves-effect waves-dark" href="{{ route('user.profile.settings') }}"
                        aria-expanded="false">
                        <i class="fa-solid fa-user"></i>
                        <span class="hide-menu">প্রোফাইল</span>
                    </a>
                </li>

                @if (auth()->user()->status == 0 && $submitStatus->active_status == 1)
                    <li> <a class="waves-effect waves-dark" href="{{ route('bkash.index') }}"
                            aria-expanded="false"><i class="fa-solid fa-play"></i><span class="hide-menu">অ্যাকটিভেট
                                অ্যাকাউন্ট</span></a>
                    </li>
                @endif
                <li> <a class="waves-effect waves-dark" href="#"
                        onclick="event.preventDefault(); document.getElementById('logoutForm').submit()"
                        aria-expanded="false"><i class="fa-solid fa-right-from-bracket"></i><span
                            class="hide-menu">লগ
                            আউট</span></a>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
