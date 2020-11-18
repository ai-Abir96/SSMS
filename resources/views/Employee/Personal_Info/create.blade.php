@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header"><h1>{{ __('Employee Information') }}</h1></div>

              <div class="card-body">
                  <form id="regForm" method="POST" action="{{ route('Einfo_create') }}" enctype="multipart/form-data">
                    @csrf


                 <!-- 1st "tab" for the form: -->
                 <div class="tab">
                    <label for="Info" ><h4><b>{{ __('Personal Information:') }}</b></h4></label>
                   <p><input id="id" class="form-control"type="hidden" value="{{ Auth::user()->id }}" name="ep_user_id" required></p>

                   <div class="form-group row">
                       <label for="emp_image" class="col-md-3 col-form-label text-md-right">{{ __('Image') }}</label>

                       <div class="col-md-6">
                         <input id="image" type="file" class="form-control @error('file') is-invalid @enderror" name="emp_image" placeholder="Image" required>

                           @error('file')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                       </div>
                   </div>



                   <div class="form-group row">
                     <label for="emp_fname"  class="col-md-3 col-form-lebel text-md-right">{{__('First Name')}} <span style="color:red; vertical-align:middle;" data-toggle="tooltip" data-placement="bottom" title="A-Z,a-z">*</span> </label>
                     <div class="col-md-6">
                       <input id="fnames" type="text" pattern="[A-Za-z]{3,32}" maxlength="32" class="form-control @error('emp_fname') is-invalid @enderror" name="emp_fname" placeholder="First Name" required>

                         @error('emp_fname')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                     </div>
                   </div>

                   <div class="form-group row">
                     <label for="emp_fname" class="col-md-3 col-form-lebel text-md-right">{{__('Last Name')}}</label>
                     <div class="col-md-6">
                       <input id="emp_lname" type="text" class="form-control @error('name') is-invalid @enderror" name="emp_lname" placeholder="Last Name" required>

                         @error('name')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                     </div>
                   </div>

                   <div class="form-group row">
                     <label for="number" class="col-md-3 col-form-lebel text-md-right">{{__('NID number')}}</label>
                     <div class="col-md-6">
                       <input id="number" type="number"  pattern="[0-9]{10,17}" maxlength="17" class="form-control @error('number') is-invalid @enderror" name="employee_nid"  title="10 to 17 characters" placeholder="NID number" required >

                         @error('number')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                     </div>
                   </div>

                   <div class="form-group row">
                     <label for="emp_birth_date" class="col-md-3 col-form-lebel text-md-right">{{__('Birth Date')}}</label>
                     <div class="col-md-6">
                       <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="emp_birth_date"  placeholder="Birth Date" required>

                         @error('date')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                     </div>
                   </div>

                   <div class="form-group row">
                     <label for="emp_blood" class="col-md-3 col-form-lebel text-md-right">{{__('Blood Group')}}</label>
                     <div class="col-md-6">

                       <select class="form-control" id="emp_blood" name="emp_blood" required>
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
                     <label for="emp_blood" class="col-md-3 col-form-lebel text-md-right">{{__('Marital Status')}}</label>
                     <div class="col-md-6">

                       <select class="form-control" id="emp_marital_status" name="emp_marital_status" required>
                        <option>Married</option>
                        <option>Unmarried</option>
                        <option>In a Relationship</option>
                        <option>Divorced</option>
                      </select>
                     </div>
                   </div>
                 </div>


                 <div class="tab">
                   <label for="Info" ><h4><b>{{ __('Contact Information:') }}</b></h4></label>
                   <p><input id="id" type="hidden" value="{{ Auth::user()->id }}" name="ec_user_id" required></p>

                   <div class="form-group row">
                       <label for="number" class="col-md-3 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                       <div class="col-md-6">
                         <input id="number" type="number" class="form-control @error('number') is-invalid @enderror" name="emp_phone1" placeholder="Phone Number" required>

                           @error('number')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                       </div>
                   </div>

                   <div class="form-group row">
                       <label for="number" class="col-md-3 col-form-label text-md-right">{{ __('Phone Number (Alternate) ') }}</label>

                       <div class="col-md-6">
                         <input id="number" type="number" class="form-control @error('number') is-invalid @enderror" name="emp_phone2" placeholder="Phone Number(Alternate)" required>

                           @error('number')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                       </div>
                   </div>

                   <div class="form-group row">
                       <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Email ') }}</label>

                       <div class="col-md-6">
                         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}" name="emp_email" placeholder="Email" required>

                           @error('email')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                       </div>
                   </div>

                   <div class="form-group row">
                       <label for="text" class="col-md-3 col-form-label text-md-right">{{ __('Present Address ') }}</label>

                       <div class="col-md-6">
                         <input id="text" type="text" class="form-control @error('text') is-invalid @enderror" name="emp_preaddress" placeholder="Present Address" required>

                           @error('text')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                       </div>
                   </div>

                   <div class="form-group row">
                       <label for="text" class="col-md-3 col-form-label text-md-right">{{ __('Permanent Address ') }}</label>

                       <div class="col-md-6">
                         <input id="text" type="text" class="form-control @error('text') is-invalid @enderror" name="emp_peraddress" placeholder="Permanent Address" required>

                           @error('text')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                       </div>
                   </div>

                 </div>

                 <div class="tab">Emergancy Information:
                   <p><input id="id" type="hidden" value="{{ Auth::user()->id }}" name="ee_user_id" required></p>

                     <div class="form-group row">
                         <label for="text" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                         <div class="col-md-6">
                           <input id="text" type="text" class="form-control @error('text') is-invalid @enderror" name="ec_name" placeholder="Name of the Conact Person" required>

                             @error('text')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                     </div>

                     <div class="form-group row">
                         <label for="number" class="col-md-3 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                         <div class="col-md-6">
                           <input id="number" type="number" class="form-control @error('number') is-invalid @enderror" name="ec_phone1" placeholder="Phone Number" required>

                             @error('number')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                     </div>

                     <div class="form-group row">
                         <label for="number" class="col-md-3 col-form-label text-md-right">{{ __('Phone Number (Alternate) ') }}</label>

                         <div class="col-md-6">
                           <input id="number" type="number" class="form-control @error('number') is-invalid @enderror" name="ec_phone2" placeholder="Phone Number(Alternate)" required>

                             @error('number')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                     </div>



                     <div class="form-group row">
                         <label for="text" class="col-md-3 col-form-label text-md-right">{{ __('Relationship') }}</label>

                         <div class="col-md-6">
                           <input id="text" type="text" class="form-control @error('text') is-invalid @enderror" name="ec_relation" placeholder="Relation With You" required>

                             @error('text')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                     </div>


                     <div class="form-group row">
                         <label for="text" class="col-md-3 col-form-label text-md-right">{{ __('Address ') }}</label>

                         <div class="col-md-6">
                           <input id="text" type="text" class="form-control @error('text') is-invalid @enderror" name="ec_address" placeholder="Present Address" required>

                             @error('text')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                     </div>

                 </div>

                 <div style="overflow:auto;">
                   <div style="float:right;">
                     <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                     <button type="button" id="nextBtn" onclick="nextPrev(1)" >Next</button>
                   </div>
                 </div>

                 <!-- Circles which indicates the steps of the form: -->
                 <div style="text-align:center;margin-top:40px;">
                   <span class="step"></span>
                   <span class="step"></span>
                   <span class="step"></span>
                 </div>

         </form>

            </div>
          </div>
        </div>
    </div>
</div>





@endsection
