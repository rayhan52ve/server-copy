@php
    $hideUnhide = \App\Models\HideUnhide::first();
@endphp
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li> <a class="waves-effect waves-dark" href="{{ url('user/home') }}" aria-expanded="false"><i><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-house-door" viewBox="0 0 16 16">
                                <path
                                    d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z" />
                            </svg></i><span class="hide-menu">অর্ডার ড্যাশবোর্ড</span></a>
                </li>
                @if ($hideUnhide->sign_copy == 1)
                    <li> <a class="waves-effect waves-dark" href="{{ route('user.sign-copy.index') }}"
                            aria-expanded="false"><i class="fa-solid fa-file-powerpoint"></i><span
                                class="hide-menu">সাইন কপি
                                অর্ডার</span></a>
                    </li>
                @endif

                @if ($hideUnhide->server_copy == 1)
                    <li> <a class="waves-effect waves-dark" href="{{ route('user.server-copy.index') }}"
                            aria-expanded="false"><i class="fa-solid fa-file-image"></i><span class="hide-menu">সার্ভার
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
                @if ($hideUnhide->old_nid == 1)
                    <li> <a class="waves-effect waves-dark" href="{{ route('user.old-nid.index') }}"
                            aria-expanded="false"><i class="fa-regular fa-id-card"></i><span class="hide-menu">এনআইডি
                                মেক</span></a>
                    </li>
                @endif
                @if ($hideUnhide->birth == 1)
                    <li> <a class="waves-effect waves-dark" href="{{ route('user.new-registration.index') }}"
                            aria-expanded="false"><i class="fa-regular fa-file-lines"></i><span class="hide-menu">নতুন
                                নিবন্ধন</span></a>
                    </li>
                @endif
                {{-- <li> <a class="waves-effect waves-dark" href="#"
                        aria-expanded="false"><i class="fa-regular fa-file-lines"></i><span class="hide-menu">পুরাতন নিবন্ধন</span></a>
                </li> --}}
                @if ($hideUnhide->server_unofficial == 1)
                    <li> <a class="waves-effect waves-dark" href="{{ route('nid.server.copy') }}"
                            aria-expanded="false"><i class="fa-solid fa-file-contract"></i><span
                                class="hide-menu">সার্ভার কপি (Unofficial)</span></a>
                    </li>
                @endif
                @if ($hideUnhide->sign_to_server == 1)
                    <li> <a class="waves-effect waves-dark" href="{{ route('user.sign-to-server.index') }}"
                            aria-expanded="false"><i class="fa-solid fa-file-import"></i><span class="hide-menu">সাইন টু
                                সার্ভার কপি</span></a>
                    </li>
                @endif
                {{-- <li> <a class="waves-effect waves-dark" href="#"
                        aria-expanded="false"><i class="fa-solid fa-file-shield"></i><span class="hide-menu">সুরক্ষা ক্লোন</span></a>
                </li> --}}
                {{-- <li> <a class="waves-effect waves-dark" href="#"
                        aria-expanded="false"><i class="fa-solid fa-list-check"></i><span class="hide-menu">ফাইল লিস্ট</span></a>
                </li> --}}
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
                {{-- <li> <a class="waves-effect waves-dark" href="#"
                        aria-expanded="false"><i class="fa-solid fa-user"></i><span class="hide-menu">প্রোফাইল</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="#"
                        aria-expanded="false"><i class="fa-solid fa-key"></i><span class="hide-menu">পাসওয়ার্ড পরিবর্তন</span></a>
                </li> --}}
                <li> <a class="waves-effect waves-dark" href="#"
                        onclick="event.preventDefault(); document.getElementById('logoutForm').submit()"
                        aria-expanded="false"><i class="fa-solid fa-right-from-bracket"></i><span class="hide-menu">লগ
                            আউট</span></a>
                </li>
                {{-- <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                                <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                            </svg></i><span class="hide-menu">General</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('general.settings')}}">General Settings</a></li>
                    </ul>
                </li> --}}


            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>