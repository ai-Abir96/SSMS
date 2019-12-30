@extends((Auth::user()->roles->pluck('name')=='Admin') ? 'Dashboard.admin_dashboard' : 'Dashboard.salesman_dashboard')

@section('content')

<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <br />
  @endif

  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">User Profile</div>

                  <div class="col-md-8 offset-md-0">
                      <a href="{{route('Einfo_update_page')}}"  class="btn btn-primary">
                          {{ __('Update Profile') }}
                      </a>
                  </div>
                  <div class="card-body">

                    <table class="table table-striped">
                      <h3 style="float:left; color:black;">Personal Information</h3>
                      <tr>
                        <td style="width:250px;">
                           <strong>User ID<strong>
                        </td>
                        <td>
                           {{$pinfo->ep_user_id}}
                        </td>
                      </tr>
                      <tr>
                        <td style="width:250px;">
                           <strong>First Name<strong>
                        </td>
                        <td>
                           {{$pinfo->emp_fname}}
                        </td>
                      </tr>
                      <tr>
                        <td style="width:250px;">
                           <strong>Last Name<strong>
                        </td>
                        <td>
                           {{$pinfo->emp_lname}}
                        </td>
                      </tr>
                      <tr>
                        <td style="width:250px;">
                           <strong>NID Number<strong>
                        </td>
                        <td>
                           {{$pinfo->employee_nid}}
                        </td>
                      </tr>
                      <tr>
                        <td style="width:250px;">
                           <strong>Birth Date<strong>
                        </td>
                        <td>
                           {{$pinfo->emp_birth_date}}
                        </td>
                      </tr>
                      <tr>
                        <td style="width:250px;">
                           <strong>Age<strong>
                        </td>
                        <td>
                           {{$pinfo->emp_age}}
                        </td>
                      </tr>
                      <tr>
                        <td style="width:250px;">
                           <strong>Blood Goup<strong>
                        </td>
                        <td>
                           {{$pinfo->emp_blood}}
                        </td>
                      </tr>
                      <tr>
                        <td style="width:250px;">
                           <strong>Marital Status<strong>
                        </td>
                        <td>
                           {{$pinfo->emp_marital_Status}}
                        </td>
                      </tr>
                    </table>

                          <table class="table table-striped">
                            <h3 style="float:left; color:black;">Contact Information</h3>
                            <tr>
                              <td style="width:250px;">
                                 <strong>Cell number<strong>
                              </td>
                              <td>
                                 {{$cinfo->emp_phone1}}
                              </td>
                            </tr>
                            <tr>
                              <td style="width:250px;">
                                 <strong>Alternate Cell Number <strong>
                              </td>
                              <td>
                                 {{$cinfo->emp_phone2}}
                              </td>
                            </tr>
                            <tr>
                              <td style="width:250px;">
                                 <strong>Email Address<strong>
                              </td>
                              <td>
                                 {{$cinfo->emp_email}}
                              </td>
                            </tr>
                            <tr>
                              <td style="width:250px;">
                                 <strong>Present Address<strong>
                              </td>
                              <td>
                                 {{$cinfo->emp_preaddress}}
                              </td>
                            </tr>
                            <tr>
                              <td style="width:250px;">
                                 <strong>Permanent Address<strong>
                              </td>
                              <td>
                                 {{$cinfo->emp_peraddress}}
                              </td>
                            </tr>
                          </table>



                          <table class="table table-striped">
                            <h3 style="float:left; color:black;">Emergancy Contact Information</h3>
                            <tr>
                              <td style="width:250px;">
                                 <strong>Name<strong>
                              </td>
                              <td>
                                 {{$einfo->ec_name}}
                              </td>
                            </tr>
                            <tr>
                              <td style="width:250px;">
                                 <strong> Cell Number <strong>
                              </td>
                              <td>
                                 {{$einfo->ec_phone1}}
                              </td>
                            </tr>
                            <tr>
                              <td style="width:250px;">
                                 <strong>Alternate Cell Number <strong>
                              </td>
                              <td>
                                 {{$einfo->ec_phone2}}
                              </td>
                            </tr>
                            <tr>
                              <td style="width:250px;">
                                 <strong>Relation with User<strong>
                              </td>
                              <td>
                                 {{$einfo->ec_relation}}
                              </td>
                            </tr>
                            <tr>
                              <td style="width:250px;">
                                 <strong>Address<strong>
                              </td>
                              <td>
                                 {{$einfo->ec_address}}
                              </td>
                            </tr>

                          </table>


                          <table class="table table-striped">
                            <h3 style="float:left; color:black;">Job Profile</h3>
                            <tr>
                              <td style="width:250px;">
                                 <strong>Postion Name<strong>
                              </td>
                              <td>
                                 {{$jinfo->positions->name}}
                              </td>
                            </tr>
                            <tr>
                              <td style="width:250px;">
                                 <strong> Salaray <strong>
                              </td>
                              <td>
                                 {{$jinfo->salary}}
                              </td>
                            </tr>
                            <tr>
                              <td style="width:250px;">
                                 <strong>Signing Date <strong>
                              </td>
                              <td>
                                 {{$jinfo->signing_date}}
                              </td>
                            </tr>


                          </table>



                  </div>
                </div>
              </div>
            </div>
        </div>
</div>




@endsection
