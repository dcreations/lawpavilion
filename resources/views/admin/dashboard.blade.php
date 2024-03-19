@extends('master')

@section('content')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome on Board</h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly! </span></h6>
                </div>
                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-5"> Recent Clients </p>
                  <div class="table-responsive">
                      <table class="table table-striped table-borderless">
                        <thead>
                          <tr>
                          <th>First Name</th>
                          <th>Last Name</th>
                            <th>Email</th>
                            <th>DOB</th>
                            <th>Legal Counsel</th>
                            
                          </tr>  
                        </thead>
                        <tbody>
                          @if(count($users) > 0)
                            @foreach($users as $vel)
                              
                          <tr>
                          <td>{{$vel->first_name}} </td>
                          <td>{{$vel->last_name}}</td>
                          <td>{{$vel->email}}</td>
                          <td>{{date('d F, Y', strtotime($vel->dob))}}</td>
                            <td>{{$vel->counsel}} </td>
                            
                              
                          </tr>
                          @endforeach
                          @else
                          <tr><td colspan="7"> No Client record </td></tr>
                        @endif
                        </tbody>
                      </table>
                    </div>
                  
                </div>
              </div>
            </div>
            
          </div>

        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
@stop