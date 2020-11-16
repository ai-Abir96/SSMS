@extends((Auth::user()->roles->pluck('id')=='[1]') ? 'Dashboard.admin_dashboard' : 'Dashboard.salesman_dashboard')
@section('content')
<link href="{{ asset('css/form-snippet.css') }}" rel="stylesheet">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form id="regForm" method="POST" action="{{ route('Einfo_update') }}" enctype="multipart/form-data">
                  @csrf
                 <h1>Employee Information</h1>


                 <!-- One "tab" for each step in the form: -->
                 <div class="tab">Personal Information:
                   <p><input id="id" type="hidden" value="{{ Auth::user()->id }}" name="emp_user_id" required></p>

                   <div class="form-group row">
                       <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                       <div class="col-md-6">
                           <input id="emp_image" type="file" class="form-control " name="emp_image" value=""  >
                       </div>
                   </div>

                   <div class="form-group row">
                       <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                       <div class="col-md-6">
                           <input id="name" type="text" class="form-control " name="emp_fname" value="{{ $pinfo->emp_fname }}"  autofocus>
                       </div>
                   </div>

                   <div class="form-group row">
                       <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                       <div class="col-md-6">
                           <input id="name" type="text" class="form-control" name="emp_lname" value="{{ $pinfo->emp_lname }}"  autofocus>
                       </div>
                   </div>

                   <div class="form-group row">
                       <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('NID Number') }}</label>
                       <div class="col-md-6">
                           <input id="number" type="number" class="form-control " name="employee_nid" value="{{ $pinfo->employee_nid }}"  autofocus>
                       </div>
                   </div>

                   <div class="form-group row">
                       <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Birth Date') }}</label>
                       <div class="col-md-6">
                           <input id="date" type="date"  class="form-control " name="emp_birth_date" value="{{$pinfo->emp_birth_date  }}"  autofocus>
                       </div>
                   </div>



                   <div class="form-group row">
                       <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Blood Group') }}</label>
                       <div class="col-md-6">
                           <input id="name" type="text" class="form-control " name="emp_blood" value="{{ $pinfo->emp_blood }}"  autofocus>
                       </div>
                   </div>

                   <div class="form-group row">
                       <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Marital Status') }}</label>
                       <div class="col-md-6">
                           <input id="name" type="text" class="form-control " name="emp_marital_status" value="{{$pinfo->emp_marital_status }}"  autofocus>
                       </div>
                   </div>
                 </div>

                 <div class="tab">Contact Information:

                   <div class="form-group row">
                       <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Contact No') }}</label>
                       <div class="col-md-6">
                           <input id="number" type="number" class="form-control " name="emp_phone1" value="{{$cinfo->emp_phone1 }}"  autofocus>
                       </div>
                   </div>

                   <div class="form-group row">
                       <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Alternate Contact No') }}</label>
                       <div class="col-md-6">
                           <input id="number" type="number" class="form-control " name="emp_phone2" value="{{ $cinfo->emp_phone2 }}"  autofocus>
                       </div>
                   </div>

                   <div class="form-group row">
                       <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                       <div class="col-md-6">
                           <input id="email" type="email" value="{{ $cinfo->emp_email }}" class="form-control " name="emp_email"  autofocus>
                       </div>
                   </div>

                   <div class="form-group row">
                       <label for="Address" class="col-md-4 col-form-label text-md-right">{{ __('Present Address') }}</label>

                       <div class="col-md-6">
                           <input id="Address" type="text" class="form-control" name="emp_preaddress" value="{{ $cinfo->emp_preaddress }}"  autofocus>
                       </div>
                   </div>

                   <div class="form-group row">
                       <label for="Address" class="col-md-4 col-form-label text-md-right">{{ __('Permanent Address') }}</label>
                       <div class="col-md-6">
                           <input id="Address" type="text" class="form-control " name="emp_peraddress" value="{{ $cinfo->emp_peraddress }}"  autofocus>
                       </div>
                   </div>
                 </div>

                 <div class="tab">Emergancy Information:
                   <div class="form-group row">
                       <label for="Address" class="col-md-4 col-form-label text-md-right">{{ __(' Name') }}</label>
                       <div class="col-md-6">
                           <input  input id="name" type="text"  name="ec_name" placeholder="First Name" value="{{$einfo->ec_name  }}"  autofocus>
                       </div>
                   </div>


                 <div class="form-group row">
                     <label for="Address" class="col-md-4 col-form-label text-md-right">{{ __('Cell Number') }}</label>
                     <div class="col-md-6">
                         <input id="number" type="number"  name="ec_phone1" placeholder="Phone Number" value="{{ $einfo->ec_phone1 }}"  autofocus>
                     </div>
                 </div>


               <div class="form-group row">
                   <label for="Address" class="col-md-4 col-form-label text-md-right">{{ __('Alternate Cell Number') }}</label>
                   <div class="col-md-6">
                       <input id="number" type="number"  name="ec_phone2" value="{{ $einfo->ec_phone2 }}"  autofocus>
                   </div>
               </div>


             <div class="form-group row">
                 <label for="Address" class="col-md-4 col-form-label text-md-right">{{ __('Relation with User') }}</label>
                 <div class="col-md-6">
                     <input id="name" type="text"  name="ec_relation" value="{{ $einfo->ec_relation }}"  autofocus>
                 </div>
             </div>


           <div class="form-group row">
               <label for="Address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
               <div class="col-md-6">
                   <input id="Address" type="text"  name="ec_address"  value="{{ $einfo->ec_address }}"  autofocus>
               </div>
           </div>
         </div>



                 <div style="overflow:auto;">
                   <div style="float:right;">
                     <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                     <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
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

<script src="{{ asset('js/form_snippet.js') }}" defer></script>
@endsection
