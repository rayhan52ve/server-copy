@extends('User.layout.master')
@section('user')

    {{-- <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h1>Premium Membership</h1>

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        gjghj
                    </div>
                </div>

            </div>
        </div>
    </div> --}}

    <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-8 col-xl-8">
      
              <div class="card" style="border-radius: 15px;">
                <div class="card-body text-center">
                  <div class="mt-3 mb-4">
                    <img src="{{ asset($admin->image) }}"
                      class="rounded-circle img-fluid" style="width: 100px;" />
                  </div>
                  <h4 class="mb-2">{{ $admin->name ?? null }}</h4>
                  {!! $admin->details ?? null !!}
                  {{-- <p class="mb-4"></p> --}}
                  {{-- <div class="mb-4 pb-2">
                    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary btn-floating">
                      <i class="fab fa-facebook-f fa-lg"></i>
                    </button>
                    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary btn-floating">
                      <i class="fab fa-twitter fa-lg"></i>
                    </button>
                    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary btn-floating">
                      <i class="fab fa-skype fa-lg"></i>
                    </button>
                  </div>
                  <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-rounded btn-lg">
                    Message now
                  </button>
                  <div class="d-flex justify-content-between text-center mt-5 mb-2">
                    <div>
                      <p class="mb-2 h5">8471</p>
                      <p class="text-muted mb-0">Wallets Balance</p>
                    </div>
                    <div class="px-3">
                      <p class="mb-2 h5">8512</p>
                      <p class="text-muted mb-0">Income amounts</p>
                    </div>
                    <div>
                      <p class="mb-2 h5">4751</p>
                      <p class="text-muted mb-0">Total Transactions</p>
                    </div>
                  </div> --}}
                </div>
              </div>
      
            </div>
          </div>
        </div>
      </section>


    </div>
@endsection
