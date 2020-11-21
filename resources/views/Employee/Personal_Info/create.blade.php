@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-light p-4 rounded mt-2">
                    <!-- ====Progress Bar==== -->
          <div class="progress mb-3" style="height:40px;">
            <div class="progress-bar bg-dark" role="progressbar" style="width:33.33%" id="progressBar">
              <b class="lead" id="progressText">Step-1</b>
            </div>
          </div>
                  <!-- ====Progress Bar End==== -->

                  <!-- ====Form Start -->
          <form id="regForm" method="POST" action="{{ route('Einfo_create') }}" enctype="multipart/form-data">
                    @csrf

                 <!-- ====First Part of the Form==== -->
                 <div id="first">
                    <h4 class="text-center bg-primary p-1 rounded text-dark"><b>{{ __('Personal Information') }}</b></h4>
                    <input id="id" class="form-control"type="hidden" value="{{ Auth::user()->id }}" name="ep_user_id" required>

                     <div class="form-group row mt-3">
                         <label for="image" class="col-md-3 col-form-label text-md-right">{{ __('Image') }}</label>
                         <div class="col-md-6 ">
                           <input id="image" type="file" class="form-control" name="emp_image" placeholder="Image" required>
                           <b class="form-text text-danger" id="imageError"></b>
                         </div>
                     </div>

                     <div class="form-group row">
                       <label for="firstname"  class="col-md-3 col-form-lebel text-md-right">{{__('First Name')}} <span style="color:red; vertical-align:middle;" data-toggle="tooltip" data-placement="bottom" title="A-Z,a-z">*</span> </label>
                       <div class="col-md-6">
                         <input id="firstname" type="text" pattern="[A-Za-z]{3,32}" maxlength="32" class="form-control" name="emp_fname" placeholder="First Name" required>
                         <b class="form-text text-danger" id="firstnameError"></b>
                       </div>
                     </div>

                     <div class="form-group row">
                       <label for="lastname" class="col-md-3 col-form-lebel text-md-right">{{__('Last Name')}}</label>
                       <div class="col-md-6">
                         <input id="lastname" type="text" class="form-control" name="emp_lname" placeholder="Last Name" required>
                         <b class="form-text text-danger" id="lastnameError"></b>
                       </div>
                     </div>

                     <div class="form-group row">
                       <label for="nidnumber" class="col-md-3 col-form-lebel text-md-right">{{__('NID number')}}</label>
                       <div class="col-md-6">
                         <input id="nidnumber" type="text" class="form-control" name="employee_nid"  placeholder="NID number" required >
                         <b class="form-text text-danger" id="nidnumberError"></b>
                       </div>
                     </div>

                     <div class="form-group row">
                       <label for="birthdate" class="col-md-3 col-form-lebel text-md-right">{{__('Birth Date')}}</label>
                       <div class="col-md-6">
                         <input id="birthdate" type="date" class="form-control" name="emp_birth_date"  placeholder="Birth Date" required>
                         <b class="form-text text-danger" id="birthdateError"></b>
                       </div>
                     </div>

                     <div class="form-group row">
                       <label for="bloodgroup" class="col-md-3 col-form-lebel text-md-right">{{__('Blood Group')}}</label>
                       <div class="col-md-6">
                         <select class="form-control" id="bloodgroup" name="emp_blood" required>
                          <option>A+</option>
                          <option>B+</option>
                          <option>O+</option>
                          <option>AB+</option>
                          <option>A-</option>
                          <option>B-</option>
                          <option>O-</option>
                          <option>AB-</option>
                        </select>
                       </div>
                      </div>

                     <div class="form-group row">
                       <label for="maritalstatus" class="col-md-3 col-form-lebel text-md-right">{{__('Marital Status')}}</label>
                       <div class="col-md-6">
                         <select class="form-control" id="maritalstatus" name="emp_marital_status" required>
                          <option>Married</option>
                          <option>Unmarried</option>
                          <option>In a Relationship</option>
                          <option>Divorced</option>
                        </select>
                       </div>
                     </div>

                    <div class="form-group">
                    <a href="#" class="btn btn-primary" style="float:right;" id="next-1">Next</a>
                    </div>

                  </div>
                      <!-- ====First Tab Done==== -->

                      <!-- ====Second Tab Start==== -->

                 <div id="second">

                   <h4 class="text-center bg-primary p-1 rounded text-dark b">{{ __('Contact Information') }}</h4>
                   <input id="id" type="hidden" value="{{ Auth::user()->id }}" name="ec_user_id" required>

                   <div class="form-group row">
                       <label for="phonenumber" class="col-md-3 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                       <div class="col-md-6">
                         <input id="phonenumber" type="text" class="form-control" name="emp_phone1" placeholder="Phone Number" required>
                          <b class="form-text text-danger" id="phonenumberError"></b>
                       </div>
                   </div>

                   <div class="form-group row">
                       <label for="phonenumber2" class="col-md-3 col-form-label text-md-right">{{ __('Phone Number (Alternate) ') }}</label>
                       <div class="col-md-6">
                         <input id="phonenumber2" type="number" class="form-control" name="emp_phone2" placeholder="Phone Number(Alternate)" required>
                          <b class="form-text text-danger" id="phonenumber2Error"></b>
                       </div>
                   </div>

                   <div class="form-group row">
                       <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Email ') }}</label>
                       <div class="col-md-6">
                         <input id="email" type="email" class="form-control" value="{{ Auth::user()->email }}" name="emp_email" placeholder="Email" required>
                          <b class="form-text text-danger" id="emailError"></b>
                       </div>
                   </div>

                   <div class="form-group row">
                       <label for="address1" class="col-md-3 col-form-label text-md-right">{{ __('Present Address ') }}</label>
                       <div class="col-md-6">
                         <input id="preaddress1" type="text" class="form-control" name="emp_preaddress" placeholder="Present Address" required>
                          <b class="form-text text-danger" id="address1Error"></b>
                       </div>
                   </div>

                   <div class="form-group row">
                       <label for="address2" class="col-md-3 col-form-label text-md-right">{{ __('Permanent Address ') }}</label>
                       <div class="col-md-6">
                         <input id="address2" type="text" class="form-control" name="emp_peraddress" placeholder="Permanent Address" required>
                         <b class="form-text text-danger" id="address2Error"></b>
                       </div>
                   </div>

                   <div class="form-group">
                     <a href="#" class="btn btn-primary" style="float:right;" id="next-2">Next</a>
                     <a href="#" class="btn btn-danger" style="float:right;" id="prev-2">Previous</a>
                   </div>
                 </div>


                 <!-- =====End of Second tab==== -->

                 <!-- ====Start of Third Tab==== -->

                 <div id="third">
                   <h4 class="text-center bg-primary p-1 rounded text-light">{{ __('Emergancy Information') }}</h4>
                   <input id="id" type="hidden" value="{{ Auth::user()->id }}" name="ee_user_id" required>

                     <div class="form-group row">
                         <label for="ename" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>
                         <div class="col-md-6">
                           <input id="ename" type="text" class="form-control" name="ec_name" placeholder="Name of the Conact Person" required>
                           <b class="form-text text-danger" id="enameError"></b>
                         </div>
                     </div>

                     <div class="form-group row">
                         <label for="ephonenumber" class="col-md-3 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                         <div class="col-md-6">
                           <input id="ephonenumber" type="number" class="form-control" name="ec_phone1" placeholder="Phone Number" required>
                           <b class="form-text text-danger" id="ephonenumberError"></b>
                         </div>
                     </div>

                     <div class="form-group row">
                         <label for="ephonenumber2" class="col-md-3 col-form-label text-md-right">{{ __('Phone Number (Alternate) ') }}</label>
                         <div class="col-md-6">
                           <input id="ephonenumber2" type="number" class="form-control" name="ec_phone2" placeholder="Phone Number(Alternate)" required>
                           <b class="form-text text-danger" id="ephonenumber2Error"></b>
                         </div>
                     </div>

                     <div class="form-group row">
                         <label for="relation" class="col-md-3 col-form-label text-md-right">{{ __('Relationship') }}</label>
                         <div class="col-md-6">
                           <input id="relation" type="text" class="form-control" name="ec_relation" placeholder="Relation With You" required>
                           <b class="form-text text-danger" id="relationError"></b>
                         </div>
                     </div>


                     <div class="form-group row">
                         <label for="address" class="col-md-3 col-form-label text-md-right">{{ __('Address ') }}</label>
                         <div class="col-md-6">
                           <input id="address" type="text" class="form-control" name="ec_address" placeholder="Present Address" required>
                           <b class="form-text text-danger" id="addressError"></b>
                         </div>
                     </div>
                     <div class="form-group">
                       <a type="submit" data-toggle="modal" data-target="#confirmModel" style="float:right;"  class="btn btn-primary">Submit</a>
                       <a href="#" class="btn btn-danger" style="float:right;" id="prev-3">Previous</a>

                     </div>

                 </div>

                 <!-- ====End of Third tab -->


                 <!-- The Modal -->
                 <div class="modal fade" id="confirmModel">
                   <div class="modal-dialog">
                     <div class="modal-content">

                       <!-- Modal Header -->
                       <div class="modal-header">
                         <h4 class="modal-title">Confirmation</h4>
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                       </div>

                       <!-- Modal body -->
                       <div class="modal-body">

                         <div class="form-group row">

                             <h1>Are you sure ?</h1>

                         </div>
                       </div>

                       <!-- Modal footer -->
                       <div class="modal-footer">

                         <button type="button" class="btn btn-danger" style="float:right;" data-dismiss="modal">Back</button>
                         <input type="submit" name="submit" style="float:right;" value="Submit" class="btn btn-success" >
                       </div>
                     </form>

                     </div>
                   </div>
                 </div>

         </form>
      </div>
    </div>
</div>
@endsection
