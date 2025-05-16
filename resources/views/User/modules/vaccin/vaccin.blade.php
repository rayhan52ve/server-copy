@extends(auth()->user()->is_admin != 0 ? 'admin.master' : 'User.layout.master')

@section(auth()->user()->is_admin != 0 ? 'body' : 'user')


    @php
        $notice = \App\Models\Notice::first();
        $message = \App\Models\Message::first();
        $submitStatus = \App\Models\SubmitStatus::first();
        $now = \Carbon\Carbon::now();
    @endphp
    <div class="col-lg-12 mt-5">
        <div class="card p-1" style="border: 2px solid rgb(7, 95, 136); border-radius: 5px;">
            <marquee behavior="" direction="">
                <h4 class="mt-2"><b>নোটিশঃ-</b> {{ $notice->vaccin ?? null }}</h4>
            </marquee>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h3>Create Vaccination Certificate</h3>
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="text-center">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <form id="submit_form" class="form-horizontal mt-5" action="{{ route('user.vaccin.store') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="certification_no">Certificate No (সার্টিফিকেট নং): <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="certification_no"
                                        name="certification_no" value="BD{{ mt_rand(10000000000, 99999999999) }}"
                                        readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="nid_number">Nid Number (জাতীয় পরিচয় পত্র নং) <span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="nid_number" name="nid_number"
                                        placeholder="NID Number" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="passport_no">Passport No (পাসপোর্ট নং)</label>
                                    <input type="text" class="form-control" id="passport_no" name="passport_no"
                                        placeholder="Passport Number" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="nationality">Nationality (জাতীয়তা:)<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nationality" name="nationality"
                                        value="Bangladeshi" placeholder="Bangladeshi" required readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">Name (নাম) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Name" value="" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="dob">Date of Birth (জন্ম তারিখ) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="dob" name="dob"
                                        placeholder="{{today()->format('d-m-Y')}}" value="" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="gender">Gender (লিঙ্) <span class="text-danger">*</span></label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="certificate_status">Certificate Status (সার্টিফিকেটের স্থিতি)<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" id="certificate_status" name="certificate_status"
                                        required>
                                        <option value="Valid">Valid</option>
                                        <option value="Expired">Expired</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name_dose_one">Name of Vaccination (Dose 1) টিকার নাম (ডোজ ১)<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" id="name_dose_one" name="name_dose_one" required>
                                        <option value="">ভ্যাকসিনের নাম নির্বাচন করুন (Select Vaccine Name)</option>
                                        <option value="Pfizer (Pfizer-BioNTech)">Pfizer (Pfizer-BioNTech)</option>
                                        <option value="Moderna">Moderna</option>
                                        <option value="Johnson & Johnson">Johnson & Johnson</option>
                                        <option value="AstraZeneca">AstraZeneca</option>
                                        <option value="Sinopharm">Sinopharm</option>
                                        <option value="Sputnik V">Sputnik V</option>
                                        <option value="Sinovac (CoronaVac)">Sinovac (CoronaVac)</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="date_dose_one">Date of Vaccination (Dose 1) (টিকা প্রদানের তারিখ
                                        (ডোজ ১):)</label>
                                    <input type="text" class="form-control" id="date_dose_one" name="date_dose_one"
                                         value="{{today()->format('d-m-Y')}}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name_dose_two">Name of Vaccination (Dose 2) টিকার নাম (ডোজ ২)<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" id="name_dose_two" name="name_dose_two" required>
                                        <option value="">ভ্যাকসিনের নাম নির্বাচন করুন (Select Vaccine Name)</option>
                                        <option value="Pfizer (Pfizer-BioNTech)">Pfizer (Pfizer-BioNTech)</option>
                                        <option value="Moderna">Moderna</option>
                                        <option value="Johnson & Johnson">Johnson & Johnson</option>
                                        <option value="AstraZeneca">AstraZeneca</option>
                                        <option value="Sinopharm">Sinopharm</option>
                                        <option value="Sputnik V">Sputnik V</option>
                                        <option value="Sinovac (CoronaVac)">Sinovac (CoronaVac)</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="date_dose_two">Date of Vaccination (Dose 2) (টিকা প্রদানের তারিখ
                                        (ডোজ ২))<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="date_dose_two" name="date_dose_two"
                                         value="{{today()->format('d-m-Y')}}" required>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name_dose_two">Name of Vaccination (Dose 3) টিকার নাম (ডোজ ৩)<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" id="name_dose_three" name="name_dose_three"
                                        required>
                                        <option value="">ভ্যাকসিনের নাম নির্বাচন করুন (Select Vaccine Name)</option>
                                        <option value="Pfizer (Pfizer-BioNTech)">Pfizer (Pfizer-BioNTech)</option>
                                        <option value="Moderna">Moderna</option>
                                        <option value="Johnson & Johnson">Johnson & Johnson</option>
                                        <option value="AstraZeneca">AstraZeneca</option>
                                        <option value="Sinopharm">Sinopharm</option>
                                        <option value="Sputnik V">Sputnik V</option>
                                        <option value="Sinovac (CoronaVac)">Sinovac (CoronaVac)</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="date_dose_two">Date of Vaccination (Dose 3) (টিকা প্রদানের তারিখ
                                        (ডোজ ৩))<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="date_dose_three"
                                        name="date_dose_three" value="{{today()->format('d-m-Y')}}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="vaccinated_by">Vaccinated By (টিকা প্রদানকারী)<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="vaccinated_by" name="vaccinated_by"
                                        placeholder="Vaccinated By (টিকা প্রদানকারী)"
                                         required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="vaccination_center">Vaccination Center (টিকা প্রদানের কেন্দ্র)<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="vaccination_center"
                                        name="vaccination_center"
                                        placeholder="Vaccination Center (টিকা প্রদানের কেন্দ্র)" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">Name of Vaccine
                                        টিকার নাম <span class="text-danger">*</span></label>
                                    <select class="form-control" id="vaccine_name" name="vaccine_name" required>
                                        <option value="">ভ্যাকসিনের নাম নির্বাচন করুন (Select Vaccine Name)</option>
                                        <option value="Pfizer (Pfizer-BioNTech)">Pfizer (Pfizer-BioNTech)</option>
                                        <option value="Moderna">Moderna</option>
                                        <option value="Johnson & Johnson">Johnson & Johnson</option>
                                        <option value="AstraZeneca">AstraZeneca</option>
                                        <option value="Sinopharm">Sinopharm</option>
                                        <option value="Sputnik V">Sputnik V</option>
                                        <option value="Sinovac (CoronaVac)">Sinovac (CoronaVac)</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="name">Total Doses<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="total_dose"
                                        name="total_dose" placeholder="3" required>
                                </div>
                            </div>




                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            @if (auth()->user()->premium == 2 && $now < auth()->user()->premium_end)
                                <input type="hidden" name="price" value="{{ $message->premium_vaccin_price }}">
                            @else
                                <input type="hidden" name="price" value="{{ $message->vaccin_price }}">
                            @endif

                        </div>
                        <div class="text-center pb-3">
                            @if ($submitStatus->vaccin == 1)
                                @if (auth()->user()->premium == 2 && $now < auth()->user()->premium_end)
                                    <h6 class="text-primary">{{ $message->premium_vaccin }}</h6>
                                @else
                                    <h6 class="text-primary">{{ $message->vaccin }}</h6>
                                @endif
                            @else
                                <h6 class="text-danger">ফর্ম সাবমিট বন্ধ আছে। পরবর্তীতে চেষ্টা করুন।</h6>
                            @endif
                        </div>


                        <div class="table-responsive">
                            <button type="button" class="submit btn btn-info form-control btn-lg"
                                {{ $submitStatus->vaccin == 1 ? '' : 'disabled' }}>Save &
                                Download</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @php
        $priceAlert =
            auth()->user()->premium == 2 && $now < auth()->user()->premium_end
                ? $message->premium_vaccin_price
                : $message->vaccin_price;
    @endphp
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.submit').on('click', function(event) {
                event.preventDefault(); // Prevent the default form submission triggered by the button click

                Swal.fire({
                    title: 'এনআইডি',
                    text: "এই ফাইলটি ডাউনলোড করার জন্য আপনার অ্যাকাউন্ট থেকে {{ $priceAlert }} টাকা কর্তন করা হবে।",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'হ্যাঁ, জমা দিন!',
                    cancelButtonText: 'না, বাতিল করুন!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#submit_form').submit(); // Only submit the form if the user confirms
                    }
                });
            });
        });
    </script>
@endsection
