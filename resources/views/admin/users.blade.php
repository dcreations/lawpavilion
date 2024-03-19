@extends('master')

@section('content')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">All Clients</h3>
                  <h6 class="font-weight-normal mb-0"></h6>
                </div>
                <div align="right" class="col-12 col-xl-4 justify-content-end">
                    <a href="#add" class="btn btn-primary px-2 rounded" data-toggle="modal"> Add Client </a>
                </div>
              </div>
            </div>
          </div>

          <div class="modal" tabindex="-1" role="dialog" id="add">
                    <div class="modal-dialog modal-md" role="document">
                      <div class="modal-content" style="background:linear-gradient(45deg,grey,darkblue);background-repeat:no-repeat;background-size:cover;">
                        <div class="modal-header">
                          <h4 class="modal-title text-white">Add new Client</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="{{route('users.add')}}" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group">
                                  <label class="text-white"> First Name: </label><br>
                                <input type="text" class="form-control form-control-lg" required name="first_name" id="exampleInputEmail1" placeholder="First Name">
                              </div>
                              <div class="form-group">
                                  <label class="text-white"> Last Name: </label><br>
                                <input type="text" class="form-control form-control-lg" required name="last_name" id="exampleInputEmail1" placeholder="Last Name">
                              </div>
                              <div class="form-group">
                                  <label class="text-white"> Email Address: </label><br>
                                <input type="email" class="form-control form-control-lg" required name="email" id="exampleInputEmail1" placeholder="Email Address">
                              </div>
                              <div class="form-group">
                                <label class="text-white"> Date of Birth: </label><br>
                                <input type="date" class="form-control form-control-lg" required name="dob" id="exampleInputEmail1" placeholder="Date of Birth">
                              </div>
                              <div class="form-group">
                                  <label class="text-white"> Profile Picture: </label><br>
                                  <input type="file" class="form-control form-control-lg" name="image" id="exampleInputEmail1" placeholder="Profile Picture">
                                </div>
                              <div class="form-group">
                                <label class="text-white"> Lead Counsel: </label><br>
                                <input type="text" class="form-control form-control-lg" required name="counsel" id="exampleInputEmail1" placeholder="Lead Counsel">
                              </div>
                              <div class="form-group">
                                  <label class="text-white"> Case Details: </label><br>
                                <textarea rows="5" class="form-control form-control-lg" required name="details" id="exampleInputEmail1" placeholder="case Details"></textarea>
                              </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Add Client</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>

          

          <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-5">All Clients</p>
                  <div class="table-responsive" id="mytable">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Profile Picture</th>
                          <th>First Name</th>
                        <th>Last Name</th>
                          <th>Email</th>
                          <th>DOB</th>
                          <th>Lead Counsel</th>
                          <th>Date Added</th>
                          <th>Actions</th>
                        </tr>  
                      </thead>
                      <tbody>
                        @if(count($users) > 0)
                          @foreach($users as $k=>$vel)
                            
                        <tr>
                            <td>{{++$k}} </td>  
                            <td><img src="{{url('/')}}/{{$vel->image}}" style="height:70px;width:70px;" class="rounded-circle"></td>
                            <td>{{$vel->first_name}} </td>
                        <td>{{$vel->last_name}}</td>
                        <td>{{$vel->email}}</td>
                        <td>{{date('d F, Y', strtotime($vel->dob))}}</td>
                        <td>{{$vel->counsel}}</td>
                        <td>{{date('d F, Y', strtotime($vel->created_at))}}</td>
                          
                            <td class="font-weight-medium">
                                <a href="{{route('users.view', $vel->id)}}" class="btn btn-secondary rounded"> View </a>
                                <a href="{{route('users.del', $vel->id)}}" class="btn btn-danger rounded"> Delete </a>
                            <a href="#edit{{$vel->id}}" data-toggle="modal" class="btn btn-primary rounded"> Edit </a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr><td colspan="8"> No Client record </td></tr>
                      @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        @if(count($users)>0)
            @foreach($users as $vol)
            <div class="modal" tabindex="-1" role="dialog" id="edit{{$vol->id}}">
                    <div class="modal-dialog modal-md" role="document">
                      <div class="modal-content" style="background:linear-gradient(45deg,grey,darkblue);background-repeat:no-repeat;background-size:cover;">
                        <div class="modal-header">
                          <h4 class="modal-title text-white">Update Client Details</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="{{route('users.update')}}" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group">
                                  <label class="text-white"> First Name: </label><br>
                                <input type="text" class="form-control form-control-lg" required name="first_name" value="{{$vol->first_name}}" id="exampleInputEmail1" placeholder="First Name">
                              </div>
                              <div class="form-group">
                                  <label class="text-white"> Last Name: </label><br>
                                <input type="text" class="form-control form-control-lg" required name="last_name" value="{{$vol->last_name}}" id="exampleInputEmail1" placeholder="Last Name">
                              </div>
                              <div class="form-group">
                                  <label class="text-white"> Email Address: </label><br>
                                <input type="email" class="form-control form-control-lg" required name="email" value="{{$vol->email}}" id="exampleInputEmail1" placeholder="Email Address">
                              </div>
                              <div class="form-group">
                                <label class="text-white"> Date of Birth: </label><br>
                                <input type="date" class="form-control form-control-lg" required name="dob" value="{{$vol->dob}}" id="exampleInputEmail1" placeholder="Date of Birth">
                              </div>
                              <div class="form-group">
                                  <label class="text-white"> Profile Picture: </label><br>
                                  <input type="file" class="form-control form-control-lg" name="image" id="exampleInputEmail1" placeholder="Profile Picture">
                                </div>
                              <div class="form-group">
                                <label class="text-white"> Lead Counsel: </label><br>
                                <input type="text" class="form-control form-control-lg" required name="counsel" value="{{$vol->counsel}}" id="exampleInputEmail1" placeholder="Lead Counsel">
                              </div>
                              <div class="form-group">
                                  <label class="text-white"> Case Details: </label><br>
                                <textarea rows="5" class="form-control form-control-lg" required name="details" id="exampleInputEmail1" placeholder="case Details">{{$vol->details}}</textarea>
                              </div>
                              <input type="hidden" name="sid" value="{{$vol->id}}">
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Update Client</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                @endforeach
                @endif

                  
                
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
@stop