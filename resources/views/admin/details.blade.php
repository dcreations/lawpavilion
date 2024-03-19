@extends('master')

@section('content')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Client Details</h3>
                  <p class="font-weight-normal mb-0"> </span></p>
                </div>
                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <img src="{{ url('/') }}/{{ $user->image }}" class="rounded" style="height:300px;width:300px;"><br><br>
                  <p class="mb-0"> First Name </p>
                  <h4> {{ $user->first_name }} </h4><br>

                  <p class="mb-0"> Last Name </p>
                  <h4> {{ $user->last_name }} </h4><br>

                  <p class="mb-0"> Email Address </p>
                  <h4> {{ $user->email }} </h4><br>

                  <p class="mb-0"> Date of Birth </p>
                  <h4> {{ date('d F, Y', strtotime($user->dob)) }} </h4><br>

                  <p class="mb-0"> Lead Counsel </p>
                  <h4> {{ $user->counsel }} </h4><br>
                </div>
              </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h5>Case Details </h5><br>
                      <p align="justify">
                          {!! nl2br($user->details) !!}
                      </p>
                  </div>
                </div>
              </div>
            
          </div>

        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
@stop