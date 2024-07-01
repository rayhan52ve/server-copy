@php
    $moderatorAccess = \App\Models\ModeratorAccess::where('user_id',auth()->user()->id)->first();
@endphp
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li> <a class="waves-effect waves-dark" href="{{ url('/') }}" aria-expanded="false"><i><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-house-door" viewBox="0 0 16 16">
                                <path
                                    d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z" />
                            </svg></i><span class="hide-menu">ড্যাশবোর্ড</span></a>
                </li>
                @if (auth()->user()->is_admin == 1 ||
                        @$moderatorAccess->general_settings == 1 ||
                        @$moderatorAccess->notice_settings == 1 ||
                        @$moderatorAccess->message_settings == 1 ||
                        @$moderatorAccess->premium_settings == 1)

                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                            aria-expanded="false"><i><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                </svg></i><span class="hide-menu">সেটিংস</span></a>
                        <ul aria-expanded="false" class="collapse">
                            @if (auth()->user()->is_admin == 1 || @$moderatorAccess->general_settings == 1)
                                <li><a href="{{ route('general.settings') }}">জেনারেল সেটিংস</a></li>
                            @endif

                            {{-- @if (auth()->user()->is_admin == 1)
                                <li><a href="{{ route('admin.moderator-access.index') }}">মডারেটর অ্যাক্সেস</a></li>
                            @endif --}}
                            @if (auth()->user()->is_admin == 1 || @$moderatorAccess->notice_settings == 1)
                                <li><a href="{{ route('admin.notice.index') }}">নোটিশ সেটিংস</a></li>
                            @endif

                            @if (auth()->user()->is_admin == 1 || @$moderatorAccess->message_settings == 1)
                                <li><a href="{{ route('admin.message.index') }}">মূল্য নির্ধারণ ও মেসেজ</a></li>
                            @endif

                            @if (auth()->user()->is_admin == 1 || @$moderatorAccess->premium_settings == 1)
                                <li><a href="{{ route('admin.premium.index') }}">প্রিমিয়াম সেটিংস</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (auth()->user()->is_admin == 1 || @$moderatorAccess->user_list == 1 || @$moderatorAccess->premium_request == 1)
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="fa-solid fa-file-powerpoint"></i><span class="hide-menu">ম্যানেজ ইউজার</span></a>
                        <ul aria-expanded="false" class="collapse">
                            @if (auth()->user()->is_admin == 1 || @$moderatorAccess->user_list == 1)
                                <li><a href="{{ route('admin.manage-user.index') }}">ইউজার লিস্ট</a></li>
                            @endif

                            @if (auth()->user()->is_admin == 1 || @$moderatorAccess->premium_request == 1)
                                <li><a href="{{ route('admin.premiumRequest') }}">প্রিমিয়াম ইউজার রিকুয়েস্ট</a></li>
                            @endif

                            @if (auth()->user()->is_admin == 1)
                                <li><a href="{{ route('admin.moderatorList') }}">মডারেটর লিস্ট</a></li>
                                <li><a href="{{ route('admin.manage-user.create') }}">ইউজার ক্রিয়েট</a></li>
                            @endif

                        </ul>
                    </li>
                @endif

                @if (auth()->user()->is_admin == 1 || @$moderatorAccess->sign_copy == 1)
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="fa-solid fa-file-powerpoint"></i><span class="hide-menu">সাইন কপি
                                অর্ডার</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('admin.sign-copy.index') }}">পেন্ডিং অর্ডার</a></li>
                            <li><a href="{{ route('admin.sign-copy.completed') }}">পাওয়া গেছে</a></li>
                            <li><a href="{{ route('admin.sign-copy.disabled') }}">পাওয়া যায়নি</a></li>
                        </ul>
                    </li>
                @endif

                @if (auth()->user()->is_admin == 1 || @$moderatorAccess->server_copy == 1)
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="fa-solid fa-file-image"></i><span class="hide-menu">সার্ভার কপি অর্ডার</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('admin.server-copy.index') }}">পেন্ডিং অর্ডার</a></li>
                            <li><a href="{{ route('admin.server-copy.completed') }}">পাওয়া গেছে</a></li>
                            <li><a href="{{ route('admin.server-copy.disabled') }}">পাওয়া যায়নি</a></li>
                        </ul>
                    </li>
                @endif

                @if (auth()->user()->is_admin == 1 || @$moderatorAccess->id_card == 1)
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="fa-solid fa-file-code"></i><span class="hide-menu">আইডি
                                কার্ড
                                অর্ডার</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('admin.id-card.index') }}">পেন্ডিং অর্ডার</a></li>
                            <li><a href="{{ route('admin.id-card.completed') }}">পাওয়া গেছে</a></li>
                            <li><a href="{{ route('admin.id-card.disabled') }}">পাওয়া যায়নি</a></li>
                        </ul>
                    </li>
                @endif

                @if (auth()->user()->is_admin == 1 || @$moderatorAccess->biometric == 1 || @$moderatorAccess->biometric_type == 1)
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="fa-solid fa-fingerprint"></i><span class="hide-menu">বায়োমেট্রিক তথ্য</span></a>
                        <ul aria-expanded="false" class="collapse">
                            @if (auth()->user()->is_admin == 1 || @$moderatorAccess->biometric_type == 1)
                                <li><a href="{{ route('admin.biometric-type.index') }}">বায়োমেট্রিক টাইপ</a>
                                </li>
                            @endif

                            @if (auth()->user()->is_admin == 1 || @$moderatorAccess->biometric == 1)
                                <li><a href="{{ route('admin.biometric-info.index') }}">পেন্ডিং অর্ডার</a></li>
                                <li><a href="{{ route('admin.biometric-info.completed') }}">পাওয়া গেছে</a></li>
                                <li><a href="{{ route('admin.biometric-info.disabled') }}">পাওয়া যায়নি</a></li>
                            @endif

                        </ul>
                    </li>
                @endif

                {{-- <li> <a class="waves-effect waves-dark" href="#"
                    aria-expanded="false"><i class="fa-solid fa-file-shield"></i><span class="hide-menu">সুরক্ষা ক্লোন</span></a>
            </li> --}}
                {{-- <li> <a class="waves-effect waves-dark" href="#"
                    aria-expanded="false"><i class="fa-solid fa-list-check"></i><span class="hide-menu">ফাইল লিস্ট</span></a>
            </li> --}}
                @if (auth()->user()->is_admin == 1 || @$moderatorAccess->video == 1)
                    <li> <a class="waves-effect waves-dark" href="{{ route('admin.video.index') }}"
                            aria-expanded="false"><i class="fa-brands fa-youtube"></i><span
                                class="hide-menu">ভিডিও</span></a>
                    </li>
                @endif
                @if (auth()->user()->is_admin == 1 || @$moderatorAccess->recharge == 1)
                    <li> <a class="waves-effect waves-dark" href="{{ route('admin.recharge') }}"
                            aria-expanded="false"><i class="fa-solid fa-bangladeshi-taka-sign"></i><span
                                class="hide-menu">রিচার্জ</span></a>
                    </li>
                @endif
                <li> <a class="waves-effect waves-dark" href="#"
                        onclick="event.preventDefault(); document.getElementById('logoutForm').submit()"
                        aria-expanded="false"><i class="fa-solid fa-right-from-bracket"></i><span class="hide-menu">লগ
                            আউট</span></a>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
